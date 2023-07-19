export function jadwaldata(){
    var urls = window.location.origin;
    let func = {
        getdatajadwal : function(){
            $.ajax({
                url : urls + "/api/Jadwalkegiatan/Viewalljadwal",
                type : "GET",
                dataType : "JSON",
                success : function(response){
                    var isi = response.data;
                    var hari = ['minggu','senin','selasa','rabu','kamis','jumat','sabtu']
                    $.each(isi,function(i, vihara){
                       
                        $("#datavihara").append(`
                            <div class="mt-4 sm:mt-5 lg:mt-6">
                                <h3 class="text-base font-medium text-slate-600 dark:text-navy-100" >
                                `+ vihara.nama_vihara +`
                                </h3>
                                <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6" id="`+vihara.kode_vihara+`">
                                </div>
                            </div>
                        `);
                       
                       $.each(vihara.post_jadwal,function(i,jadwal){
                            var tglmulai = new Date(jadwal.tanggal_kegiatan);
                        
                            var waktuMulai = jadwal.mulai_kegiatan.substring(0, 5);
                            var waktuAkhir = jadwal.selesai_kegiatan.substring(0, 5);
                            
                        $("#"+vihara.kode_vihara).append(`
                            <div class="card justify-between p-4 sm:p-5">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-base text-black font-medium">`+ jadwal.judul_kegiatan +`</h3>
                                    <p class="text-xs text-black ">
                                        `+ jadwal.tanggal_kegiatan +`
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs+ text-black">`+ hari[tglmulai.getDay()] +`</p>
                                <p class="text-xl font-medium text-black">`+waktuMulai+` - `+waktuAkhir+`</p>
                                <div class="mt-5 flex items-center justify-between space-x-2">
                                        <div class=" mt-2">
                                        </div>
                                        <a href="`+ urls +`/layouts/Scanabsensi/`+ jadwal.kode_posting +`"
                                            class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                            
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                                viewbox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            `);
                       });
                    });
                }
            });
        }
    }
    $(() => {
        func.getdatajadwal();

    })
}