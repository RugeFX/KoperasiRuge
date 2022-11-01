<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenisSimpanan;

class jenisSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jen = jenisSimpanan::all();
        return view('jen.index',compact('jen'))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jen.create');
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
                'idJenis' => 'required',
                'jenisSimpanan' => 'required',
                'jumlah' => 'required'
            ]
        );
        jenisSimpanan::create($request->all());

        return redirect()->route('jen.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(jenisSimpanan $jen)
    {
        //
        return view('jen.show',compact('jen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(jenisSimpanan $jen)
    {
        //
        return view('jen.edit',compact('jen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jenisSimpanan $jen)
    {
        //
        $request->validate(
            [
                'idJenis' => 'required',
                'jenisSimpanan' => 'required',
                'jumlah' => 'required'
            ]
            );

            $jen->update($request->all());

            return redirect()->route('jen.index')->with('success', 'Jenis Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenisSimpanan $jen)
    {
        //
        $jen->delete();

        return redirect()->route('jen.index')->with('success', 'Jenis Berhasil di Hapus');
    }
}
