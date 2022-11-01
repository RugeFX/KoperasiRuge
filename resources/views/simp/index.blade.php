@extends('template')
@section('content')
{{-- @vite('resources/css/app.css') --}}
<title>Simpanan Index</title>
    
    <div class="w-full flex justify-center">
        <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Simpanan Table</h1>
    </div>
    <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
        <div class="flex mb-4 w-full gap-2">
            <a href="/" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <button class="flex gap-2 items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out" id="modalOpen" >
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                Tambah Simpanan</button>
                <div class="relative my-auto">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="noanggota" class="form-control
                    block
                    w-full
                    pr-3
                    pl-10
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
                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Cari No Anggota">
                </div>
        </div>
        {{-- modal form --}}
        <div id="form-modal" class="fixed hidden z-10 left-0 top-0 w-full h-full overflow-auto justify-center bg-black/50">
            <div class="bg-slate-50 m-auto p-5 border border-gray-400 rounded-xl w-[50vw] max-w-5xl">
                <span class="text-green-600 float-right text-2xl font-bold no-underline hover:text-black cursor-pointer" id="modalClose">&times;</span>
                <form action="{{ route('simp.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 my-6 w-full">
                        <div class="form-group">
                            <label for="idSimpanan" class="form-label inline-block mb-2 text-gray-700">ID Simpanan</label>
                            <input type="text" class="form-control
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idsimpananform"
                              aria-describedby="idSimpanan" placeholder="Insert ID Simpanan" name="idSimpanan">
                        </div>
                        <div class="form-group">
                            <label for="noAnggota" class="form-label inline-block mb-2 text-gray-700">No Anggota</label>
                            <input type="text" class="form-control
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="noanggotaform"
                              aria-describedby="noAnggota" placeholder="Insert No Anggota" name="noAnggota">
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="form-label inline-block mb-2 text-gray-700">Tanggal</label>
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="tanggalform"
                              aria-describedby="tanggal" value="{{ date('Y-m-d') }}" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="idJenis" class="form-label inline-block mb-2 text-gray-700">Jenis</label>
                            <select name="idJenis" id="idJenis" class="form-control
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
                            focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idjenisform"
                            aria-describedby="idJenis">
                                <option value="">Select Jenis</option>
                                @foreach($jsimp as $jenis)
                                <option value="{{ $jenis->idJenis }}">{{ $jenis->jenisSimpanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        
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
                          focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="jumlahform"
                          aria-describedby="jumlah" placeholder="Insert Jumlah" name="jumlah">
                    </div>
                    
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t justify-center">
                        <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                    </div>
                </form>
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
        <div class="flex mb-2 divide-x divide-green-500 bg-green-100 border border-green-500 rounded-lg text-green-900 w-1/2 h-52 border-collapse">
            <div class="w-full px-4 py-3">
                <div class="flex justify-center items-center pb-4">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                    <p class="font-bold">Info Anggota</p>
                    </div>
                </div>
                <div id="info">
                    
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-green-500 border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">No</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">ID Simpanan</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">Tanggal</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">No Anggota</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">ID Jenis</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">Jumlah</th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="all">
                                @foreach($simp as $simpsfor)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">{{ $i++ }}</td>
                                <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $simpsfor->idSimpanan }}</td>
                                <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $simpsfor->tanggal }}</td>
                                <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $simpsfor->noAnggota }}</td>
                                <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $simpsfor->idJenis }}</td>
                                <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $simpsfor->jumlah }}</td>
                                <td>
                                    <form action="{{ route('simp.destroy', $simpsfor->id) }}" method="post">
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
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td colspan="5" class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">Total : </td>
                                <td colspan="2" class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">{{ $total->total }}</td>
                            </tr>
                            </tbody>  
                            <tbody id="search">

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
            $("#noanggota").keyup(function(){
                $value=$(this).val();
                
                if($value){
                    $('#all').hide()
                    $('#search').show()
                }else{
                    $('#all').show()
                    $('#search').hide()
                }

                $.ajax({
                    type: "get",
                    url: "{{ URL::to('noanggota') }}",
                    data: {'noanggota':$value},
                    
                    success: function (data) {
                        $('#search').html(data);
                    }
                });
            })

            $("#idJenis").change(function() {
                let value = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{{URL::to("jenis")}}',
                    dataType: 'json',
                    data: {
                        'jenis': value
                    },
                    success: function(data) {
                        $('#jumlah').val(data['data'])

                        if(data['read']){
                            $("#jumlah").removeAttr("readonly")
                            $("#jumlah").attr("min", data['min'])
                        }else{
                            $("#jumlah").attr("readonly","")
                            $("#jumlah").removeAttr("min")
                        }
                    }
                });
            })

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
                    url:'{{URL::to('infoangg')}}',
                    data:{'infoangg':value},

                    success:function(data){
                        // console.log(data);
                        $('#info').html(data);
                    }

                });
            })
        })
    </script>
@endsection