import Toastify from "toastify-js";
export function cekjadwal(){
    var urls = window.location.origin;
    let func = {
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        resetinput: function(){
            $(".tabinputs")[0].reset()
        },
        viewjws : function(){
            $.ajax({
                type: "GET",
                url : urls + "/api/Jadwalkegiatan/View",
                dataType : "json",
                success : function(jwl){
                    let isi = jwl.data
                    $("#viewjadwal").empty();
                    $.each(isi,function(i,data){
                        $("#viewjadwal").append(`
                        <div class="card space-y-4 p-5">
                        <div class="flex items-center space-x-3">
                            <div>
                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                   ` + data.kode_kegiatan + `
                                </h3>
                            </div>
                        </div>
                        <div>
                            <p>Jadwal Kegiatan Vihara</p>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <div x-data="{showModal2:false}">
                                <button
                                    @click="showModal2 = true"
                                    class="btn h-7 w-7 rounded-full bg-success/10 p-0 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <template x-teleport="#x-teleport-target">
                                  <div
                                    class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                    x-show="showModal2"
                                    role="dialog"
                                    @keydown.window.escape="showModal2 = false"
                                  >
                                    <div
                                      class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                      @click="showModal2 = false"
                                      x-show="showModal2"
                                      x-transition:enter="ease-out"
                                      x-transition:enter-start="opacity-0"
                                      x-transition:enter-end="opacity-100"
                                      x-transition:leave="ease-in"
                                      x-transition:leave-start="opacity-100"
                                      x-transition:leave-end="opacity-0"
                                    ></div>
                                    <div
                                      class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                                      x-show="showModal2"
                                      x-transition:enter="ease-out"
                                      x-transition:enter-start="opacity-0"
                                      x-transition:enter-end="opacity-100"
                                      x-transition:leave="ease-in"
                                      x-transition:leave-start="opacity-100"
                                      x-transition:leave-end="opacity-0"
                                    >
                
                                      <div class="px-4 py-4 sm:px-5">
                                        <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                            Apakah anda yakin ?
                                        </h2>
                                        <p class="mt-2">
                                            Jadwal yang telah disetujui, status akan berubah menjadi siap diposting,
                                            silahkan mengecek terlebih dahulu sebelum menyetujuinya.
                                        </p>
                                        <div class="space-x-2 mt-4" >
                                        <button
                                        @click="showModal2 = false"
                                            class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                            >
                                            Cancel
                                        </button>
                                        <button
                                        @click="showModal2 = false"
                                            class="btn min-w-[7rem]  rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                            id="admit`+i+`"
                                            >
                                        Setujui
                                        </button>
                                    </div>                         
                                      </div>
                                    </div>
                                  </div>
                                </template>
                              </div>
                                <div x-data="{showModal1:false}" >
                                        <button
                                            @click="showModal1 = true"
                                            class="btn h-7 w-7 komplain`+i+` rounded-full bg-error/10 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                                viewbox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </button>
                                        <template x-teleport="#x-teleport-target"    >
                                        <div
                                            class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                            x-show="showModal1"
                                            role="dialog"
                                          
                                            @keydown.window.escape="showModal1 = false"
                                        >
                                            <div
                                                class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                @click="showModal1 = false"
                                                x-show="showModal1"
                                                x-transition:enter="ease-out"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                            ></div>
                                            <div
                                                class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                                x-show="showModal1"
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
                                                @click="showModal1 = !showModal1"
                                             
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
                                                Anda dapat memberitahukan kepada perancang kegiatan, bagian mana yg harus diperbaiki
                                                dengan menuliskan pada deskripsi pada judul yg akan anda pilih .
                                                </p>
                                                <div class="mt-4 space-y-4">
                                                <div id="formkomplain`+i+`"></div>
                                                <div class="space-x-2 text-right" >
                                                    <button
                                                    @click="showModal1 = false"
                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                                    >
                                                    Cancel
                                                    </button>
                                                    <button
                                                    @click="showModal1 = false"
                                                    class="btn min-w-[7rem]  rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                                    id="decline`+i+`"
                                                    >
                                                   update
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </template>
                                    </div>
                            </div>
                            <div x-data="{showModal:false}">
                                <button
                                    @click="showModal = true"
                                   class="btn h-7 w-7 desk`+i+` rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                    </svg>
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
                                        class="relative w-full max-w-screen-2xl rounded-lg  bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
                                        x-show="showModal"
                                        x-transition:enter="easy-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        x-transition:leave="easy-in"
                                        x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
                                        x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]"
                                    >
                                     <div class="flex h-8 items-center justify-between pl-4 pr-4">
                                        <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                            Kegiatan Kelas yang akan datang
                                        </h2>
                                    </div>
                                          <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 pl-4 pr-4 " id="viewjadwaltemp`+i+`">
                                            <div class="flex flex-col">
                                            <div
                                                class="skeleton animate-wave h-48 w-full rounded-lg bg-slate-150 dark:bg-navy-500"
                                            >
                                            </div>
                                            
                                            </div>
                                            <div class="flex flex-col">
                                            <div
                                                class="skeleton animate-wave h-48 w-full rounded-lg bg-slate-150 dark:bg-navy-500"
                                            >
                                            </div>
                                            
                                            </div>
  
                                         </div>
                         
                                        <div
                                        class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500"
                                        ></div>

                                        <div class="space-x-3">
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
                                </template>
                            </div>
                        </div>
                    </div>
                        `);
                        $(".desk"+i).on("click",function(){
                            func.viewjw(data.kode_kegiatan,i);
                        });
                        $(".komplain"+i).on("click",function(){
                           if(data.status_jadwal == 1 ){
                            $("#formkomplain"+i).empty();
                                $("#formkomplain"+i).append(`
                                    <h1 class="font-bold text-xl text-black">Status jadwal telah di setujui , anda tidak dapat mengisikan kolom deskripsi lagi!!</h1>
                                `);
                                $("#decline"+i).prop("disabled",true);
                           }else{
                            $("#formkomplain"+i).empty();
                            $("#formkomplain"+i).append(`
                            <label class="block">
                                <span>Choose category :</span>
                                <select
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                id="judul`+i+`"
                                >
                                
                                </select>
                            </label>
                            <label class="block">
                                <span>Description:</span>
                                <textarea
                                rows="4"
                                placeholder=" Enter Text"
                                class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                id="deskripsi`+i+`"
                                ></textarea>
                            </label>
                            `);
                            func.getjudul(data.kode_kegiatan,i);
                           }
                        });
                        $(document).on("click","#decline"+i,function(){
                            var des = $("#deskripsi"+i).val();
                            var id = $("#judul"+i).val();
                            func.updatedeskripsi(id,des);
                            
                        });
                        $(document).on("click","#admit"+i,function(){
                           if(data.status_jadwal == 1){
                                func.alerttoast("anda sudah melakukan update status jadwal sebelumnya ", "bg-warning text-bold text-black");
                           }else{
                            func.admitjw(data.kode_kegiatan);
                           }

                        });
                    })
                }
            })

        },
        getjudul : function(kode,no){
            $("#judul"+no).empty();
            $.ajax({
                type: "POST",
                url : urls+"/api/Jadwal/Searchjadwal/"+kode,
                dataType : "json",
                success : function(jdl){
                    let isi = jdl.data;
                    $.each(isi,function(i,data){
                        $("#judul"+no).append(`
                        <option value="`+ data.id +`">`+ data.judul_kegiatan +`</option>
                        `)
                    })
                }
            })
        },
        viewjw: function(kode,no){
            $.ajax({
                type: "POST",
                url : urls+"/api/Jadwal/Searchjadwal/"+kode,
                dataType : "json",
                success : function(jdl){
                    let isi = jdl.data;
                    const bulan  = ["Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember"];
                    const day    = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
                    $("#viewjadwaltemp"+no).empty();
                   
                    $.each(isi,function(i,data){
                        const da = new Date(data.tanggal_kegiatan);
                        const db = new Date(data.tglselesai_kegiatan);
                        const ta = data.mulai_kegiatan;
                        const tb = data.selesai_kegiatan;

                        let  getjm = ta.split(":");
                        let  getjs = tb.split(":");
                        var fdRange = "";
                        var status = "";
                        if(data.lama_kegiatan == 1){
                            var fdRange = da.getDate() + "-" + db.getDate() +" " + bulan[db.getMonth()] + " " + db.getFullYear();
                            
                        }else{
                            var fdRange = day[da.getDay()]+ ","+ " "+ + da.getDate() +"-" + bulan[da.getMonth()] + "-" + da.getFullYear();
                        }
                      
                        var forTime = getjm[0] + ":" + getjm[1]  + "-" + getjs[0] + ":" + getjs[1] + " " + "WIB";

                        if(data.deskripsi == null ){
                            var deskrp = "Belum ada perbaikan dari admin"
                        }else{
                            var deskrp = data.deskripsi
                        }
                        $("#viewjadwaltemp"+no).append(`
                        <div class="card flex-row overflow-hidden">
                            <div class="h-full w-1 bg-gradient-to-b from-blue-500 to-purple-600"></div>
                                <div class="flex flex-1 flex-col justify-between p-4 sm:px-5 space-y-10">
                                    <div class="flex flex-col items-start justify-start">
                                        <h1 class="mt-3 text-xl font-bold text-slate-700 line-clamp-2 dark:text-navy-100">`+ data.judul_kegiatan +`</h1>
                                        <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                            Kelas `+ data.namakategori +`
                                        </h3>
                                        <p class="mt-2 text-xs">`+ fdRange+`</p>
                                        <p class="mt-2 text-xs">`+ forTime+`</p>
                                        <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                            `+ data.nama_vihara +`
                                        </h3>
                                    </div>
                                    <div class="flex justify-between   ">     
                                        <div class=" flex space-x-1.5">
                                            <a href="#" class="tag sts`+ i +` bg-warning py-1 px-1.5 text-black ">
                                                `+ data.namakategori +`
                                            </a>
                                        </div>       
                                        <div x-data="{showModal:false}">
                                                <button
                                                @click="showModal = true"
                                                    class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                                        viewbox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                                    </svg>
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
                                                    class="relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
                                                    x-show="showModal"
                                                    x-transition:enter="easy-out"
                                                    x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                                    x-transition:leave="easy-in"
                                                    x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
                                                    x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]"
                                                    >

                                                    <div class="mt-4 px-4 sm:px-12">
                                                        <h3 class="text-lg text-slate-800 dark:text-navy-50">
                                                        Deskripsi Perbaikan  
                                                        </h3>
                                                        <h3 class="text-lg font-bold text-slate-800 dark:text-navy-50">
                                                            `+ data.judul_kegiatan +`
                                                        </h3>
                                                        <p class="mt-1 text-slate-500 dark:text-navy-200">
                                                            `+ deskrp +`
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500"
                                                    ></div>
                            
                                                    <div class="space-x-3">
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
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        `);
                    })
                }
            });
        },
        updatedeskripsi: function(id,deskrip){
            var formmodal = {
                deskripsi : deskrip
            }
            $.ajax({
                type : "POST",
                url  :  urls + "/api/Jadwal/updatedes/" + id,
                data : formmodal ,
                dataType : "json",
                success : function(data){
                    func.alerttoast(data.data,"bg-success text-black font-bold");
                }
            });
        },
        admitjw : function(kodekg){
            var formmdl  =  {
                status_jadwal : 1
            }
            $.ajax({
                type : "POST",
                url  :  urls + "/api/Jadwalkegiatan/Editstat/" + kodekg,
                data : formmdl,
                dataType : "json",
                success : function(data){
                    func.alerttoast(data.data, "bg-success text-black font-bold");
                }
            });
        },
        viewdataumt : function(){
            $.ajax({
                type: "GET",
                url : urls + "/api/Jadwalkegiatan/Cekdata",
                dataType:"json",
                success: function(datas){
                    var is = datas.data;

                    $.each(is,function(i,datais){
                        var tanggalAwal = datais.tanggal_diksa;
                        // Memisahkan tahun, bulan, dan tanggal
                        var [tahun, bulan, tanggal] = tanggalAwal.split('-');
                        // Membuat objek Date dari tanggalAwal
                        var date = new Date(tahun, bulan - 1, tanggal);
                        // Array hari dalam bahasa Indonesia
                        var hariArray = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        // Mendapatkan nama hari dalam bahasa Indonesia
                        var hari = hariArray[date.getDay()];
                        // Mengubah format tanggal
                        var tanggalAkhir = hari + ', ' + tanggal + '-' + bulan + '-' + tahun;
                        
                        var notel ;
                        if(datais.no_hp == ""){
                            notel = "-";
                        }else{
                            notel = datais.no_hp;
                        }
                        $("#dataumatpd").append(`
                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                                `+datais.nama_pendiksa+`
                                                </h3>
                                                <p class="text-xs text-slate-400 dark:text-navy-300">
                                                    Umat
                                                </p>
                                            </div>
                                            <div>
                                                <p>`+tanggalAkhir+`</p>
                                            </div>
                                        </div>
                                        
                                        <div class="space-y-3 text-xs+">
                                            <div class="flex justify-between">
                                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                                    No Pendaftaran
                                                </p>
                                                <p class="text-right">#`+datais.kode_diksa+`</p>
                                            </div>
            
            
                                            <div class="flex justify-between">
                                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                                    Vihara
                                                </p>
                                                <p class="text-right">Chien Shan</p>
                                            </div>
            
                                            <div class="flex justify-between">
                                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                                    Nomor Telepon
                                                </p>
                                                <p class="text-right">`+notel+`</p>
                                            </div>
                                            
                                            <div class="flex justify-between">
                                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                                    Total Umat Diksa
                                                </p>
                                                <p class="text-right">`+datais.total_detail_pendiksaan+` Orang</p>
                                            </div>
                                            
                                        </div>
                        `);
                    });
                }
            });
        },
        totaldiksaview : function(){
            $.ajax({
                type : "GET",
                url  :  urls + "/api/Jadwalkegiatan/Cektotal",
                dataType : "json",
                success : function(datas){
                 $("#totaldiksa").text(datas.data);
                }
            });
        }
    }

    $(window).on("load",function(){
        func.viewjws();
        func.viewdataumt();
        func.totaldiksaview();
        $("#lihattotal").on("click",function(){
            window.location.href = urls + "/forms/Filterlaporandiksa"
        });
        $("#filterdiksa").on("click",function(){
            window.location.href = urls + "/forms/Filterlaporandiksa"
        }); 
        $("#detailumat").on("click",function(){
            window.location.href = urls + "/forms/Usertable"
        });
    })


}