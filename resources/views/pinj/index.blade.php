@extends('template')
@section('content')
{{-- @vite('resources/css/app.css') --}}
{{-- <link rel="stylesheet" href="{{ asset('tw.css') }}"> --}}
<title>Pinjaman Index</title>
    <div class="w-full flex justify-center">
        <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Pinjaman</h1>
    </div>

    <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
        <div class="flex mb-4 gap-2">
            <a href="/" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            
            <button class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out" id="modalOpen" ><svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>Tambah Pinjaman</button>
            <div id="form-modal" class="fixed hidden z-10 left-0 top-0 w-full h-full overflow-auto justify-center bg-black/50">
                <div class="bg-slate-50 m-auto p-5 border border-gray-400 rounded-xl w-[50vw] max-w-5xl">
                    <span class="text-green-600 float-right text-2xl font-bold no-underline hover:text-black cursor-pointer" id="modalClose">&times;</span>
                    <form action="{{ route('pinj.store') }}" method="POST">
                        @csrf
                        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md float-right w-[45%] h-44" role="alert">
                            <div class="flex justify-center items-center pb-4">
                              <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                              <div>
                                <p class="font-bold">Info Anggota</p>
                              </div>
                            </div>
                            <div id="info">
                                
                            </div>
                        </div>
                        <div class="form-group my-6">
                            <label for="idPinjam" class="form-label inline-block mb-2 text-gray-700">ID Pinjam</label>
                            <input type="text" class="form-control
                              block
                              w-[49%]
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idpinjam"
                              aria-describedby="idPinjam" placeholder="Insert ID Pinjam" name="idPinjam">
                        </div>
                        <div class="form-group my-6">
                            <label for="noAnggota" class="form-label inline-block mb-2 text-gray-700">No Anggota</label>
                            <input type="text" class="form-control
                              block
                              w-[49%]
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="noanggota"
                              aria-describedby="noAnggota" placeholder="Insert No Anggota" name="noAnggota">
                        </div>
                        <div class="grid grid-cols-2 gap-4 my-6">
                            <div class="form-group">
                                <label for="tanggal" class="form-label inline-block mb-2 text-gray-700">Tanggal Pinjam</label>
                                <input type="date" class="form-control
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
                                  focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="tanggal"
                                  aria-describedby="tanggal" value="{{ date('Y-m-d') }}" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="form-label inline-block mb-2 text-gray-700">Jumlah</label>
                                <input type="number" class="form-control
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
                                  focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="jumlah"
                                  aria-describedby="jumlah" placeholder="Insert Jumlah" name="jumlah">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 my-6">
                            <div class="form-group">
                                <label for="lama" class="form-label inline-block mb-2 text-gray-700">Lama</label>
                                <select class="form-control
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
                                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="lama"
                                    aria-describedby="lama" placeholder="Insert Lama" name="lama">
                                    <option value="">-</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                    <option value="24">24 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bunga" class="form-label inline-block mb-2 text-gray-700">Bunga</label>
                                <input type="number" class="form-control
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
                                  focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="bunga"
                                  aria-describedby="bunga" placeholder="Insert Bunga" name="bunga">
                            </div>
                        </div>
                        
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t justify-center">
                            <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            
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
        
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-green-500 border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    #
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    ID Pinjaman
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Tanggal
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    No Anggota
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Jumlah
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Jumlah Bayar
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Lama
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Bunga
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="all">
                                @foreach($pinj as $pinjs)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">{{ $i++ }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->idPinjam }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->tanggal }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->noAnggota }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->jumlah }}</td>
                                    @php
                                        $bungar = $pinjs->jumlah * $pinjs->bunga / 100;
                                        $total = $pinjs->jumlah + $bungar;
                                    @endphp
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $total }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->lama }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $pinjs->bunga }}</td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('pinj.destroy', $pinjs->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-900 transition duration-300 ease-in-out" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var modal = document.getElementById("form-modal");
    var open = document.getElementById("modalOpen");
    var close = document.getElementById("modalClose");

    // When the user clicks on the button, open the modal
    open.onclick = function() {
        modal.style.display = "flex";
    }

    // When the user clicks on <span> (x), close the modal
    close.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>
<script>
    $(document).ready(function(){
        $("#noanggota").on('keyup', function(){
            // alert('test');
            let value=$(this).val();

            if(value){
                $('#info').show();
            } else {
                $('#info').hide();
            }

            $.ajax({

                type:'get',
                url:'{{URL::to("info")}}',
                data:{'infoangg':value},

                success:function(data){
                    console.log(data);
                    $('#info').html(data);
                }
            });
        })
    })
</script>
@endsection