<x-app-layout title="Form Buat Kartu Diksa" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8"  x-data="pages.Settingkartu.settingkartu">
        <div class="flex items-center space-x-4 py-5 lg:py-6"  id="judulheader"  >
          <h2
          class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Form Mengelola Kartu Diksa
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a
                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="#"
                >Forms</a
              >
              <svg
                x-ignore
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewbox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </li>
            <li>Form Kartu Diksa</li>
          </ul>
        </div>

        <div class="grid place-items-center" id="kartu">
          <div
        
           class="mt-20"
            x-data="pages.initCreditCard"
          >
            <div
              class="relative mx-auto -mt-20 h-48 w-80 rounded-lg text-white shadow-xl transition-transform hover:scale-110 lg:h-52 lg:w-96"
             
              >
              <div class="h-full w-full rounded-lg" :class="creditCardUI"></div>
              <div
                class="absolute top-0 flex h-full w-full flex-col justify-between p-4 sm:p-5"
              >
                <div class="flex justify-between">
                  <div>
                    <p class="text-xs+ font-extrabold">Vihara Damai Sejahtera Kwan IM</p>
                    <p
                      id="viewnamaumt"
                      class="font-medium uppercase tracking-wide"
                    >Tandio Frendy</p>
                    <p id="viewtgllhr" class="text-xs+ font-light">19-02-2001</p>
                  </div>
                  <img  
                      src="{{asset('images/logovihara.png')}}"
                      class="w-14 rounded-lg"
                      alt="creditcard"
                    />
                </div>
                <div class="pt-8">
                  <p id="viewvihara" class="font-medium tracking-wide" >Vihara Chien Te</p>
                  <p id="viewtgldiksa" class="text-xs+ font-light"> </p>
                </div>

                <div class="pt-1 flex flex-row  justify-between">
                    <div>
                    <p class="text-xs+ font-light">Pandita</p>
                    <p id="viewpandita" class="font-medium tracking-wide" >陳點傳</p>
                    </div>
                    <div>
                    <p class="text-xs+ font-light">Pengajak</p>
                    <p id="viewpengajak"class="font-medium tracking-wide" >彭露熙講師</p>
                    </div>
                    <div>
                    <p class="text-xs+ font-light">Penanggung</p>
                    <p id="viewpenanggung" class="font-medium tracking-wide" >林細珠講師</p>
                    </div>
                </div>

              </div>
            </div>

            <div
            class="card mt-20 w-full max-w-xl p-4 sm:p-5"
            id="kartudiksa"
            >
            <div class="flex  items-center justify-between py-4 ">
              <p
                class="text-xl font-semibold text-primary dark:text-accent-light"
              >Kartu Diksa</p>
              <div
                class=" text-primary dark:border-accent-light dark:text-accent-light"
              >
              <button
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9"
                    name="btn-print-diksa"
                    id="btn-print-diksa"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
              </div>
            </div>
            <div class="space-y-4" >
            <span class="font-medium text-slate-600 dark:text-navy-100"
                  >Cari Umat :</span
                >
              <label class="flex flex-row justify-between item-center">
                
                <input
                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Input Kode diksa"
                    type="text"
                    
                    id="kodediksa"
                  />
                  <button
                  class="btn mt-1.5 min-w-fit bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  id="carikode"
                  >
                  Check
                </button>
              </label>
              <label class="block">
                  <span>Nama Umat :</span>
                  <input
                    class="form-input mt-1.5 w-full rounded-lg border bg-gray-200 border-slate-300  px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                   readonly
                    placeholder="Nama Umat"
                    id="namaumt"
                    type="text"
                  />
                  <input
                   
                    id="iddiksa"
                    type="hidden"
                  />
                </label>
              <div class="grid grid-cols-3 gap-4">
                <label class="block">
                  <span>Pandita :</span>
                  <input
                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Nama Pandita"
                    id = "namapandita"
                    type="text"
                  />
                </label>
                <label class="block">
                  <span>Pengajak :</span>
                  <input
                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="nama pengajak"
                    id = "namapengajak"
                    type="text"
                  />
                </label>
                <label class="block">
                  <span>Penanggung:</span>
                  <input
                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="nama penanggung"
                    id = "namapenanggung"
                    type="text"
                  />
                </label>
              </div>
              <div class="flex justify-center space-x-2 pt-4">
                <button
                  class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                >
                  Cancel
                </button>
                <button
                  id="savekartu"
                  class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >Save</button>
              </div>
            </div>

            <!-- modal start -->
            <div >
              <div
                id="modalContainer"
                class="fixed inset-0 hidden z-[100]  flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
              >
                <div
                  class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                ></div>
                <div
                  class="relative w-full max-w-4xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
                >
                  <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                      Users Status
                    </h3>
                    <button
                      id="closeModalBtn"
                      class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5"
                        fill="none"
                        viewbox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"
                        ></path>
                      </svg>
                    </button>
                  </div>
                  <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <table class="w-full text-left">
                      <!-- Tabel content -->
                      <thead>
                          <tr
                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                          >
                            <th
                              class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                            >
                              Nama Pendiksa
                            </th>
                            <th
                              class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                            >
                            Jenis Kelamin
                             
                            </th>
                            <th
                              class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                            >
                            Tanggal Lahir
                            </th>
                            <th
                              class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                            >
                              Tanggal Diksa
                            </th>
                            <th
                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                             >
                            Status Kartu
                          </th>
                            <th
                              class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                            >
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody id="tablemodalcontent">
                        
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal end -->
          </div>
          </div>
        </div>
      </main>
</x-app-layout>
