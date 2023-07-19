<x-app-layout title="Quick Launch" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12"  x-data="pages.Onboard.onboardconf">
                <div class="py-5 text-center lg:py-6">
                  <p class="text-sm uppercase">Anda baru mendaftar ?</p>
                  <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                    @if(Auth::check()) 
                    <span class="font-bold">Selamat Datang {{Auth::user()->name}}</span>, Dari mana anda ingin memulai ?
                    @endif
                  </h3>
                </div>
                <div class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                  <div class="card">
                    <div class="flex justify-center p-5">
                      <img class="w-9/12" src="{{asset('images/illustrations/responsive.svg')}}" alt="image"/>
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                      <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                        Pendiksaan
                      </h4>
                      <p class="pt-3">
                        Kami akan membantu anda memilih mendaftarkan proses pendiksaan, anda dapat menentukan jadwal
                        sendiri loh..
                      </p>
                      <button id="btn-diksa" class="btn mt-8 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Klik disini
                      </button>
                    </div>
                  </div>
                  <div class="card">
                    <div class="flex justify-center p-5">
                      <img class="w-9/12" src="{{asset('images/illustrations/performance.svg')}}" alt="image"/>
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                      <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                        Cek Kegiatan
                      </h4>
                      <p class="pt-3">
                        halaman ini akan membawa anda melihat kegiatan yang sedang aktif.
                      </p>
                      <button id="btn-kegiatan" class="btn mt-8 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        klik disini
                      </button>
                    </div>
                  </div>
                </div>
    </main>
</x-app-layout>
