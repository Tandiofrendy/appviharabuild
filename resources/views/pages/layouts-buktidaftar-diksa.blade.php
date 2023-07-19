<x-app-layout title="Bukti Daftar Pendiksaan"  is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8"  x-data="pages.repdiksa.repdiksa">
        <input type="hidden" id="iddiksa" value={{$data}}/>
        <div class="flex items-center justify-between py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Bukti Diksa
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
                <div class="flex flex-col justify-between sm:flex-row">
                    <div class="text-center sm:text-left">
                        <div class="flex flex-col justify-center items-center lg:justify-start lg:items-start sm:flex-row   space-y-1 space-x-2 pt-2 ">
                            <img src="{{asset('images/logovihara.png')}}" class="w-20 h-20 " >
                            <h2 class="text-lg  font-semibold  text-primary dark:text-accent-light break-all">
                            YAYASAN VIHARA DAMAI <br> SEJAHTERA  KWAN IM
                            <p class="text-xs text-slate-500">Pontianak,<span class="font-bold text-slate-600">Kalimantan Barat</span></p>
                            </h2>
                            
                        </div>
                        
                     
                    </div>
                    <div class="mt-4 text-center pt-2 sm:m-0 sm:text-right">
                        <h2 class="text-xl font-semibold  text-primary  dark:text-accent-light">
                            Vihara<p id="namavihara"> </p>
                           
                        </h2>
                        <div class="space-y-1 ">
                            <input type="hidden" id="iddiksa" value=$data>
                            <p>Nomer Diksa #: <span class="font-semibold" id="nomordiksa"></span></p>
                            <p>
                                Dibuat: <span class="font-semibold" id="waktucetak"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="flex flex-col justify-between sm:flex-row">
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                            Pendaftar:
                        </p>
                        <div class="space-y-1 pt-2">
                            <p class="font-semibold">Tandio Frendy</p>
                            <p>Vihara@damaisejahtera.com</p>
                            <p>Jl.Setia Budi No.59 Pontianak,Kalimantan Baratnpm.</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center sm:m-0 sm:text-right">
                        <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                            Tanggal Diksa :
                        </p>
                        <div class="space-y-1 pt-2">
                            <p class="font-medium" id="tanggaldiksa">Min,10-Agustus-2020</p>
                        </div>
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto" x-data="pages.tablediksa.datadiksa">
                    <h3 class="font-medium text-xl text-center">BUKTI PENDAFTARAN PENDIKSA</h3>
                    <table class="is-zebra w-full text-left mt-4">
                        <thead>
                            <tr>
                                <th
                                    class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    #
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Deskripsi Calon Diksa
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-3 py-3 text-right font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Jenis Kelamin
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-3 py-3 text-right font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Tgl Lahir
                                </th>
                                <th
                                    class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 text-right font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    No.Hp
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tablebodydiksa"></tbody>
                    </table>
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