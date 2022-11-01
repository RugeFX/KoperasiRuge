@extends('template')
@section('content')
<title>Show</title>

<div class="w-full flex justify-center">
    <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Show Anggota</h1>
</div>
<div class="flex gap-2 w-1/3 mb-2">
    <a href="{{ route('angg.index') }}" class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
        <i class='bx bx-arrow-back'></i>
        Kembali
    </a>
</div>

<div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
    <div class="flex justify-start">
        <div class="grid grid-cols-2 mx-10 gap-y-2 gap-x-6">
            <div class="form-title text-green-800">
                <strong>No Anggota :</strong>
            </div>
            <div class="form-item">
                {{ $angg->noAnggota }}
            </div>
            <div class="form-title text-green-800">
                <strong>Nama Anggota :</strong>
            </div>
            <div class="form-item">
                {{ $angg->namaAnggota }}
            </div>
            <div class="form-title text-green-800">
                <strong>Jenis Kelamin :</strong>
            </div>
            <div class="form-item">
                @if ($angg->jKelamin === "L")
                    Laki Laki
                @elseif ($angg->jKelamin === "P")
                    Perempuan
                @endif
            </div>
            <div class="form-title text-green-800">
                <strong>Tempat Lahir :</strong>
            </div>
            <div class="form-item">
                {{ $angg->tempatLahir }}
            </div>
            <div class="form-title text-green-800">
                <strong>Tanggal Lahir :</strong>
            </div>
            <div class="form-item">
                {{ $angg->tglLahir }}
            </div>
            <div class="form-title text-green-800">
                <strong>Alamat :</strong>
            </div>
            <div class="form-item">
                {{ $angg->alamat }}
            </div>
            <div class="form-title text-green-800">
                <strong>Nomor Telpon :</strong>
            </div>
            <div class="form-item">
                {{ $angg->noTelpon }}
            </div> 
            <div class="form-title text-green-800">
                <strong>No Identitas :</strong>
            </div>
            <div class="form-item">
                {{ $angg->noIdentitas }}
            </div>
            <div class="form-title text-green-800">
                <strong>Password :</strong>
            </div>
            <div class="form-item">
                {{ $angg->password }}
            </div>
        </div>
    </div>
@endsection