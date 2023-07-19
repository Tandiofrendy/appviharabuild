<x-app-layout title="User Setting" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8"  x-data="pages.usersetting.UserSettings" >
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            User Setting
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
              <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </li>
            <li>User Setting</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" id="formload"> 
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center space-x-4">
                
                <div>
                @if(Auth::check()) 
                  <h3 class="text-base emailuser font-medium text-slate-700 dark:text-navy-100">{{Auth::user()->email}}</h3>
                  @endif
                  <p class="text-xs+">Administrator</p>
                </div>
              </div>
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#" >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                    <span>Account</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Account Setting
                </h2>
                <div class="flex justify-center space-x-2">
                  <button
                    class="btn save min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >Save</button>
                </div>
              </div>
              <div class="p-4 sm:p-5">
                <div  >
                  <form id="forminputan" class="grid grid-cols-1 gap-4 sm:grid-cols-2" >
                  <label class="block">
                    <span>Nama Mandarin </span>
                    <span class="relative mt-1.5 flex flex-col space-y-1 ">
                      <div class="flex flex-row">
                        <input
                          class="form-input w-full rounded-lg border peer border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter name"
                          type="text"
                          id="nama_mandarin"
                          name="nama_mandarin"
                          required
                        />
                        <span
                        class="text-tiny+ invisible mt-1 mb-1 peer-invalid:visible  text-error pointer-events-none absolute items-end py-9 justify-start  flex"
                        >Nama mandarin wajib isi</span>
                        <span
                          class="pointer-events-none absolute  flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-regular fa-user text-base"></i>
                        </span>
                      </div>
                      
                    </span>
                  </label>
                  <label class="block">
                    <span>Nama Indonesia </span>
                    <span class="relative mt-1.5 flex">
                      <input
                        class="form-input w-full rounded-lg border peer   border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter full name"
                        type="text"
                        id="nama_indonesia"
                        name="nama_indonesia"
                        required
                      />
                      <span
                        class="text-tiny+ invisible mt-1 mb-1 peer-invalid:visible  text-error pointer-events-none absolute items-end py-9 justify-start  flex"
                        >Nama Indonesia Wajib diisi</span>
                      <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                      >
                        <i class="fa-regular fa-user text-base"></i>
                      </span>
                    </span>
                  </label>
                  <label class="block">
                    <span>Email Address </span>
                    <span class="relative mt-1.5 flex">
                      @if(Auth::check()) 
                      <input
                        class="form-input w-full rounded-lg border   border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter email address"
                        type="text"
                        id="email_user"
                        name="email_user"
                        value="{{Auth::user()->email}}"
                        disabled
                      />
                      @endif
                      <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                      >
                        <i class="fa-regular fa-envelope text-base"></i>
                      </span>
                    </span>
                  </label>
                  <label class="block">
                    <span>No Hp</span>
                    <span class="relative mt-1.5 flex">
                      <input
                        class="form-input w-full rounded-lg border peer  border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter phone number"
                        type="text"
                        id="nohp"
                        name="nohp"
                        required
                      />
                      <span
                        class="text-tiny+ invisible mt-1 mb-1 peer-invalid:visible  text-error pointer-events-none absolute items-end py-9 justify-start  flex"
                        >Nama Indonesia Wajib diisi</span>
                      <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                      >
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                  </label>
                  <label class="block">
                    <span>Tahun dan Tgl lahir</span>
                    <span class="relative mt-1.5 flex">
                       <input
                        x-flatpickr="{altInput: true,altFormat: 'F j, Y',dateFormat: 'Y-m-d',}"
                        class="form-input w-full rounded-lg border   border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Choose date..."
                        type="text"
                        id="ttlahir"
                        name="ttlahir"
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
                    </span>
                  </label>
                  <label class="block">
                    <span>Jenis Kelamin</span>
                    <span class="relative flex flex-row space-x-2 mt-3" >
                      <input
                        class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 before:bg-secondary checked:border-secondary hover:border-secondary focus:border-secondary dark:border-navy-500 dark:bg-navy-900 dark:before:bg-secondary-light dark:checked:border-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                        name="jenis"
                        type="radio"
                        value="laki-laki"
                      />
                      <p>Laki-Laki</p>
                      <input
                        class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 before:!bg-success checked:!border-success hover:!border-success focus:!border-success dark:border-navy-500 dark:bg-navy-900"
                        name="jenis"
                        type="radio"
                        value="perempuan"
                      />
                      <p>Perempuan</p>
                    </span>
                  </label>
                  <label class="block">
                    <span>Alamat</span>
                    <textarea
                      rows="4"
                      placeholder=" Enter Text"
                      class="form-textarea w-full resize-none rounded-lg border   border-slate-300 bg-transparent px-3 py-2  placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:bg-navy-600 dark:hover:border-navy-400 dark:focus:border-accent"
                      id="alamat"
                      name="alamat"
                      ></textarea>
                  </label>
                  </form>
                </div>
            </div>
          </div>
        </div>
    </main>
</x-app-layout>
