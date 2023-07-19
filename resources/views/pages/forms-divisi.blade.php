<x-app-layout title="Input Kategori Kegiatan" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Form Input Divisi
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
              <svg  x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"  fill="none" viewbox="0 0 24 24"  stroke="currentColor">
                <path  stroke-linecap="round"   stroke-linejoin="round"  stroke-width="2"  d="M9 5l7 7-7 7"  />
              </svg>
            </li>
            <li>Form Tambah Divisi</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6 " x-data="pages.Divisi.divisiconf"  >
          <div class=" grid col-span-12 lg:col-span-4 lg:place-items-center">
            <div class="card">
              <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"  >
                  <div class="flex items-center space-x-2">
                    <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light" >
                      <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"  >
                      Tambah Jenis Divisi
                    </h4>
                  </div>
                </div>
                <div class="space-y-4 p-5"  >
                  <form class="tabinputs space-y-2" id="1">
                          <label class="block">
                              <span>Kode Divisi:</span>
                                  <input
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  placeholder="PB-001"
                                  type="text"
                                  id="kodedivisi"
                                  />
                                  <span
                                    class="text-tiny+ text-error"
                                  ></span>
                          </label>
                          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block col-span-12">
                                <span>Nama Divisi</span>
                                <input 
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" 
            
                                  placeholder="Masukkan nama divisi" 
                                  id="namadivisi"  
                                  type="text"
                                />
                                <span
                                    class="text-tiny+ text-error"
                                  ></span>
                            </label>
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
                    Table Jenis Divisi
                  </h4>
                </div>
              </div>
              <div class="space-y-4 p-4 sm:p-5 ">
                    
                    <div class="card pb-4">
                      <div>
                      <div>
                      <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-hoverable w-full text-left">
                        <thead>
                            <tr>
                            <th
                                class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Kode Divisi
                            </th>
                            <th
                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Nama Divisi
                            </th>
                            <th
                                class="whitespace-nowrap rounded-r-lg text-center bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                Action
                            </th>
                            </tr>
                        </thead>
                        <tbody id="dataajax"></tbody>
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
