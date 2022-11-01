@extends('template')
@section('content')
{{-- @vite('resources/css/app.css') --}}
{{-- <link rel="stylesheet" href="{{ asset('tw.css') }}"> --}}
<title>Detail Pinjaman Index</title>
    <div class="w-full flex justify-center">
        <h1 class="text-3xl font-bold mb-8 text-green-600 ml-0">Detail Pinjaman</h1>
    </div>
    <div class="mr-2 bg-gray-50 p-4 rounded-xl border border-slate-200">
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
                    <input type="search" id="idpinjam" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Cari ID Pinjam">
                </div>
        </div>
        <div class="flex mb-2 divide-x divide-green-500 bg-green-100 border border-green-500 rounded-lg text-green-900 w-full h-52 border-collapse">
            <div class="w-1/2 px-4 py-3">
                <div class="flex justify-center items-center pb-4">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                    <p class="font-bold">Info Anggota</p>
                    </div>
                </div>
                <div id="info">
                    
                </div>
            </div>
            <div class="w-1/2 px-4 py-3">
                <div class="flex justify-center items-center pb-4">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                    <p class="font-bold">Info Pinjaman</p>
                    </div>
                </div>
                <div id="infopinjaman">
                    
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
                       
                        {{-- <form id="act" action="" method="POST">
                        @csrf
                        @method('PATCH') --}}
                            <table class="min-w-full" id="main-table">
                                <thead class="bg-green-500 border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        #
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        ID Pinjaman
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Cicilan
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Angsuran
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Bunga
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Tanggal Bayar
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left min-w-72">
                                        Jumlah Bayar
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-white px-6 py-4 text-left">
                                        Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="search">

                                </tbody>
                            </table>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#idpinjam").on('input', function(){
            let value=$(this).val();

            if(value){
                $('#search').show();

                $.ajax({

                type:'get',
                url:'{{URL::to("caridetail")}}',
                data:{'idpinjam':value},

                success:function(data){
                    console.log(data);
                    if(data['idpinjam'] != null){
                        // $('#act').attr('action', '{{ route("dpin.update", "")}}' + "/" + data['idpinjam'])
                        $('#search').html(data['output']);
                    }else{
                        // $('#act').removeAttr('action')
                        $('#search').empty();
                    }
                }
                });
            } else {
                $('#search').hide();
            } 
        })
        $("#idpinjam").on('input', function(){
            // alert('test');
            let value=$(this).val();

            if(value){
                $('#info').show();
            } else {
                $('#info').hide();
            }

            $.ajax({

                type:'get',
                url:'{{URL::to("infoanggotadetail")}}',
                data:{'idpinjam':value},

                success:function(data){
                    // console.log(data);
                    $('#info').html(data);
                }
            });
        })
        $("#idpinjam").on('input', function(){
            // alert('test');
            let value=$(this).val();

            if(value){
                $('#infopinjaman').show();
            } else {
                $('#infopinjaman').hide();
            }

            $.ajax({

                type:'get',
                url:'{{URL::to("infopinjaman")}}',
                data:{'idpinjam':value},

                success:function(data){
                    // console.log(data);
                    $('#infopinjaman').html(data);
                }
            });
        })
        $("body").on('click', "#bayar", function(e){
            e.preventDefault();

            let idDet = $(this).closest('tr').attr('id');

            let token = $("#token").val()
            let method = $("#method").val()
            let tanggal = $("#idtanggal" + idDet).val()
            let jumlah = $("#idjumlah" + idDet).val()

            // alert(idDet + " " + tanggal + " " + jumlah);

            $.ajax({
                url:"{{ route('dpin.update', '') }}" + "/" + idDet,  
                method:"POST",  
                data:{
                    _token: token,
                    _method: method,
                    iddet: idDet,
                    jumlah: jumlah,
                    tanggal: tanggal
                },
                datatype: 'json', 
                cache: false,                         
                success: function(data) {
                    if(data.update == true){
                        $.ajax({
                            type:'get',
                            url:'{{URL::to("caridetail")}}',
                            data:{'idpinjam':data.idpinjam},

                            success:function(data){
                                console.log(data);
                                if(data.idpinjam != null){
                                    $('#search').html(data.output);
                                }else{
                                    $('#search').empty();
                                }
                            }
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
                            var el = $(document).find('[id="id'+ i + idDet +'"]');
                            el.after($('<p class="errorform mt-2 text-sm text-red-600 dark:text-red-500">'+error[0]+'</p>'));
                        });
                    }
                }
            });
        })
    })
</script>
@endsection