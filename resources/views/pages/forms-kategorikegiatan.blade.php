<x-app-layout title="Input Kategori Kegiatan" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Form Input kategori
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-slate-500 transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
              <svg  x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"  fill="none" viewbox="0 0 24 24"  stroke="currentColor">
                <path  stroke-linecap="round"   stroke-linejoin="round"  stroke-width="2"  d="M9 5l7 7-7 7"  />
              </svg>
            </li>
            <li>Form Tambah Kategori Kegiatan</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6 " >
          <div class=" grid col-span-12 lg:col-span-4 lg:place-items-center">
            <div class="card">
              <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"  >
                  <div class="flex items-center space-x-2">
                    <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light" >
                      <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"  >
                      Tambah Kategori Kegiatan
                    </h4>
                  </div>
                </div>
                <div class="space-y-4 p-5" x-data="pages.validasikategori.validate" >
                  <form class="tabinput space-y-2" id="1">
                          <label class="block">
                              <span>Kode Kategori:</span>
                                  <input
                                  x-effect="kodekategori.errorMessage = getErrorMessage(kodekategori.value, kodekategori.validate)"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  :class="{
                                        'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent':!kodekategori.blurred,
                                        'border-error': (kodekategori.blurred && kodekategori.errorMessage),
                                        'border-success': (kodekategori.blurred && !kodekategori.errorMessage)
                                      }"
                                  type="text"
                                  id="kodekategori"
                                  x-model="kodekategori.value"
                                  @blur="kodekategori.blurred = true"
                                  pattern="[A-Z]{2}-\d{3}"
                                  />
                                  <span
                                    class="text-tiny+ text-error"
                                    x-show="kodekategori.blurred && kodekategori.errorMessage"
                                    x-text="kodekategori.customMessage"
                                  ></span>
                          </label>
                          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block col-span-12">
                                <span>Nama Kategori kegiatan</span>
                                <input 
                                  x-effect="namakategori.errorMessage = getErrorMessage(namakategori.value, namakategori.validate)"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" 
                                  :class="{
                                        'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent':!namakategori.blurred,
                                        'border-error': (namakategori.blurred && namakategori.errorMessage),
                                        'border-success': (kodekategori.blurred && !namakategori.errorMessage)
                                      }"
                                  id="namakategori"  
                                  type="text"
                                  x-model="namakategori.value"
                                  @blur="namakategori.blurred = true"
                                />
                                <span
                                    class="text-tiny+ text-error"
                                    x-show="namakategori.blurred && namakategori.errorMessage"
                                    x-text="namakategori.customMessage"
                                  ></span>
                            </label>
                          </div>
                          <div>
                            <span>Keterangan</span>
                            <textarea
                                x-effect="keterangan.errorMessage = getErrorMessage(keterangan.value, keterangan.validate)"
                                rows="4"
                                id="keterangan"
                                class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                :class="{
                                      'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent':!keterangan.blurred,
                                      'border-error': (keterangan.blurred && keterangan.errorMessage),
                                      'border-success': (keterangan.blurred && !keterangan.errorMessage)
                                  }"
                                x-model="keterangan.value"
                                @blur="keterangan.blurred = true"
                                ></textarea>
                                <span
                                  class="text-tiny+ text-error"
                                  x-show="keterangan.blurred && keterangan.errorMessage"
                                  x-text="keterangan.customMessage"
                                ></span>
                          </div>
                    </form>
                  <div class="flex justify-center space-x-2 pt-4" id="forminputt">
                    <button class="btn save space-x-2 bg-primary font-medium text-slate-800 hover:bg-blue-800  active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"    >
                      <span class="text-white savespn">Save</span>
                    </button>
                 
                  </div>
              </div>
              </div>
      
          </div>
          <div class="col-span-12 grid lg:col-span-8">
            <div class="card">
              <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"  >
                <div class="flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light" >
                    <i class="fa-solid fa-layer-group"></i>
                  </div>
                  <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"  >
                    Table Kategori Kegiatan
                  </h4>
                </div>
              </div>
              <div class="space-y-4 p-4 sm:p-5 ">
                    
                    <div class="card pb-4">
                      <div>
                      <div x-data="pages.kategoridata.kategori">
                      <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-hoverable w-full text-left">
                        <thead>
                            <tr>
                            <th
                                class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Kode-Kategori
                            </th>
                            <th
                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Nama Kategori
                            </th>
                            <th
                                class="whitespace-nowrap  bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Keterangan
                            </th>
                            <th
                                class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Action
                            </th>
                            </tr>
                        </thead>
                        <tbody id="getdatajax"></tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                  </div>

                </div>
                </div>
            </div>
          </div>
        </div>
       
      </main>
    <!-- end content wrapper -->
</x-app-layout>
