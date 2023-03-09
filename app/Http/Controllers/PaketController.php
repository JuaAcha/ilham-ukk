<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::all();
        $paket = Paket::all();

        return view('paket.list', [
            'title' => 'Data Paket',
            'paket' => $paket,
            'outlet' => $outlet
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $outlet = Outlet::all();
        $paket = Paket::with('outlet')->get();

        return view('paket.create', [
            'title' => 'Membuat Paket Baru',
            'paket' => $paket,
            'outlet' => $outlet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Paket::create([
        //     'id_outlet' => $request->id_outlet,
        //     'jenis' => $request->jenis,
        //     'nama_paket' => $request->nama_paket,
        //     'harga' => $request->harga,
        // ]);

        $this->validate($request , [
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|alpha|max:255',
            'harga' => 'required|numeric',
        ]);

        Paket::create($request->all());

        // $validate = $request->validate([
        //     'id_outlet' => ['required'],
        //     'jenis' => ['required'],
        //     'nama_paket' => ['required|apha'],
        //     'harga' => ['required|numeric']
        // ]);

        return redirect()->route('paket.index')->with('message', 'Berhasil Menambahkan Paket!');
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
    public function edit( $id)
    {
        $paket = Paket::find($id);
        $outlet = Outlet::all();

         return view('paket.edit', [
            'title' => 'Mengubah Data Paket',
            'paket' => $paket,
            'outlet' => $outlet
        ]);

        $this->validate($request , [
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|alpha|max:255',
            'harga' => 'required|numeric',
        ]);
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
        $data = $request->all();

        $paket = Paket::find($id);
        $paket->update($data);

        return redirect()->route('paket.index')->with('message', 'Berhasil Memperbarui Paket!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Paket::find($id);
        $id->delete();


        return redirect()->route('paket.index')->with('message', 'Berhasil Menghapus Paket!');
    }
}