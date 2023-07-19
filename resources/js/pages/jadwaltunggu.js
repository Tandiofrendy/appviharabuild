
import Toastify from "toastify-js";
export function jadwaladmit(){
    var urls = window.location.origin;
    let func = {
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        viewjw: function(){
            $.ajax({
                type: "GET",
                url : urls+"/api/Jadwal/Viewjadwal",
                dataType : "json",
                success : function(jdl){
                    let isi = jdl.data;
                    const bulan  = ["Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember"];
                    const day    = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
                    $("#viewjadwaltemp").empty();
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
                        if(data.status_jadwal == 0){
                            status = "Menunggu Persetujuan"

                        }else{
                            status = "Siap Diposting";
                        }

                        if(data.deskripsi == null ){
                            var deskrp = "Belum ada perbaikan dari admin"
                        }else{
                            var deskrp = data.deskripsi
                        }
                        $("#viewjadwaltemp").append(`
                        <div class="card flex-row overflow-hidden">
                            <div class="h-full w-1 bg-gradient-to-b from-blue-500 to-purple-600"></div>
                                <div class="flex flex-1 flex-col justify-between p-4 sm:px-5 space-y-10">
                                    <div>
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
                                            <div class="mt-5" x-data="{showModal2:false}">
                                            <button
                                              @click="showModal2 = true"
                                              class="btn  font-medium text-slate-800 sts`+ i +` bg-warning py-1 px-1.5 "
                                            >
                                            `+ status +`
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
                                                  <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="inline h-28 w-28 text-success"
                                                    fill="none"
                                                    viewbox="0 0 24 24"
                                                    stroke="currentColor"
                                                  >
                                                    <path
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                  </svg>
                            
                                                  <div class="mt-4">
                                                    <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                                      Posting Jadwal
                                                    </h2>
                                                    <p class="mt-2">
                                                      Data Jadwal akan diposting dan dapat dilihat oleh seluruh pengguna apakah anda yakin ?
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
                                                        id="posting`+i+`"
                                                        >
                                                    Ya
                                                    </button>
                                                  </div>
                                                </div>
                                              </div>
                                            </template>
                                          </div>
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
                        if(data.status_jadwal == 0){
                            $(".sts"+i).removeClass("bg-success text-white font-bold");
                            $(".sts"+i).addClass("bg-warning text-black font-bold");

                        }else{
                            $(".sts"+i).removeClass("bg-warning text-black font-bold");
                            $(".sts"+i).addClass("bg-success text-white font-bold");
                        }
                
                        $(document).one("click","#posting"+i,function(event){
                            event.preventDefault();
                            if(data.status_jadwal == 1){
                                var kodepost = data.kode_kegiatan +"-"+ data.id;
                                func.ambildata(data.id,kodepost,event);
                                $(this).prop('disabled',true);
                            }else{
                                func.alerttoast("JADWAL BELUM DI SETUJUI , SILAHKAN TUNGGU SAMPAI WARNA TOMBOL BERUBAH MENJADI HIJAU!!","bg-warning font-bold text-white");
                            }
                        });

                    })
                }
            })
        },
        ambildata: function(idkode,kodeposs,event){
            event.preventDefault()
            $.ajax({
                url : urls + "/api/Jadwal/Getdatapos/" +idkode ,
                type : "POST",
                dataType: "json",
                success : function(data){
                    var isitemp = data.data;
                    var formup = "";
                    
                    $.each(isitemp,function(i,upt){
                        var result           = '';
                        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        var charactersLength = characters.length;
                        for ( var i = 0; i < 30; i++ ) {
                          result += characters.charAt(Math.floor(Math.random() * 
                         charactersLength));
                       }
                        formup ={
                            kode_posting : kodeposs,
                            kodekategori : upt.kodekategori,
                            email : upt.email ,
                            kode_vihara : upt.kode_vihara,
                            judul_kegiatan : upt.judul_kegiatan,
                            tanggal_kegiatan : upt.tanggal_kegiatan,
                            tglselesai_kegiatan : upt.tglselesai_kegiatan,
                            mulai_kegiatan : upt.mulai_kegiatan,
                            selesai_kegiatan : upt.selesai_kegiatan,
                            lama_kegiatan : upt.lama_kegiatan,
                            nama_penceramah : upt.nama_penceramah,
                            kodeqr : result,
                            keterangan : upt.keterangan
                            };
                    
                    });
                    console.log(formup);
                   func.updateposting(kodeposs,formup,event);
                }
            })
        },
        updateposting: function(kodepos,dataform,event){
            event.preventDefault();
            $.ajax({
                url : urls + "/api/Jadwal/Upposting/" ,
                type: "POST",
                data: dataform,
                dataType: "json",
                success : function(data){
                    func.alerttoast(data.data,"bg-success font-bold text-black")
                    func.viewposting();
                    func.viewjw();
                }
            })
            // console.log("ini  update" + " " + kodepos )
        },
        viewposting: function(){
            $.ajax({
                url : urls + "/api/Jadwalkegiatan/Viewpost" ,
                type : "GET",
                dataType : "json",
                success : function(data){
                    $("#dataposting").empty();
                   let isi = data.data;
                   const bulan  = ["Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember"];
                   const day    = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];


                   $.each(isi,function(i,viewp){
                    const da = new Date(viewp.tanggal_kegiatan);
                    const db = new Date(viewp.tglselesai_kegiatan);
                    const tm = viewp.mulai_kegiatan;
                    let  getjm = tm.split(":")
                    if(da.getDate() == db.getDate()){
                        var tglw = day[da.getDay()] + ',' + da.getDate() + " " + bulan[da.getMonth()] + "-" + getjm[0] +":"+ getjm[1] ;
                    }else{
                        var tglw = day[da.getDay()] + ',' + da.getDate() + "-" + db.getDate() + " " + bulan[da.getMonth()] + "-" + getjm[0] +":"+ getjm[1] ;
                    }
                    $("#dataposting").append(`
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                            <span class="font-medium text-slate-700 dark:text-navy-100">`+viewp.judul_kegiatan+`
                            </span>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">`+viewp.nama_vihara+`
                        </a>
                    </td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                        `+ tglw +`
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        Active
                    </td>

                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button
                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                `);
                   });
                }
            })
        }

        
    }

    $(window).on("load",function(){
        func.viewjw();
        func.viewposting();
    });
}