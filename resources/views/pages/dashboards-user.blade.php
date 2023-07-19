<x-app-layout title="Education Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full pb-8">
        <div class="mt-5">
            <div class="px-[var(--margin-x)] transition-all duration-[.25s]">
                <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                    Kelas-kelas Vihara Damai Sejahtera Kwan Im
                </p>
            </div>
            <div class="flex ">
                <div class="swiper mx-0 mt-4 px-[var(--margin-x)] transition-all duration-[.25s]" x-init="$nextTick(() => new Swiper($el, { slidesPerView: 'auto', spaceBetween: 18 }))">
                    <div class="swiper-wrapper">
                        <div class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-primary p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Pembelajaran Bahasa Mandarin
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Mingguan</a>
                            </div>

                            <div class="mt-6">  
                                <div class="mt-2 flex items-center justify-between text-primary dark:text-accent-light">
                                    <p class="font-medium">Kelas Anak-anak</p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-secondary p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Tata Cara Sembahyang Pagi-Malam
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Mingguan</a>
                            </div>

                            <div class="mt-6">
                                <div
                                    class="mt-2 flex items-center justify-between text-secondary dark:text-secondary-light">
                                    <p class="font-medium">Kelas Remaja</p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-warning p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Pembelajaran Penerjemahan Bahasa mandarin
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Setiap Jumat</a>
                            </div>

                            <div class="mt-6">
                                <div class="mt-2 flex items-center justify-between text-warning">
                                    <p class="font-medium">Umum</p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-primary p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Pembacaan parita 
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Setiap Malam</a>
                            </div>

                            <div class="mt-6">
                                <div class="mt-2 flex items-center justify-between text-primary dark:text-accent-light">
                                    <p class="font-medium">Semua Umur</p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-secondary p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    "Sharing is Carring"-By Chen Cs
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Ceramah-Sabtu</a>
                            </div>

                            <div class="mt-6">
                                <div
                                    class="mt-2 flex items-center justify-between text-secondary dark:text-secondary-light">
                                    <p class="font-medium">Kelas Anak-anak</p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card swiper-slide w-72 shrink-0 justify-between rounded-xl border-l-4 border-warning p-4">
                            <div>
                                <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                                    "Apa itu TAO ?"- By Lim Cs
                                </p>
                                <a href="#"
                                    class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Ceramah-Minggu</a>
                            </div>

                            <div class="mt-6">
                                <div class="mt-2 flex items-center justify-between text-warning">
                                    <p class="font-medium">Kelas Remaja </p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-5 grid grid-cols-2 gap-4 px-[var(--margin-x)] ">
                <div class="col-span-12 lg:col-span-2 xl:col-span-1">
                    <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                        Kata-kata Bijak Buddha
                    </h3>
                        <div x-init="$nextTick(()=>$el._x_swiper = new Swiper($el, {parallax: true,navigation: { prevEl: '.swiper-button-prev', nextEl: '.swiper-button-next'}}))" class="mt-3 swiper swiper-parallax h-fit  rounded-lg">
                            <div class="parallax-bg" style="background-image: url('{{ asset('images/800x600.png')}}');"  data-swiper-parallax="-23%"></div>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide p-6">
                                        <div class="title text-3xl font-light text-black" data-swiper-parallax="-300">
                                        Slide 1
                                        </div>
                                        <div class="subtitle mt-3 text-2xl text-black" data-swiper-parallax="-200">
                                        Subtitle
                                        </div>
                                        <div class="text mt-4 text-black" data-swiper-parallax="-100">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at,
                                            consectetur cupiditate debitis expedita fugit, modi nemo nobis odit
                                            perferendis quaerat quia reiciendis repudiandae rerum sed?
                                        </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide p-6">
                                        <div class="title text-3xl font-light text-black" data-swiper-parallax="-300">
                                        Slide 2
                                        </div>
                                        <div class="subtitle mt-3 text-2xl text-black" data-swiper-parallax="-200">
                                        Subtitle
                                        </div>
                                        <div class="text mt-4 text-black" data-swiper-parallax="-100">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at,
                                            consectetur cupiditate debitis expedita fugit, modi nemo nobis odit
                                            perferendis quaerat quia reiciendis repudiandae rerum sed?
                                        </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide p-6">
                                        <div class="title text-3xl font-light text-black" data-swiper-parallax="-300">
                                        Slide 3
                                        </div>
                                        <div class="subtitle mt-3 text-2xl text-black" data-swiper-parallax="-200">
                                        Subtitle
                                        </div>
                                        <div class="text mt-4 text-black" data-swiper-parallax="-100">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at,
                                            consectetur cupiditate debitis expedita fugit, modi nemo nobis odit
                                            perferendis quaerat quia reiciendis repudiandae rerum sed?
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>   
                </div>
                <div class="col-span-12 lg:col-span-2 xl:col-span-1">
                    <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                        Lengkapi Informasi Anda.
                    </h3>
                    <div class="mt-3 card shadow-none">
                        <div class="flex flex-1 flex-col justify-between rounded-lg bg-warning p-4 sm:p-5">
                            <div>
                                <h3 class="font-medium text-white line-clamp-2">
                                    Tandio Frendy
                                </h3>
                                <p class="text-xs+ text-amber-50">Informasi Belum Lengkap !!</p>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <p class="text-xs+ text-white">Progress</p>
                                    <div class="progress my-2 h-1.5 bg-white/30">
                                        <span class="w-2/4 rounded-full bg-white"></span>
                                    </div>
                                    <p class="text-right text-xs+ font-medium text-white">50%</p>
                                </div>


                                <div class="mt-1 flex items-center justify-between space-x-2">
                                    <div class="badge h-5.5 rounded-full bg-black/20 px-2 text-xs+ text-white">
                                        1 week left
                                    </div>
                                    <div>
                                        <button
                                            class="btn -mr-1.5 h-8 w-8 rounded-full p-0 text-white hover:bg-white/20 focus:bg-white/20 active:bg-white/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="mt-5 grid grid-cols-8 gap-4 px-[var(--margin-x)] ">
                <div class="col-span-12 lg:col-span-8 xl:col-span-9">
                    <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                        kelas Hari ini
                    </h3>
                    <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                        <div class="card justify-between group transition-colors duration-200  hover:bg-primary p-4 dark:hover:bg-accent sm:p-5">
                            <div class="flex items-center space-x-3 text-white">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">"Mengerti tentang hati tao dan hati manusia"</h3>
                                    <p class="text-xs+  text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">
                                        Penceramah oleh : <span class="font-bold">Pandita Chen</span>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Hari Ini</p>
                                <p class="text-lg font-medium transition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">11:30 - 13:00 WIB</p>

                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100  bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien He
                                    </div>
                                    <button
                                        class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Ming
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Shan
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Shan
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Shan
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Shan
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-8 xl:col-span-9">
                    <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                        kelas Hari ini
                    </h3>
                    <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                        <div class="card justify-between group transition-colors duration-200  hover:bg-primary p-4 dark:hover:bg-accent sm:p-5">
                            <div class="flex items-center space-x-3 text-white">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">"Mengerti tentang hati tao dan hati manusia"</h3>
                                    <p class="text-xs+  text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">
                                        Penceramah oleh : <span class="font-bold">Pandita Chen</span>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Hari Ini</p>
                                <p class="text-lg font-medium transition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">11:30 - 13:00 WIB</p>

                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100  bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien He
                                    </div>
                                    <button
                                        class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Ming
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-between group transition-colors duration-200 hover:bg-primary dark:hover:bg-accent p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base font-medium transition-colors duration-200 text-slate-700 dark:text-navy-100  group-hover:text-white">
                                        "Belajar Mengembangkan dharma"
                                    </h3>
                                    <p class="text-xs+ text-slate-700 transition-colors duration-200 dark:group-hover:text-white dark:text-navy-100 group-hover:text-indigo-100">Oleh Penceramah :<span class="font-bold"> Pandita Lei</span></p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-slate-700 transition-colors duration-200  group-hover:text-indigo-100 dark:group-hover:text-white dark:text-navy-100">Today</p>
                                <p class="text-xl font-mediumtransition-colors duration-200  text-slate-700 group-hover:text-white dark:group-hover:text-white dark:text-navy-100">
                                    16:00 - 16:30
                                </p>
                                
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                    <div class="badge mt-2 group-hover:rounded-full transition-colors duration-200 delay-100 bg-primary/10 text-primary dark:group-hover:text-white dark:text-accent-light group-hover:bg-white/20 group-hover:text-white">
                                        Vihara Chien Shan
                                    </div>
                                    <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
        </div>
       
        

    </main>
</x-app-layout>
