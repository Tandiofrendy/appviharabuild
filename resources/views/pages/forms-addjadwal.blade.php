<x-app-layout title="form Jadwal" is-header-blur="true">
    <!-- Main Content Wrapper --> 
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.jadwal.kegiatanconf">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Form Buat Kegiatan
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
            <li>Form Add kegiatan</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 ">
          <div class="col-span-12  ">
            <fieldset id="judul" class="hidden fieldjadwal ">
              <div class="card  p-4 sm:p-5  " id="1" >
                <p
                  class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                  Buat Jadwal Kegiatan
                </p>
                <div class="mt-4 space-y-4">
                  <form id="tabinput">
                  <label class="block">
                  <input type="hidden" id="cekid">
                  <input type="hidden" id="updateid">
                  <input type="hidden" id="kdkeg">
                  <input type="hidden" id="email" value ="@if(Auth::check()) {{Auth::user()->email}} @endif">
                    <span>Judul Kegiatan</span>
                    <span class="relative mt-1.5 flex">
                      <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Kegiatan Kamp Muda-mudi"
                        type="text"
                        name="judulkegiatan"
                        id="judulkegiatan"
                      />
                      <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class=" fas fa-heading text-base"></i>
                      </span>
                    </span>
                  </label>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="block">
                      <span>Vihara</span>
                      <span class="relative mt-1.5 flex">
                        <select  class="form-select  w-full rounded-lg border border-slate-300 bg-white px-3 py-2 pl-9 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" name="vihara" id="vihara">

                        </select>
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent ">
                          <i class=" fas fa-vihara text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Kategori Kegiatan</span>
                      <span class="relative mt-1.5 flex">
                        <select class="form-select  w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="kategorikegiatan" name="kategorikegiatan">
                        </select>
                      </span>
                    </label>
                  </div>
                  <div  class="flex-wrap items-start space-y-2 pt-2 sm:flex sm:space-y-0 sm:space-x-5" >
                      <label class="inline-flex items-center space-x-2">
                        <input
                          class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                          type="checkbox"
                          name="waktuacara"
                          id="waktuacara"
                        />
                        <span>Waktu Acara lebih dari 1 hari.</span>
                      </label>
                    </div>
                    </form>
                  <div class="flex justify-end space-x-2">
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
                 
                </div>
              </div>
            </fieldset>
            <fieldset id="hari" class="hidden fieldjadwal ">
              <div class="card  p-4 sm:p-5 " id="2" >
                  <p
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                  >
                    Buat Jadwal Kegiatan
                  </p>
                  <div class="mt-4 space-y-4">
                    <form id="tabinput1">
                    <label class="relative date1 hidden">
                      <input type="hidden" id="tglmulai"/>
                      <input type="hidden" id="tglselesai"/>

                          <input
                            x-flatpickr="{mode: 'range',dateFormat: 'Y-m-d' }"
                            class="form-input tglrr peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Choose date..."
                            type="text"
                            id="tglrange"
                            name="tglrange"
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
                    <label class="relative flex  date2 ">
                        <input type="hidden" id="tglsl"/>
                        <input
                          x-flatpickr="{altInput: true,altFormat: 'j-F-Y',dateFormat: 'd-m-Y'}"
                          class="form-input  peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Choose date..."
                          type="text"
                          id="tglsingle"
                          name="tglsingle"
                        />
                        <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent ">
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
                    <div class="grid grid-cols-1 gap-4  sm:grid-cols-2">
                      <label class="block">
                          <span>Mulai</span>
                            <div class="relative mt-1.5 flex">
                              <input
                                x-flatpickr="{enableTime: true,noCalendar: true,dateFormat: 'H:i:S',time_24hr:true}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Waktu Mulai Acara.."
                                type="text"
                                id="wktmulai"
                                name="wktmulai"
                              />
                              <div
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent "
                              >
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  class="h-5 w-5"
                                  fill="none"
                                  viewbox="0 0 24 24"
                                  stroke="currentColor"
                                  stroke-width="1.5"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                  />
                                </svg>
                              </div>
                            </div>
                      </label>
                      <label class="block">
                        <span>Selesai</span>
                          <div class="relative mt-1.5 flex">
                            <input
                              x-flatpickr="{enableTime: true,noCalendar: true,dateFormat: 'H:i:S',time_24hr:true}"
                              class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                              placeholder="Waktu Selesai Acara..."
                              type="text"
                              id="wktselesai"
                              name="wktselesai"
                            />
                            <div
                              class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent "
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.5"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                              </svg>
                            </div>
                          </div>
                      </label>
                    </div>
                    <label class="block penceramah">
                        <span>Nama Penceramah</span>
                        <span class="relative mt-1.5 flex">
                          <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Nama Penceramah"
                            type="text"
                            id="namapch"
                            name="namapch"
                          />
                          <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                          >
                            <i class="fa-solid fas fa-user text-base"></i>
                          </span>
                        </span>
                      </label>
                    <label class="block">
                      <span>Keterangan</span>
                      <textarea
                        rows="4"
                        placeholder="Keterangan kegiatan"
                        class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        id="keterangan"
                        name="keterangan"
                        ></textarea>
                    </label>
                    </form>
                    <div class="flex justify-end space-x-2">
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
                    
                  </div>
              </div>
            </fieldset>
            <fieldset id="preview" class="hidden fieldjadwal ">
              <div class="card  p-4 sm:p-5 " id="3" >
                  <p
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                  >
                    Preview Jadwal Kegiatan
                  </p>
                  <div class="mt-4 space-y-4">

                      <div class="card flex-row overflow-hidden">
                            <div class="h-50 w-1 bg-gradient-to-b from-info to-info-focus"></div>
                            <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                                <div>
                                    <h2 class="text-3xl font-bold text-slate-700 line-clamp-2 dark:text-navy-100" id="jdltxt">judul</h2>
                                    <div class="flex flex-row">
                                      <span class="mt-1.5 text-xs+ font-medium" >Oleh Penceramah   </span> 
                                      <p class="mt-1.5 text-xs+ font-medium" >: <p class="text-xs+ ml-1.5 mt-1.5 font-bold text-slate-700  " id="pchtxt"></p></p>
                                    </div>
                              
                                    <h3 class="mt-3 font-bold text-xl text-slate-700 line-clamp-2 dark:text-navy-100" id="vhrtxt">
                                        Vihara Chien He
                                    </h3>
                                    <div class="flex flex-row">
                                      <span class="text-xl font-semibold text-slate-700" >Hari   </span> 
                                      <p class="text-xl ml-10 text-slate-700" >: <p class="text-xl ml-1.5 text-slate-700" id="haritxt"></p></p>
                                    </div>
                                    <div class= "flex flex-row">
                                      <span class="text-xl font-semibold text-slate-700">Waktu </span>
                                      <p class="text-xl ml-4 text-slate-700" >: <p class="text-xl ml-1.5 text-slate-700" id="waktutxt"></p></p>
                                    </div>
                                    <h4 class="mt-3 text-xs+ font-bold text-slate-500" >Keterangan : <p id="kettxt"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, facilis?</p></h4>

                                </div>
                                <div class="mt-8 flex justify-between">
                                    <div class=" flex space-x-1.5">
                                        <a href="#"
                                            class="tag bg-info py-1 px-1.5 text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90" >
                                            <p id="jenistxt">sdfsdfsdf</p>
                                        </a>
                                    </div>
                                    <button
                                        class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                        </svg>
                                    </button>
                                </div>
                              </div>
                        </div>
                    <div class="flex justify-end mt-8  space-x-2">
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
                        class="btn simpan  space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                      >Simpan</button>
                    </div>
                  </div>
            </fieldset>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-4 mt-8">
          <div class="col-span-12">
            <div class=" min-w-full overflow-x-auto">
              <table class="is-hoverable w-full text-left">
              <thead>
                  <tr>
                  <th
                      class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      ID
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Kode Kegiatan
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Kategori kegiatan
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Vihara
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Judul Kegiatan
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Tanggal Kegiatan 
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Tanggal selesai
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Jam Mulai
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Jam Selesai
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Lama kegiatan
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                      Nama penceramah
                  </th>
                  <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
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
              <tbody id="dataajax"></tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
