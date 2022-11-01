<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\pinjaman;
use App\Models\pinjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pinjamanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dpin.index');
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
        //TODO : do them updates with patch put and whatnot
        $dpin = pinjamanDetail::where('id', $id);

        $ambil = $dpin->first();
        $bisa = $ambil->angsuran + $ambil->bunga;

        $request->validate(
            [
                'tanggal' => 'required',
                'jumlah' => 'required|numeric|min:'.$bisa
            ]
        );

        $update = $dpin->update([
            "tglBayar" => $request->tanggal,
            "jumlahBayar" => $request->jumlah
        ]);

        if($update > 0){
            return response()->json([
                'update' => true,
                'idpinjam' => $ambil->idPinjam
            ]);
        }else{
            return response()->json([
                'update' => false,
            ]);
        }
        // return redirect()->route('dpin.index')->with('success', 'Pinjaman berhasil dibayar');
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

    public function getidpinjam(Request $request){
        if ($request->ajax()) {
            $det = pinjamanDetail::where('idPinjam','=',$request->idpinjam )->first();

            if($det != null){
                return response()->json(array(
                    'idpinjam' => $det->id, 
                ));
            }else {
                return response()->json(array(
                    'idpinjam' => null, 
                ));;
            }
        }
    }

    public function caridetail(Request $request){
        if($request->ajax()) {
            $iddet = pinjamanDetail::where('idPinjam','=',$request->idpinjam )->first();
            $output="";

            if($iddet){
                $det = pinjamanDetail::where('idPinjam','=',$request->idpinjam )->get();
                $i = 1;
                $output.='<input type="hidden" name="_token" id="token" value="'.Session::token().'">
                        <input type="hidden" name="_method" id="method" value="PUT">';
                foreach($det as $details) {
                    if($details->tglBayar == null && $details->jumlahBayar == null){
                        $bisa = $details->angsuran + $details->bunga;
                        $output.=' 
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100" id="'. $details->id .'">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->idPinjam.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->cicilan.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->angsuran.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->bunga.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <input type="date" value="'. date("Y-m-d") .'" class="form-control
                            block
                            w-full
                            min-w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idtanggal'. $details->id .'"
                            name="tanggal"/>
                            </td>

                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <input type="number" placeholder="Min. '. $bisa .'" min="'.$bisa.'" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idjumlah'. $details->id .'"
                            placeholder="Masukkan Jumlah" name="jumlah"/>
                            </td>

                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                                <button class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-900 transition duration-300 ease-in-out flex items-center gap-2" id="bayar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                    </svg>
                                Simpan
                                </button>
                            </td>
                        </tr>
                        ';
                    }else{
                        $output.='<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->idPinjam.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->cicilan.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->angsuran.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->bunga.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->tglBayar.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->jumlahBayar.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <div class="text-green-600 p-3 rounded-lg flex items-center gap-2 cursor-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg>
                                Lunas
                            </div>
                            </td>
                        </tr>';
                    }
                }
                $sumd = pinjamanDetail::where('idPinjam', $request->idpinjam)->sum('jumlahBayar');
                $pinjs = pinjaman::where('idPinjam', $request->idpinjam)->first();
                $bung = $pinjs->jumlah * ($pinjs->bunga / 100);
                $jumb = $pinjs->jumlah + $bung;
                $output.='<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">Progres Pembayaran</td>
                    <td colspan="2" class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$sumd.'/'.$jumb.'</td>
                </tr>';
                
                return response()->json(array(
                    'idpinjam' => $iddet->id, 
                    'output' => $output
                ));
            }else {
                return response()->json(array(
                    'idpinjam' => null, 
                    'output' => null
                ));
            }
        }
    }

    public function info(Request $request){
        if ($request->ajax()) {
            $output="";
            $pinj = pinjaman::where('idPinjam', '=', $request->idpinjam)->first();
            if($pinj){
                $angg = anggota::where('noAnggota','=',$pinj->noAnggota)->get();
                
                if($angg != null){
                    foreach($angg as $dataanggota) {
                        if($dataanggota->jKelamin=="L"){
                            $kelamin = "Laki Laki";
                        }else{
                            $kelamin = "Perempuan";
                        }
                        $output.=" 
                        <p><strong>ID Anggota :</strong> $dataanggota->noAnggota</p>
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
            }else{
                $output.="";
            }
            
        }
        return response($output);
    }

    public function infopinjaman(Request $request){
        if ($request->ajax()) {
            $output="";
            $pinj = pinjaman::where('idPinjam', '=', $request->idpinjam)->first();
            if($pinj){
                $output.=" 
                <p><strong>Tanggal :</strong> $pinj->tanggal</p>
                <p><strong>Jumlah :</strong> $pinj->jumlah</p>
                <p><strong>Lama :</strong> $pinj->lama </p>
                <p><strong>Bunga :</strong> $pinj->bunga </p>
                ";
            }else{
                $output.="";
            }
            
        }
        return response($output);
    }
}
