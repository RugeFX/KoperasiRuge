@extends('template')
@section('content')
<title>Create</title>
<div class="w-full flex justify-center">
    <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Tambah Jenis Simpanan</h1>
</div>
<div class="flex gap-2 w-1/3 mb-2">
    <a href="{{ route('jen.index') }}" class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
        <i class='bx bx-arrow-back'></i>
        Kembali
    </a>
</div>

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Waduh!</strong>
    <span class="block sm:inline">Gagal menambah....</span>
    <ul>
        @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        
<form action="{{ route('jen.store') }}" method="POST">
    @csrf
        
    <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
        <div class="flex justify-center">
            <div class="grid grid-cols-2 mx-10 gap-y-2">
                <div class="form-title">
                    <strong>ID Jenis :</strong>
                </div>
                <div class="form-item">
                    <input type="text" name="idJenis"  placeholder="ID Jenis" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none">
                </div>
                <div class="form-title">
                    <strong>Jenis Simpanan :</strong>
                </div>
                <div class="form-item">
                    <input type="text" name="jenisSimpanan"  placeholder="Jenis Simpanan" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none">
                </div>
                <div class="form-title">
                    <strong>Jumlah :</strong>
                </div>
                <div class="form-item">
                    <input type="text" name="jumlah"  placeholder="Jumlah" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none">
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-2">
            <button type="submit" class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">Simpan</button>
        </div>
    </div>
</form>
@endsection
