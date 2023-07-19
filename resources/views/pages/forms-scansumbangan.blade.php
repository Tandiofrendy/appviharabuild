<x-app-layout title="Sumbangan" is-header-blur="true" >
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.absensi.absensijadwal">
        <div class="flex flex-col justify-center items-center" >
            <div class="mt-10">
                 <div id="reader" class="items-center " width="300px"></div>
            </div>
            <!-- <div class="">
                @if(Auth::check()) 
                <input type="hidden" id="email"  value="{{Auth::user()->email}}">
                @endif
            </div> -->
            <div>
            <div x-data="{showModal:false}">
                  <button
                    @click="showModal = true"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  >
                    Origin Top
                  </button>
                  <template x-teleport="#x-teleport-target">
                    <div
                      class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                      x-show="showModal"
                      role="dialog"
                      @keydown.window.escape="showModal = false"
                    >
                      <div
                        class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                        @click="showModal = false"
                        x-show="showModal"
                        x-transition:enter="ease-out"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                      ></div>
                      <div
                        class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                        x-show="showModal"
                        x-transition:enter="easy-out"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="easy-in"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                      >
                        <div
                          class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
                        >
                          <h3
                            class="text-base font-medium text-slate-700 dark:text-navy-100"
                          >
                            Edit Pin
                          </h3>
                          <button
                            @click="showModal = !showModal"
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
                              />
                            </svg>
                          </button>
                        </div>
                        <div class="px-4 py-4 sm:px-5">
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Assumenda incidunt
                          </p>
                          <div class="mt-4 space-y-4">
                            <label class="block">
                              <span>Choose category :</span>
                              <select
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                              >
                                <option>Laravel</option>
                                <option>Node JS</option>
                                <option>Django</option>
                                <option>Other</option>
                              </select>
                            </label>
                            <label class="block">
                              <span>Description:</span>
                              <textarea
                                rows="4"
                                placeholder=" Enter Text"
                                class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                              ></textarea>
                            </label>
                            <label class="block">
                              <span>Website Address:</span>
                              <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="URL Address"
                                type="text"
                              />
                            </label>
                            <label class="inline-flex items-center space-x-2">
                              <input
                                class="form-switch is-outline h-5 w-10 rounded-full border border-slate-400/70 bg-transparent before:rounded-full before:bg-slate-300 checked:border-primary checked:before:bg-primary dark:border-navy-400 dark:before:bg-navy-300 dark:checked:border-accent dark:checked:before:bg-accent"
                                type="checkbox"
                              />
                              <span>Public pin</span>
                            </label>
                            <div class="space-x-2 text-right">
                              <button
                                @click="showModal = false"
                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                              >
                                Cancel
                              </button>
                              <button
                                @click="showModal = false"
                                class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                              >
                                Apply
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </template>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>