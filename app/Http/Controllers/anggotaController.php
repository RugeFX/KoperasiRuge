<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anggota;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $angg = anggota::all();
        return view('angg.index',compact('angg'))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('angg.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'noAnggota' => 'required',
                'namaAnggota' => 'required',
                'jKelamin' => 'required',
                'tempatLahir' => 'required',
                'tglLahir' => 'required',
                'alamat' => 'required',
                'noTelpon' => 'required',
                'noIdentitas' => 'required',
                'password',
            ]
        );
        anggota::create($request->all());

        return redirect()->route('angg.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(anggota $angg)
    {
        //
        return view('angg.show',compact('angg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(anggota $angg)
    {
        //
        return view('angg.edit',compact('angg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $angg)
    {
        //
        $request->validate(
            [
                'noAnggota' => 'required',
                'namaAnggota' => 'required',
                'jKelamin' => 'required',
                'tempatLahir' => 'required',
                'tglLahir' => 'required',
                'alamat' => 'required',
                'noTelpon' => 'required',
                'noIdentitas' => 'required',
                'password',
            ]
            );

            $angg->update($request->all());

            return redirect()->route('angg.index')->with('success', 'Anggota Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(anggota $angg)
    {
        //
        $angg->delete();

        return redirect()->route('angg.index')->with('success', 'angg Berhasil di Hapus');
    }
}
