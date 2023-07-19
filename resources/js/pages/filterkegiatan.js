import Toastify from "toastify-js";
export function filterkg(){
    $(function(){   
        var isitokeg = "";
        var isifromkeg = "";
        var urls = window.location.origin;
        let func = {
            alerttoast: function(text,warna){
                Toastify({
                  text: text,
                  gravity: "top",
                  className: warna,
                }).showToast();
            },
            ambildataview: function(){
                $.ajax({
                    type: "POST",
                    url : urls + "/api/Jadwalkegiatan/Ambiljadwal",
                    dataType : "json",
                    success: function(datas){
                        var isi = datas.data;
                        
                        let today = new Date();
                        let year = today.getFullYear();
                        let month = (today.getMonth() + 1).toString().padStart(2, '0');
                        let day = today.getDate().toString().padStart(2, '0');
                        let finalDate = `${year}-${month}-${day}`;
                        
                        $("#tablekegiatan").empty();
                        $.each(isi, function(i, eisi){
                            
                            var tglSelesaiKegiatan = eisi.tglselesai_kegiatan;
                    
                            var tglsls = new Date(tglSelesaiKegiatan).toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
                            
                            $("#tablekegiatan").append(`
                            <tr
                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                        >
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+eisi.kode_posting+`</td>
                            <td
                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                            >
                            `+eisi.judul_kegiatan+`
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            `+eisi.namakategori+`
                            </td>
        
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div id="progress`+i+`" x-tooltip.primary="'`+eisi.total_data_absen+` ORANG'" class="progress h-2 bg-slate-150 dark:bg-navy-500">
                           
                            </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div
                                id="status-badge`+i+`"
                                class="badge space-x-2.5 px-0 text-primary dark:text-accent-light"
                            >
                            </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                `+tglsls+`
                            </td>
                        </tr>
                    `);
                        if (tglSelesaiKegiatan <= finalDate) {
                            $('#progress'+i).append(`
                            <div x-bind:style="'width: ' + (100 * 10) + '%'" class="rounded-full bg-success dark:bg-success"></div>
                            `);
                            $('#status-badge'+i).append('<div class="h-2 w-2 rounded-full bg-green-500"></div><span class="text-green-500">Selesai</span>');
                            } else {
                            $('#progress'+i).append(`
                                <div x-bind:style="'width: ' + (`+eisi.total_data_absen+` * 10) + '%'" class="rounded-full bg-primary dark:bg-accent"></div>
                            `);
                            $('#status-badge'+i).append('<div class="h-2 w-2 rounded-full bg-current"></div><span>In Progress</span>');
                        }
                        })
                    }
                });
            },
            filterdate: function(start,to){
                var isi = {
                    from_date : start,
                    to_date : to
                };
               $.ajax({
                    type:"POST",
                    url : urls + "/api/Jadwalkegiatan/jadwalbetween",
                    data: isi,
                    dataType: "json",
                    success : function(isis){
                        var datai = isis.data;
                        let today = new Date();
                        let year = today.getFullYear();
                        let month = (today.getMonth() + 1).toString().padStart(2, '0');
                        let day = today.getDate().toString().padStart(2, '0');
                        let finalDate = `${year}-${month}-${day}`;
                        $("#tablekegiatan").empty();
                        $.each(datai, function(i, eisi){
                            
                            var tglSelesaiKegiatan = eisi.tglselesai_kegiatan;
                    
                            var tglsls = new Date(tglSelesaiKegiatan).toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
                            
                            $("#tablekegiatan").append(`
                            <tr
                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                        >
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+eisi.kode_posting+`</td>
                            <td
                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                            >
                            `+eisi.judul_kegiatan+`
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            `+eisi.namakategori+`
                            </td>
        
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div id="progress`+i+`" x-tooltip.primary="'`+eisi.total_data_absen+` ORANG'" class="progress h-2 bg-slate-150 dark:bg-navy-500">
                           
                            </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div
                                id="status-badge`+i+`"
                                class="badge space-x-2.5 px-0 text-primary dark:text-accent-light"
                            >
                            </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                `+tglsls+`
                            </td>
                        </tr>
                    `);
                        if (tglSelesaiKegiatan <= finalDate) {
                            $('#progress'+i).append(`
                            <div x-bind:style="'width: ' + (100 * 10) + '%'" class="rounded-full bg-success dark:bg-success"></div>
                            `);
                            $('#status-badge'+i).append('<div class="h-2 w-2 rounded-full bg-green-500"></div><span class="text-green-500">Selesai</span>');
                            } else {
                            $('#progress'+i).append(`
                                <div x-bind:style="'width: ' + (`+eisi.total_data_absen+` * 10) + '%'" class="rounded-full bg-primary dark:bg-accent"></div>
                            `);
                            $('#status-badge'+i).append('<div class="h-2 w-2 rounded-full bg-current"></div><span>In Progress</span>');
                        }
                        })
                    }
               })

            },
            resetfilter: function(){
                func.ambildataview();
                $("#fromdate").val('');
                $("#todate").val('');
            },
            kirimdata : function(){
                var tanggal1 = $("#fromdate").val();
                var tanggal2 = $("#todate").val();    
                tanggal1 = tanggal1.replace(/-/g, "");
                tanggal2 = tanggal2.replace(/-/g, "");
                var hasil = tanggal1 + tanggal2;

               
                var windowname="Laporan Kegiatan"
                var windowpengaturan = "width=1080,height=789"
                if(hasil === ""){
                    var senddturl = urls+"/layouts/Laporankegiatan/:data".replace(':data',encodeURIComponent(0));
                }else{
                    var senddturl = urls+"/layouts/Laporankegiatan/:data".replace(':data',encodeURIComponent(hasil));
                }
              
                window.open(senddturl,windowname,windowpengaturan);
            }
        }
        $(window).on("load",function(){
           func.ambildataview();
           $("#cancelkeg").on("click",function(){
            func.resetfilter();
           });
           $("#cetakkeg").on("click",function(){
            func.kirimdata();
           });
        });

        flatpickr("#fromdate",{
            locale : 'id',
            onChange: function(selectedDates){
                 isifromkeg = this.formatDate(selectedDates[0],"Y-m-d");
            }
        });
        flatpickr("#todate",{
            locale : 'id',
            onChange: function(selectedDates){
                 isitokeg = this.formatDate(selectedDates[0],"Y-m-d");
                  if(isifromkeg > isitokeg){
                    func.alerttoast("tanggal akhir tidak boleh kurang dari tanggal awal,Silahkan cek kembali!!","bg-warning");
                  }else{
                    func.filterdate(isifromkeg,isitokeg);
                  }
            }
        });
    });
}