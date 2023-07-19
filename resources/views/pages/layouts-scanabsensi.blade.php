<x-app-layout title="Laporan Jadwal Kegiatan" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8" >
        <div class="flex items-center justify-between py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Laporan Jadwal
            </h2>

            <div class="flex">
                <button @click="window.print()"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
                <button
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="card px-5 py-12 sm:px-18">
                <div class="flex flex-col justify-between ">
                    <div class="text-center ">
                        <div class="flex flex-col justify-center items-center   space-y-1 space-x-2 pt-2 ">
                            <img src="{{asset('images/logovihara.png')}}" class="w-20 h-20 " >
                            <h2 class="text-xl  font-semibold  text-primary dark:text-accent-light break-all">
                            YAYASAN VIHARA DAMAI <br> SEJAHTERA  KWAN IM
                            <p class="text-xs text-slate-500">Pontianak,<span class="font-bold text-slate-600">Kalimantan Barat</span></p>
                            </h2>
                            
                        </div>
                        
                     
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="flex flex-col justify-center text-center  ">
                        <h1 class="font-bold text-lg ">VIHARA CHIEN HE</h1>
                        <p class="text-sm font-medium text-slate-500">Jl.Siaga Gg.Siaga Citra NO 9 </p>
                        <span class="text-xs  font-bold text-slate-600">Kubu Raya-Kalimantan Barat</span>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <div class="flex flex-col justify-center items-center text-center space-y-10">
                        <div class="w-1/2">
                            <h1 class="text-xl font-bold">Scan Disini</h1>  
                             <p class="font-semibold whitespace-pre-wrap ">Sebelum Memulai Kegiatan Peserta Wajib Scan Kode QR <br> untuk Absensi Kedatangan</p>
                        </div>
                        <div style="background-image: url('{{ asset('images/qrcode/dotted.png')}}'); " class="w-[300px] h-[300px]"  >
                            <div class="flex flex-col justify-center items-center mt-6">
                            {{-- <img  src="data:image/png;base64,{{ DNS2D::getBarcodePNG('231231231231', 'QRCODE',9,9)  }}" alt="barcode"   /> --}}
                            @foreach($data as $kode)
       
                                <?php
                                    $value = $kode->kodeqr;
                                    echo DNS2D::getBarcodeHTML($value, 'QRCODE');
                                ?>
                            @endforeach
                            <div id="isikodeqr"></div>
                            </div>
                        </div>
                        <div >
                           
                                <p class="font-semibold text-xl">Kamp Belajar Malaikat Kecil</p>
                        </div>
                    </div>
                </div>  

                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                    <div class="flex flex-col justify-start sm:flex-row">
                        <div class="mt-4 text-left sm:m-0 ">
                            <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                                Keterangan :
                            </p>
                            <div class="space-y-1 pt-2">
                                <ul class="list-disc ml-4">
                                    <li>Pendiksa wajib Membawa bukti pendaftaran diksa saat melakukan pendiksaaan</li>
                                    <li>Jika ingin mendapatkan informasi lebih hubungi : <span class="font-bold">081231831831</span></li>
                                </ul>

                            </div>
                        </div>
                    </div>           
                </div>

        </div>
    </main>
</x-app-layout>