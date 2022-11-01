@extends('template')
@section('content')
<title>Show</title>

<div class="w-full flex justify-center">
    <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Show Jenis Simpanan</h1>
</div>
<div class="flex gap-2 w-1/3 mb-2">
    <a href="{{ route('jen.index') }}" class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
        <i class='bx bx-arrow-back'></i>
        Kembali
    </a>
</div>

<div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
    <div class="flex justify-start">
        <div class="grid grid-cols-2 mx-10 gap-y-2 gap-x-6">
            <div class="form-title text-green-800">
                <strong>ID Jenis :</strong>
            </div>
            <div class="form-item">
                {{ $jen->idJenis }}
            </div>
            <div class="form-title text-green-800">
                <strong>Jenis Simpanan :</strong>
            </div>
            <div class="form-item">
                {{ $jen->jenisSimpanan }}
            </div>
            <div class="form-title text-green-800">
                <strong>Jumlah :</strong>
            </div>
            <div class="form-item">
                {{ $jen->jumlah }}
            </div>
        </div>
    </div>
@endsection