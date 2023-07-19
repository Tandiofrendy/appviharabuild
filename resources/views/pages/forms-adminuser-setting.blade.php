<x-app-layout title="Form Layout v4" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.tableDataadmin.datauseradmin">
        <div
          class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6"
        >
          <div class="flex items-center space-x-1">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewbox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
            </svg>
            <h2
              class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
            >
              New Admin
            </h2>
          </div>
          <div class="flex justify-center space-x-2">npm run
            <button
              class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
              id="save"
            >Save</button>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div class="tabs flex flex-col">
                <div class="is-scrollbar-hidden overflow-x-auto">
                  <div class="border-b-2 border-slate-150 dark:border-navy-500">
                    <div class="tabs-list -mb-0.5 flex">
                      <button
                        class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5"
                      >
                        <i class="fa-solid fa-layer-group text-base"></i>
                        <span>General</span>
                        </button>
                    </div>
                  </div>
                </div>
                <div class="tab-content p-4 sm:p-5">
                  <div class="space-y-5">
                    <div class="flex items-center justify-between">
                            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                                Admin Table
                            </h2>
                        <div class="flex">
                            <div class="flex items-center" x-data="{isInputActive:false}">
                                <label class="block">
                                    <input
                                    x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                    :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                    class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                    placeholder="Search here..."
                                    type="text"
                                    />
                                </label>    
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div
                            class="is-scrollbar-hidden min-w-full overflow-x-auto"
                            >
                            <table class="is-hoverable w-full text-left">
                                <thead>
                                    <tr>
                                    <th
                                        class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        id
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        Nama Admin
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        Bagian Divisi
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        Role
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="whitespace-nowrap text-center rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                    >
                                        Action
                                    </th>
                                    </tr>
                                </thead>
                                <tbody id="datatable">
                                </tbody>
                                </table>
                            </div>

                            <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5"  >
                                <div class="flex items-center space-x-2 text-xs+">
                                <span>Show</span>
                                    <label class="block">
                                        <select
                                        class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        >
                                        <option>10</option>
                                        <option>30</option>
                                        <option>50</option>
                                        </select>
                                    </label>
                                <span>entries</span>
                            </div>

                            <ol class="pagination">
                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewbox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 19l-7-7 7-7"
                                        />
                                    </svg>
                                    </a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary text-white px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >1</a
                                    >
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg  px-3 leading-tight  transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                    >2</a
                                    >
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >3</a
                                    >
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >4</a
                                    >
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >5</a
                                    >
                                </li>
                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                    <a
                                    href="#"
                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >
                                    <svg
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
                                    </a>
                                </li>
                                </ol>

                                <div class="text-xs+">1 - 10 of 10 entries</div>
                         </div>
                    </div>
                <!-- endtable data -->
                  </div>


                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-4">
            <div class="card space-y-5 p-4 sm:p-5">
              <form id="tabinput">
              <label class="block">
                <span class="font-medium text-slate-600 dark:text-navy-100"
                  >Select User</span
                >
                <select
                  class="mt-1.5 w-full"
                  x-tom-select="pages.Datauser.Umat"
                  placeholder="Select Author..."
                  id="email"
                ></select>
              </label>
              <label class="block">
                <span class="font-medium text-slate-600 dark:text-navy-100"
                  >Divisi</span
                >
                <select
                  class="mt-1.5 w-full"
                  x-tom-select="pages.Datauser.divisi"
                  id="divisi"
                >
                </select>
              </label>
              <label class="block">
                <span class="font-medium text-slate-600 dark:text-navy-100"
                  >Role</span
                >
                <select
                  class="mt-1.5 w-full"
                  x-tom-select="{create: false,sortField: {field: 'text',direction: 'asc'}}"
                  id="role"
                >
                  <option value>Pilih Hak Akses</option>
                  <option value="Admin">Admin</option>
                  <option value="Sub-admin">Sub-admin</option>
             
                </select>
              </label>
              </form>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>