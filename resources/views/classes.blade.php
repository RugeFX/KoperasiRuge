<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
    <form id="up'. $details->cicilan .'" action="'. route("dpin.update", $details->id) .'" method="POST">
    <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" form="up'. $details->cicilan .'">
    <p class="errorform mt-2 text-sm text-red-600 dark:text-red-500">'+error[0]+'</p>
    
    
                <input type="hidden" name="_method" value="PUT" form="up'. $details->cicilan .'">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
        <td class="text-sm text-center text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->idPinjam.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->cicilan.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->angsuran.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->bunga.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
        <input type="date" class="form-control
        block
        w-full
        min-w-full
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
        name="tanggal" form="up'. $details->cicilan .'"/>
        </td>

        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
        <input type="number" min="'.$details->angsuran.'" class="form-control
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
        focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" id="idjumlah"
        placeholder="Masukkan Jumlah" name="jumlah" form="up'. $details->cicilan .'"/>
        </td>

        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
                <button class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-900 transition duration-300 ease-in-out flex items-center gap-2" type="submit" form="up'. $details->cicilan .'" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                Simpan
                </button>
        </td>
        
    </tr>
    </form>

    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">'.$i++.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->idPinjam.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->cicilan.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->angsuran.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->bunga.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->tglBayar.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">'.$details->jumlahBayar.'</td>
        <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">
        <div class="text-green-600 p-3 rounded-lg flex items-center gap-2 cursor-default">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
            </svg>
            Lunas
        </div>
        </td>
    </tr>