<?php

namespace App\Http\Controllers;

use App\Models\simpanan;
use Illuminate\Http\Request;
use App\Models\anggota;
use App\Models\jenisSimpanan;
use Illuminate\Support\Facades\DB;

class simpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
        $jsimp = jenisSimpanan::all();
        $simp = simpanan::all();
        // $simp= DB::table('simpanans')
        //         ->select("*")
        //         ->join('jenis_simpanans', 'jenis_simpanans.idJenis', '=', 'simpanans.idJenis')
        //         ->get();
        $total = DB::table('simpanans')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->first();
        return view('simp.index',compact('simp', 'jsimp', 'total'))->with('i', 1);
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
                'idSimpanan' => 'required|unique:simpanans,idSimpanan',
                'tanggal' => 'required',
                'noAnggota' => 'required|exists:anggotas,noAnggota',
                'idJenis' => 'required|exists:jenis_simpanans,idJenis',
                'jumlah' => 'required',
                'userId',
            ]
        );
        simpanan::create($request->all());

        return redirect()->route('simp.index')->with('success', 'Data Berhasil disimpan!');
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
    public function destroy(simpanan $simp)
    {
        //
        $simp->delete();

        return redirect()->route('simp.index')->with('success', 'Simpanan Berhasil di Hapus');
    }

    public function noanggota(Request $request){
        // $simp= DB::table('simpanans')
        //         ->select("*")
        //         ->join('jenis_simpanans', 'jenis_simpanans.idJenis', '=', 'simpanans.idJenis')
        //         ->where('simpanans.noAnggota', 'like', '%' . $request->noanggota. '%')
        //         ->get();
        $simp=simpanan::where('noAnggota', 'like', '%' . $request->noanggota. '%')->get();
        $total = DB::table('simpanans')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->where('noAnggota', '=', $request->noanggota)
                ->first();
        
        $i = 0;
        $output="";

        foreach($simp as $simps){
            $output.=
            '<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'. ++$i .'</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap"> '. $simps->idSimpanan . '</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'. $simps->tanggal .'</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'. $simps->noAnggota .'</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'. $simps->idJenis .'</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$simps->jumlah .'</td>
            <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
            <form action=" '. route("simp.destroy",  $simps->id ).'" method="post">
            '. csrf_field() .'
            '. method_field("DELETE").'
                <button class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-900 transition duration-300 ease-in-out" type="submit" onclick="return confirm(`Apakah anda yakin ingin menghapus data ini?`)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </button>
            </form>
            </td>
        </tr>';
        }
        $output.='<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
        <td colspan="5" class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">Total : </td>
        <td colspan="2" class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'. $total->total .'</td>
        </tr>';

        return response($output);
    }

    public function jenis(Request $request){
        if ($request->ajax()) {
            $output = "";
            $simpanan = jenisSimpanan::all()->where('idJenis', '=', $request->jenis);
            if ($simpanan) {
                if($request->jenis == 2){
                    foreach ($simpanan as $simp) {
                        $output .= $simp->jumlah;
                    }
                    return response()->json(array(
                        'data' => $output, 
                        'read' => true,
                        'min' => 25000
                    ));
                }else{
                    foreach ($simpanan as $simp) {
                        $output .= $simp->jumlah;
                    }
                    return response()->json(array(
                        'data' => $output, 
                        'read' => false,
                        'min' => null
                    ));
                }
            }
        }
    }

    public function infoangg(Request $request){
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
                    <p><strong>No Anggota :</strong> $dataanggota->noAnggota</p>
                    <p><strong>Nama :</strong> $dataanggota->namaAnggota</p>
                    <p><strong>Jenis Kelamin :</strong> $kelamin </p>
                    <p><strong>Tanggal Lahir :</strong> $dataanggota->tglLahir </p>
                    <p><strong>Alamat :</strong> $dataanggota->alamat</p>
                    ";
                }
            }else {
                $output.="
                    <h4>Anggota doesn't exist</h4>    
                ";
            }
        }
        return response($output);
    }
}
