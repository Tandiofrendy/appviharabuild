<x-app-layout title="Form Layout v4" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.userdetsetting.userdetsettings">
        <div
          class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6"
        >
          <div class="flex items-center  space-x-1">
          <i class='fas fa-user text-xl'></i>
            <h2
              class="text-xl ml-1.5 font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
            >
              Data User Detail
            </h2>
           

          </div>
          <button id="exportuser" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Export Excel</button>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12">
            <div class="card">
              <div class="tabs flex flex-col">
                <div class="is-scrollbar-hidden overflow-x-auto">
                  <div class="border-b-2 border-slate-150 dark:border-navy-500">
                    <div class="tabs-list -mb-0.5 flex">
                      <button
                        class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5"
                      >
                        <i class="fa-solid far fa-user-circle text-base"></i>
                        <span>Table</span>
                      </button>
                      
                    </div>
                    
                  </div>
                </div>
                <div class="tab-content p-4 sm:p-5">
                  <div class="space-y-5">
                    <!-- table content -->
                    <div class="card pb-4">
                        <div>
                            <div x-data="pages.datadetailuser.Tabledatauser"></div>
                        </div>
                    </div>
                    <!-- end table content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
