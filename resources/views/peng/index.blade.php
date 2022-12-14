@extends('template')
@section('content')
<title>Pengambilan Index</title>
    <div class="w-full flex justify-center">
        <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Pengambilan</h1>
    </div>
    
    <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
        <div id="form-modal" class="hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto justify-center bg-black/50">
            <div class="bg-slate-50 m-auto p-5 border border-gray-400 rounded-xl w-[50vw] max-w-5xl">
                <span class="text-green-600 float-right text-2xl font-bold no-underline hover:text-black cursor-pointer" id="modalClose">&times;</span>
                {{-- <form> --}}
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div class="grid grid-cols-2 gap-4 my-6">
                        
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
                              aria-describedby="noAnggota" placeholder="Insert No Anggota" name="noAnggota" readonly>
                        </div>
                        <div class="form-group">
                            <label for="idAmbil" class="form-label inline-block mb-2 text-gray-700">ID Ambil</label>
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
                              focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idambilform"
                              aria-describedby="idambil" placeholder="Insert ID Ambil" name="idAmbil">
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="form-label inline-block mb-2 text-gray-700">Tanggal Pengambilan</label>
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
                    </div>
                    
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t justify-center">
                        <button data-modal-toggle="defaultModal" id="submitForm" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        <div class="flex gap-2 w-1/3 mb-2"> 
            <a href="/" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:border-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
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
                        <table class="min-w-full" id="main-table">
                            <thead class="bg-green-500 border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    #
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Tanggal
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Simpanan
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Jumlah
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="simp">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full" id="main-table">
                            <thead class="bg-green-500 border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    #
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    ID Ambil
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Tanggal
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Jumlah
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                    Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="peng">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    
    $(document).ready(function(){

        $("body").on('click', "#modalOpen",function() {
            $("#form-modal").css("display", "flex");
        })

        $("#modalClose").on('click', function() {
            $("#form-modal").hide();
        })

        $(window).on('click',function(event) {
            if (event.target == $("#form-modal")[0]) {
                $("#form-modal").hide();
            }
        })

        $("body").on('click', "#submitForm", function(e){
            e.preventDefault();

            let token = $("#token").val()
            let noanggota = $("#noanggotaform").val()
            let idambil = $("#idambilform").val()
            let tanggal = $("#tanggalform").val()
            let jumlah = $("#jumlahform").val()

            $.ajax({
                url:"{{ url('/ajaxStore') }}",  
                method:"POST",  
                data:{
                    _token: token,
                    idAmbil : idambil,
                    noAnggota: noanggota,
                    jumlah: jumlah,
                    tanggal: tanggal
                },
                datatype: 'json', 
                cache: false,                         
                success: function(data) {
                    if(data.create == true){
                        $('#form-modal').hide()
                        $('#idambilform').val('')
                        $('#jumlahform').val('')
                        $('.errorform').remove()

                        $.ajax({
                            type:'get',
                            url:'{{URL::to("datapeng")}}',
                            data:{'noangg':noanggota},

                            success:function(dataa){
                                if(dataa != "" || dataa != null){
                                    $('#peng').html(dataa);
                                    $('#noanggotaform').val(noanggota);
                                }else{
                                    $('#peng').empty();
                                }
                            },
                        });
                    }else{
                        console.log('error')
                    }
                },
                error: function (err) {
                    if (err.status == 422) { 
                        $('.errorform').remove()
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<p class="errorform mt-2 text-sm text-red-600 dark:text-red-500">'+error[0]+'</p>'));
                        });
                    }
                    if (err.status == 500) { 
                        
                    }
                }
            });
        })
        $("#noanggota").on('input', function(){
            // alert('test');
            let value=$(this).val();

            if(value){
                $('#info').show();
            } else {
                $('#info').hide();
            }

            $.ajax({

                type:'get',
                url:'{{URL::to('infopeng')}}',
                data:{'infoangg':value},

                success:function(data){
                    $('#info').html(data);
                }

            });
        })
        $("#noanggota").on('input', function(){
            let value=$(this).val();

            if(value){
                $('#simp').show();

                $.ajax({

                type:'get',
                url:'{{URL::to("datasimp")}}',
                data:{'noangg':value},

                success:function(data){
                    if(data != "" || data != null){
                        $('#simp').html(data);
                    }else{
                        $('#simp').empty();
                    }
                }
            });
            } else {
                $('#simp').hide();
            } 
        })
        $("#noanggota").on('input', function(){
            let value=$(this).val();

            if(value){
                $('#peng').show();

                $.ajax({

                type:'get',
                url:'{{URL::to("datapeng")}}',
                data:{'noangg':value},

                success:function(data){
                    if(data != "" || data != null){
                        $('#peng').html(data);
                        $('#noanggotaform').val(value);
                    }else{
                        $('#peng').empty();
                    }
                },
                });
            } else {
                $('#peng').hide();
            } 
        })
    })
</script>
@endsection