<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\jenisSimpanan;
use App\Models\pengambilan;
use App\Models\pinjaman;
use App\Models\simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('peng.index');
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
        $sumsimp = simpanan::where('noAnggota','=',$request->noAnggota )->where('idJenis', '=', 2)->sum('jumlah');
        $sumpeng = pengambilan::where('noAnggota','=',$request->noAnggota )->sum('jumlah');
        $bisa = $sumsimp - $sumpeng;
        $request->validate([
            'idAmbil' => 'required',
            'noAnggota' => 'required',
            'jumlah' => 'required|numeric|max:'.$bisa,
            'tanggal' => 'required'
        ]);
        pengambilan::create([
            'idAmbil' => $request->idAmbil,
            'tanggal' => $request->tanggal,
            'noAnggota' => $request->noAnggota,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('peng.index')->with('success', 'Data Berhasil disimpan!');
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
    public function destroy(pengambilan $peng)
    {
        //
        $peng->delete();

        return redirect()->route('peng.index')->with('success', 'Pengambilan Berhasil di Hapus');
    }
    public function infopeng(Request $request){
        if ($request->ajax()) {
            $output="";
            $angg = anggota::where('noAnggota','=',$request->infoangg)->get();
            
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
        }
        return response($output);
    }
    public function datasimp(Request $request){
        if($request->ajax()) {
            $output="";
            $simpall = simpanan::where('noAnggota','=',$request->noangg )->get();
            if($simpall){
                $i = 1;
                foreach($simpall as $simps){
                    $jenis = jenisSimpanan::where('idJenis', $simps->idJenis)->first();
                    $output.='
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
                        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$simps->tanggal.'</td>
                        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$jenis->jenisSimpanan.'</td>
                        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$simps->jumlah.'</td>
                        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <form action="'. route('simp.destroy', $simps->id) .'" method="post">
                                '. csrf_field() .'
                                '. method_field('DELETE') .'
                                <button class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-900 transition duration-300 ease-in-out" type="submit" onclick="return confirm(`Apakah anda yakin ingin menghapus data ini?`)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>';
                }
            }else{
                $output.="";
            }
            return response($output);
        }
    }
    public function datapeng(Request $request){
        if($request->ajax()) {
            $output="";
            $angg = anggota::where('noAnggota', $request->noangg )->first();
            $pengall = pengambilan::where('noAnggota','=',$request->noangg )->get();
            
            if($angg){
                $carisuka = jenisSimpanan::where('jenisSimpanan', 'Simpanan Sukarela')->first();
                $sumsimp = simpanan::where('noAnggota','=',$request->noangg )->where('idJenis', '=', $carisuka->idJenis)->sum('jumlah');
                $sumpeng = pengambilan::where('noAnggota','=',$request->noangg )->sum('jumlah');
                $bisa = $sumsimp - $sumpeng;
                if($pengall){
                    $i = 1;
                    foreach($pengall as $pengs){
                        $output.='
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$pengs->idAmbil.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$pengs->tanggal.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$pengs->jumlah.'</td>
                            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                                <form action="'. route('peng.destroy', $pengs->id) .'" method="post">
                                    '. csrf_field() .'
                                    '. method_field('DELETE') .'
                                    <button class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-900 transition duration-300 ease-in-out" type="submit" onclick="return confirm(`Apakah anda yakin ingin menghapus data ini?`)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>';
                    }
                    $output.='
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <td colspan="5" class="text-sm text-center text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <button id="modalOpen" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out" id="modalOpen" >Tambah Pengambilan</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <td colspan="5" class="text-sm text-center text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            Saldo yang bisa diambil : '. $bisa .'
                        </td>
                    </tr>
                    ';
                }else{
                    $output.='
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <td colspan="5" class="text-sm text-center text-green-600 font-light px-6 py-4 whitespace-nowrap">
                            <button id="modalOpen" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out" id="modalOpen" >Tambah Pengambilan</button>
                        </td>
                    </tr>';
                }
            }else{
                $output.="";
            }
            
            return response($output);
        }
    }
    public function ajaxStore(Request $request)
    {
        //
        $sumsimp = simpanan::where('noAnggota','=',$request->noAnggota )->where('idJenis', '=', 2)->sum('jumlah');
        $sumpeng = pengambilan::where('noAnggota','=',$request->noAnggota )->sum('jumlah');
        $bisa = $sumsimp - $sumpeng;
        $request->validate([
            'idAmbil' => 'required',
            'noAnggota' => 'required',
            'jumlah' => 'required|numeric|max:'.$bisa,
            'tanggal' => 'required'
        ]);
        $create = pengambilan::create([
            'idAmbil' => $request->idAmbil,
            'tanggal' => $request->tanggal,
            'noAnggota' => $request->noAnggota,
            'jumlah' => $request->jumlah
        ]);

        if($create){
            return response()->json(array(
                'create' => true,
            ));
        }else{
            return response()->json(array(
                'create' => false,
            ));
        }
        
    }
}
