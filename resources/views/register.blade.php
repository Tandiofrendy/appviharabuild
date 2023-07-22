<x-base-layout title="Register">
    <main class="grid w-full grow grid-cols-1 place-items-center"  x-data="pages.register.registers">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
            <div class="text-center">
                <img class="mx-auto h-16 w-16 " src="{{asset('images/logovihara.png')}}" alt="logo" />
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        Selamat Datang diweb Vihara Damai Sejahtera Kwan Im
                    </h2>
                    <p class="text-slate-400 dark:text-navy-300">
                        Silahkan Melakukan Register Terlebih dahulu
                    </p>
                </div>
            </div>
  
            <div class="card mt-5 rounded-lg p-5 lg:p-7" >
                <div class="input">

                <label class="relative flex">
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        id="email" name="email" placeholder="Email" type="text" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </label>
                
                <label class="block">
                        <span class="relative mt-4 flex">
                            <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="username"
                            type="text"
                            id="name"
                            name="name"
                            />
                            <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                            <i class="fa-solid fas fa-user text-base"></i>
                            </span>
                        </span>
                </label> 
                <label class="relative mt-4 flex">
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Password" id="password" name="password" type="password" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                </label>
                <label class="relative mt-4 flex">
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Repeat Password" type="password" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                </label>

                </div>

                <div class="verifcode">

                <div class="flex flex-row justify-between "  x-data="pages.register.register">
                    <label class="block">
                        <span class="relative mt-4 flex ">
                            <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="getcode"
                            type="text"
                            id="token_activation"
                            name="token_activation"
                            />
                            <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                            <i class="fa-solid fas fa-key text-base"></i>
                            </span>
                            <button
                                class="btn getcode ml-4 w-52  bg-secondary font-medium text-white shadow-lg shadow-secondary/50 hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90 "
                                >
                                Get Code
                            </button>
                        </span>
                    </label> 
                </div>
                </div>
                <div class="mt-4 text-center text-xs+">
                <button
                    class="btn signup mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Sign Up
                </button>
                <button
                class="btn verif mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Submit
              </button>
                <input type="button" class="sig">
                    <p class="line-clamp-1 mt-4">
                        <span>Sudah mempunyai akun? </span>
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{route('loginView')}}">Login disini!</a>
                    </p>
                </div>
                
        <template id="custom-html-notif">
            <div
              class="flex max-w-xs overflow-hidden rounded-lg bg-navy-600 font-normal"
            >
              <div class="flex items-start p-4">
                <div class="avatar h-10 w-10">
                  <img
                    class="rounded-full"
                    src="{{asset('images/logovihara.png')}}"
                    alt="avatar"
                  />
                  <div
                    class="absolute right-0 h-3 w-3 rounded-full border-2 border-navy-600 bg-primary dark:bg-accent"
                  ></div>
                </div>
              </div>
              <div class="p-2">
                <div class="flex items-center justify-between space-x-2">
                  <h5
                    class="font-medium tracking-wide text-navy-100 line-clamp-1 lg:text-base"
                  >
                    Information
                  </h5>
                  <button
                    data-notification-remove
                    class="btn h-7 w-7 rounded-full p-0 text-white hover:bg-white/20 focus:bg-white/20 active:bg-white/25"
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
                        d="M6 18L18 6M6 6l12 12"
                      ></path>
                    </svg>
                  </button>
                </div>
                <p class="text-navy-100">Kode OTP telah dikirim , silahkan cek email anda</p>
                <div class="flex justify-end px-3 py-1">
                  <a href="#" class="uppercase text-accent-light hover:underline"
                    >show</a
                  >
                </div>
              </div>
            </div>
          </template>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</x-base-layout>
