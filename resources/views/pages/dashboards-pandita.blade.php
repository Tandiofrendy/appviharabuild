<x-app-layout title="Pandita Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.cekjadwaltunggu.cekjadwal">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 lg:col-span-8 xl:col-span-9">
                <div :class="$store.breakpoints.smAndUp && 'via-pink-300'"
                    class="card mt-12 bg-gradient-to-l from-orange-300 to-red-400 p-5 sm:mt-0 sm:flex-row">
                    <div class="flex justify-center sm:order-last">
                        <img class="-mt-16 h-40 sm:mt-0" src="{{asset('./images/illustrations/teacher.svg')}}" alt="" />
                    </div>
                    <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                        <h3 class="text-xl">
                            Welcome Back, <span class="font-semibold">@if(Auth::check()) {{Auth::user()->name}} @endif</span>
                        </h3>
                        <p class="mt-2 leading-relaxed">
                            Minggu ini total umat yang telah melakukan pendiksaan adalah 
                            <span id="totaldiksa" class="font-semibold text-navy-700">8</span> Umat baru
                        </p>
                        <p>Pencapaian yang  <span class="font-semibold">Luar biasa !!</span></p>

                        <button
                            id="lihattotal"
                            class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                            Lihat total umat
                        </button>
                    </div>
                </div>

                <!-- hidden dulu -->
                <div class="mt-4 sm:mt-5 lg:mt-6">
                    <div class="flex h-8 items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Jadwal Sementara 
                        </h2>
                    </div>
                    <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5" id="viewjadwal">
                            <div class="flex flex-col">
                                <div
                                    class="skeleton animate-wave h-32 w-full rounded-lg bg-slate-150 dark:bg-navy-500"
                                >
                                </div>
                                            
                            </div>
                            <div class="flex flex-col">
                                <div
                                     class="skeleton animate-wave h-32 w-full rounded-lg bg-slate-150 dark:bg-navy-500"
                                >
                                </div>
                                            
                            </div>
                    </div>
                </div>

                <!-- apex chart -->
                

                <div class="mt-4 sm:mt-5 lg:mt-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Kumpulan Data Laporan
                        </h2>
                    </div>
                    <div class="card mt-3">
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="is-hoverable w-full text-left">
                                <thead>
                                    <tr>
                                        <th
                                            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            JENIS LAPORAN
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            NAMA LAPORAN
                                        </th>

                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5.5 w-5.5 text-primary dark:text-white"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <span class="font-medium text-slate-700 dark:text-navy-100">Form Filter Data Pendiksaan</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <p>Laporan Data Pendiksaan</p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                            <a
                                                href="#"
                                                id="filterdiksa"
                                                class="tag bg-success text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                            >
                                                View
                                            </a>
                                        </td>

                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5.5 w-5.5 text-primary dark:text-white"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <span class="font-medium text-slate-700 dark:text-navy-100">Form Filter Data Absensi</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <p>laporan data absensi</p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                            <a
                                                href="#"
                                                id="dataabsen"
                                                class="tag bg-success text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                            >
                                                View
                                            </a>
                                        </td>

                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5.5 w-5.5 text-primary dark:text-white"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <span class="font-medium text-slate-700 dark:text-navy-100">Form Detail User</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <p>Data Detail Umat</p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                            <a
                                                href="#"
                                                id="detailumat"
                                                class="tag bg-success text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                            >
                                                View
                                            </a>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
            </div>




            <div class="col-span-12 lg:col-span-4 xl:col-span-3">
                <div class="grid grid-cols-1  gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
                    <!-- card untuk biasa -->
                    <div class="rounded-lg bg-info/10 px-4 pb-5 dark:bg-navy-800 sm:px-5">
                        <div class="flex items-center justify-between py-3">
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Data Umat pendiksaan 
                            </h2>
                        </div>
                        <div class="space-y-4" id ="dataumatpd">
                            
                        </div>
                    </div>
                    <!-- end card biasa -->

                    <div class="card p-4">
                        <div class="space-y-1 text-center font-inter text-xs+">
                            <div class="flex items-center justify-between px-2 pb-4">
                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                    July 2023
                                </p>
                                <div class="-mr-1.5 flex space-x-2">
                                    <button
                                        class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button
                                        class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-7 pb-2">
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    SUN
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    MON
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    TUE
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    WED
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    THU
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    FRY
                                </div>
                                <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                                    SAT
                                </div>
                            </div>
                            <div class="grid grid-cols-7 place-items-center">
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    29
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    30
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    31
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    1
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    2
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    3
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    4
                                </button>
                            </div>
                            <div class="grid grid-cols-7 place-items-center">
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    5
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    6
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    7
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    8
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    9
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    10
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    11
                                </button>
                            </div>
                            <div class="grid grid-cols-7 place-items-center">
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    12
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    13
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl font-medium text-primary hover:bg-primary/10 hover:text-primary dark:text-accent-light dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    14
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    15
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    16
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    17
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    18
                                </button>
                            </div>
                            <div class="grid grid-cols-7 place-items-center">
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    19
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    20
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    21
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    22
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    23
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    24
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    25
                                </button>
                            </div>
                            <div class="grid grid-cols-7 place-items-center">
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    26
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    27
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    28
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    29
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    30
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    1
                                </button>
                                <button
                                    class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                                    2
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
</x-app-layout>
