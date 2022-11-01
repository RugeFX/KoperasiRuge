@extends('template')
@section('content')
<title>Edit</title>

<div class="w-full flex justify-center">
    <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Edit Anggota</h1>
</div>
<div class="flex gap-2 w-1/3 mb-2">
    <a href="{{ route('angg.index') }}" class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
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

<form action="{{ route('angg.update', $angg->id) }}" method="POST">
@csrf
@method('PUT')

        <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
            <div class="flex justify-center">
                <div class="grid grid-cols-2 mx-10 gap-y-2">
                    <div class="form-title">
                        <strong>No Anggota :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="noAnggota"  placeholder="No Anggota" value="{{ $angg->noAnggota }}" class="form-control
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
                        <strong>Nama Anggota :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="namaAnggota"  placeholder="Nama Anggota" value="{{ $angg->namaAnggota }}" class="form-control
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
                        <strong>Jenis Kelamin :</strong>
                    </div>
                    <div class="form-item">
                        <input type="radio" name="jKelamin" value="L" id="L"
                        @if ($angg->jKelamin === "L")
                        checked
                        @endif
                        class="appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label for="L">Laki Laki</label>
                    </div>
                    <div class="form-title"></div>
                    <div class="form-item">
                        <input type="radio" name="jKelamin" value="P" id="P"
                        @if ($angg->jKelamin === "P")
                        checked
                        @endif
                        class="appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label for="P">Perempuan</label>
                    </div>
                    <div class="form-title">
                        <strong>Tempat Lahir :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="tempatLahir"  placeholder="Kota" value="{{ $angg->tempatLahir }}" class="form-control
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
                        <strong>Tanggal Lahir :</strong>
                    </div>
                    <div class="form-item">
                        <input type="date" name="tglLahir"  placeholder="Tanggal Lahir" value="{{ $angg->tglLahir }}" class="form-control
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
                        <strong>Alamat :</strong>
                    </div>
                    <div class="form-item">
                        <textarea name="alamat" cols="30" rows="10" class="form-control
                        block
                        w-full
                        resize-none
                        h-24
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
                        focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none">{{ $angg->alamat }}</textarea>
                    </div>
                    <div class="form-title">
                        <strong>Nomor Telpon :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="noTelpon"  placeholder="Nomor Telepon" value="{{ $angg->noTelpon }}" class="form-control
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
                        <strong>No Identitas :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="noIdentitas" placeholder="Nomor Identitas" value="{{ $angg->noIdentitas }}" class="form-control
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
                        <strong>Password :</strong>
                    </div>
                    <div class="form-item">
                        <input type="text" name="password" placeholder="Password" value="{{ $angg->password }}" class="form-control
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