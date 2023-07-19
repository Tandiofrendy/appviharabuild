<x-app-layout title="Form Register Admin" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Form Register Admin
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
            <li>Form register admin</li>
          </ul>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" x-data="pages.Regisadmin.regisadmin">
          <div class="col-span-12 sm:col-span-12">
            <div class="card p-4 sm:p-5">
              <p
                class="text-base font-medium text-slate-700 dark:text-navy-100"
              >
                Daftar Akun Admin
              </p>
              <div class="mt-4 space-y-4">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                 <label class="block">
                    <span>Username</span>
                    <span class="relative mt-1.5 flex">
                      <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Username (contoh: andi,budi)"
                        type="text"
                        id="name"
                      />
                      <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                      >
                        <i class="far fa-user text-base"></i>
                      </span>
                    </span>
                  </label>
                  <label class="block">
                    <span>Email Address</span>
                        <div class="relative mt-1.5 flex">
                        <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Email (contoh: budi@gmail.com)"
                            type="text"
                            id="email"
                        />
                        <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                            <i class="fa-regular fa-envelope text-base"></i>
                        </span>
                        </div>
                  </label>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-12">
                  <label class="block sm:col-span-12">
                    <span>Password</span>
                    <div class="relative mt-1.5 flex">
                      <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Password"
                        type="password"
                        id="password"
                      />
                      <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                      >
                        <i class="fa-solid fa fa-key text-base"></i>
                      </span>
                    </div>
                  </label>
                </div>
                <div class="flex justify-end space-x-2">
                  <button
                    class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    id="simpan"
                    >
                    <span>Simpan</span>
                    
                  </button>
                </div>
              </div>
              <!-- start table -->
              <div>
                <div class="flex items-center justify-between">
                  <h2
                    class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
                  >
                   Data user terdaftar  
                  </h2>
                </div>
                <div class="card mt-3">
                  <div
                      class="is-scrollbar-hidden min-w-full overflow-x-auto"
                    >
                    <table class="is-hoverable w-full text-left">
                      <thead>
                        <tr>
                          <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                          >
                            Email
                          </th>
                          <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                          >
                            Username
                          </th> 
                          <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                          >
                            Role
                          </th>
                          <th
                            class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                          >
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody id="datausertf">
                          
                      </tbody>
                    </table>
                  </div>

                  <div
                    class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5"
                    id="pagination"
                    >
                  </div>
                </div>
              </div>
              <!-- end table -->
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
