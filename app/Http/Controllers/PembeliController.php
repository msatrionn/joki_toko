<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pembeli;
use App\Models\User;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pembeli = Pembeli::join('users', 'users.id', 'pembeli.user_id')->get();
        return view('admin.pelanggan.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acak = random_int(1, 9999999);

        $request->validate(['username' => 'required|unique:users']);
        User::create([
            'id' => $acak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 'pembeli',
        ]);
        Pembeli::create([
            'user_id' => $acak,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('admin/pembeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::distinct()->get();
        $pembeli = Pembeli::join('users', 'users.id', 'pembeli.user_id')->where('id_pembeli', $id)->first();
        return view('admin.pelanggan.edit', compact('pembeli', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembeli = Pembeli::where('id_pembeli', $id)->first();
        $pembeli_user = User::join('pembeli', 'pembeli.user_id', 'users.id')
            ->where('id_pembeli', $id)->first();
        $pembeli->update([
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        $pembeli_user->update([
            'username' => $request->username
        ]);

        return redirect('admin/pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
