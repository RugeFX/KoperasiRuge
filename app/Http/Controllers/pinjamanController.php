<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\pinjaman;
use App\Models\pinjamanDetail;
use Illuminate\Http\Request;

class pinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pinj = pinjaman::all();
        return view('pinj.index',compact('pinj'))->with('i', 1);
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
        //
        $request->validate(
            [
                'idPinjam' => 'required|unique:pinjamen,idPinjam',
                'tanggal' => 'required',
                'noAnggota' => 'required|exists:anggotas,noAnggota',
                'jumlah' => 'required',
                'lama' => 'required',
                'bunga' => 'required',
                'userId',
            ]
        );

        $idpinjam = $request['idPinjam'];
        $lama = $request['lama'];
        $jumlah = $request['jumlah'];
        $bungareq = $request['bunga'];
        
        $bunga = $jumlah * ($bungareq / 100);
        $bungaangsuran = $bunga / $lama;
        $angsuran = $jumlah / $lama;
        
        pinjaman::create($request->all());
        
        $tahap = 1;
        for($i = 0; $i < $lama; $i++){
            pinjamanDetail::create([
                'idPinjam' => $idpinjam,
                'cicilan' => $tahap++,
                'angsuran' => $angsuran,
                'bunga' => $bungaangsuran,
            ]);
        }

        return redirect()->route('pinj.index')->with('success', 'Data Berhasil disimpan!');
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
        //
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
        //
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
        $idpinj = pinjaman::where('id', $id)->first();
        $dpin = pinjamanDetail::where('idPinjam', $idpinj->idPinjam)->delete();
        
        if($dpin){
            pinjaman::where('id', $id)->delete();
        }
        
        return redirect()->route('pinj.index')->with('success', 'Simpanan Berhasil di Hapus');
    }
    public function info(Request $request){
        if ($request->ajax()) {
            $angg = anggota::where('noAnggota','=',$request->infoangg)->get();
            
            $output="";

            if($angg != null){
                foreach($angg as $dataanggota) {
                    if($dataanggota->jKelamin=="L"){
                        $kelamin = "Laki Laki";
                    }else{
                        $kelamin = "Perempuan";
                    }
                    $output.=" 
                    <p><strong>Nama :</strong> $dataanggota->namaAnggota</p>
                    <p><strong>Jenis Kelamin :</strong> $kelamin </p>
                    <p><strong>Tanggal Lahir :</strong> $dataanggota->tglLahir </p>
                    <p><strong>Alamat :</strong> $dataanggota->alamat</p>
                    ";
                }
            }else {
                $output.="
                    <p>Anggota doesn't exist</p>    
                ";
            }
        }
        return response($output);
    }
}
