<x-app-layout title="form Jadwal" is-header-blur="true">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Main Content Wrapper --> 
      <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.daftardik.dafdiksa">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Pendaftaran Pendiksaan
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
            <li>Form Daftar Diksa</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 grid lg:col-span-12">
            <div class="card">
              <div
                class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"
              >
                <div class="flex items-center space-x-2">
                  <div
                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                  >
                    <i class="fa-solid fa-layer-group"></i>
                  </div>
                  <h4
                    class="text-lg font-medium text-slate-700 dark:text-navy-100"
                  >
                    General
                  </h4>
                </div>
              </div>
             
              <div class=" p-4 sm:p-5">
                <div class="isAlert"></div>             
                  <fieldset id="pilihhari" class="space-y-4 mt-4 ">
                      <label class="relative flex">
                          <input
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Choose date..."
                                type="text"
                                id="tgldiksa"
                                name="tgldiksa"
                            />
                            <input
                                class="form-input hidden peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Choose date..."
                                type="text"
                                id="tgldiksapdf"
                                name="tgldiksapdf"
                            />
                          <div
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-5 w-5 transition-colors duration-200"
                              fill="none"
                              viewbox="0 0 24 24"
                              stroke="currentColor"
                              stroke-width="1.5"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                              />
                            </svg>
                          </div>
                      </label>
                      <label class="block">
                        <span>Vihara</span>
                        <span class="relative mt-1.5 flex">
                          <select id="select-vihara" class="form-select  w-full rounded-lg border border-slate-300 bg-white px-3 py-2 pl-9 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" name="vihara" id="vihara">
                            <option value="">---pilih---</option>
                          </select>
                          <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent ">
                            <i class=" fas fa-vihara text-base"></i>
                          </span>
                        </span>
                      </label>

                  <div x-data="{sameBillingAddress:false}">
                    <div
                      class="flex-wrap items-start space-y-2 pt-2 sm:flex sm:space-y-0 sm:space-x-5"
                    >
                      <label class="inline-flex items-center space-x-2">
                        <input
                          x-model="sameBillingAddress"
                          class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                          type="checkbox"
                          id="tambah-pdf"
                        />
                        <span>Bukan untuk sendiri ?</span>
                      </label>
                      <div>
                        <button
                          @click="sameBillingAddress = false"
                          class="border-b border-dotted border-current pb-0.5 font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
                        >
                          Tambahkan data pendaftar.
                        </button>
                      </div>
                    </div>
                    <div x-show="sameBillingAddress" x-collapse>
                      <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-3" id="pilihan"></div>
                    </div>
                  </div>
                      <div class="flex justify-center space-x-2 pt-4">
                        <button
                          class="btn next space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                        >
                          <span>Next</span>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewbox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </button>
                      </div>               
                  </fieldset>
                  <fieldset id="inputdata" class="space-y-4  hidden">
                    <fieldset class="space-y-4 p-2 ">
                      <div class="border-b border-slate-200  dark:border-navy-500 sm:px-2">
                        <div >
                          <h4
                            class="text-lg font-medium text-slate-700 dark:text-navy-100"
                          >
                          Data diri pendaftar
                          </h4>
                        </div>
                      </div>
                        <label class="block">
                              <input
                                  class="form-input hidden disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  type="text"
                                  id="idpdf"
                                  name="idpdf"
                                  readonly
                                  
                                />
                                <input
                                class="form-input hidden  disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                type="text"
                                id="no-hppdf"
                                name="no-hppdf"
                                readonly
                                
                              />
                                
                          <span>Nama :</span>
                          <span class="relative mt-1.5 flex">
                            <input
                              class="form-input disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                              placeholder="tandio frendy"
                              type="text"
                              id="namapdf"
                              name="namapdf"
                              readonly
                            />
                            <span
                              class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                              <i class="fa-solid fas fa-user text-base"></i>
                            </span>
                          </span>
                        </label> 
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                          <label class="block">
                            <span>Email :</span>
                            <span class="relative mt-1.5 flex">
                            @if(Auth::check()) 
                              <input
                                class="form-input disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="tandio@gmail.com"
                                type="text"
                                id="emailpdf"
                                name="emailpdf"
                                value="{{Auth::user()->email}}"
                                readonly
                              />
                              @endif
                              <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                              >
                                <i class="fa-solid fas fa-at text-base"></i>
                              </span>
                            </span>
                          </label> 
                          <div class="grid grid-cols-2 gap-4">
                            <label class="block">
                              <span>Jenis Kelamin :</span>
                              <span class="relative mt-1.5 flex">
                                <input
                                  class="form-input disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  placeholder="laki-laki"
                                  type="text"
                                  id="jkelaminpdf"
                                  name="jkelaminpdf"
                                  readonly
                                />
                                <span
                                  class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                >
                                  <i class="fa-solid fas fa-venus-mars text-base"></i>
                                </span>
                              </span>
                            </label> 
                            <label class="block">
                              <span>Tgl Lahir :</span>
                              <span class="relative mt-1.5 flex">
                                <input
                                  class="form-input disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  placeholder="19-10-2022"
                                  type="text"
                                  id="tlahirpdf"
                                  name="tlahirpdf"
                                  readonly
                                />
                                <span
                                  class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                >
                                  <i class="fa-solid far fa-calendar-alt text-base"></i>
                                </span>
                              </span>
                            </label> 
                          </div>
                        </div>                           
                    </fieldset>   
                      <div id="dinamisform"></div>
                      <div class="flex justify-center space-x-2 pt-4">
                          <button
                            class="btn prev space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-5 w-5"
                              viewbox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"
                              />
                            </svg>
                            <span>Prev</span>
                          </button>
                          <button
                            class="btn save space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                          >
                            <span>Save</span>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-5 w-5"
                              viewbox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </button>
                      </div>                                            
                  </fieldset>

                  <!-- modal kedua -->
                  <div>
                  <template x-teleport="#x-teleport-target">
                    <div id="modalTemplate" class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" style="display: none;">
                      <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"></div>
                      <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5">
                      <i class="fas fa-info-circle text-success text-7xl mb-4"></i>
                        <div class="mt-4">
                          <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                           Terdeteksi inputan belum selesai!
                          </h2>
                          <p id="isimodalv2" class="mt-2">
                             
                          </p>
                          <button id="close" class="btn   mt-6 bg-slate-200 font-medium text-black">
                            Tidak
                          </button>
                          <button id="oke" class="btn mt-6 bg-primary font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                            Boleh
                          </button>
                        </div>
                      </div>
                    </div>
                  </template>
                </div>


                  <!-- end modak kedua -->
                  <!-- {{--
                  akhir modal
                  --}} -->
                  
                      <template x-teleport="#x-teleport-target" >
                        <div id="my-modal" class="hidden" >
                        <div
                          
                          class="fixed  inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                       
                          role="dialog"
                        >
                          <div
                            class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                  
                            x-transition:enter="ease-out"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                          ></div>
                          <div
                            class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                      
                            x-transition:enter="ease-out"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="inline h-28 w-28 text-success"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                              ></path>
                            </svg>

                            <div class="mt-4">
                              <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                Informasi
                              </h2>
                              <p class="mt-2">
                                kuota registrasi telah habis, silahkan ambil tanggal lain jika ingin melanjutkan proses pendiksaan. Terima kasih.
                              </p>
                              <button
                                class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                id="btn-hapus-mo"
                                >
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </template>
               

                  <!-- {{--
                  akhir modal
                  --}} -->
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
