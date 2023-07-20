import flatpickr from "flatpickr";
import Toastify from "toastify-js";

export function filterdiksaconfig(){
    var isitodiksa = "";
    var isifromdiksa = "";
    var url = window.location.origin;
    let currentPage = 1;
    let func = {
        alerttoast: function(text,warna){
            Toastify({
              text: text,
              gravity: "top",
              className: warna,
            }).showToast();
        },
        generatepagination: function(curpage,lastpage){
            var html = '<div class="text-xs+">' + curpage +'-'+lastpage +' of 10 entries </div>';
            html += ' <ol class="pagination space-x-1.5">'
            if (curpage > 1){
                html += `<li>
                <a
                  href="#"
                  class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  data-page="`+ (curpage - 1)+`"
                  id="prev-page"
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
              </li>`;
            }

            var active = 'bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ;
            var nonactive = 'bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90';
            for(var i = 1 ; i<= lastpage; i++){
                html += `<li>
                <a
                  href="#"
                  data-page="`+ i +`"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full `+ (i === curpage ? active : nonactive)+`"
                  >`+ i+`</a
                >
              </li>`;
            }

            if(curpage < lastpage){
                html += `<li>
                <a
                  href="#"
                  class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  data-page="`+ (curpage + 1)+`"
                  id="next-page"
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
              </li>`;
            }
            
            return html;
        },
        cetakfilterdiksa: function(kode){
            // $.ajax({
            //     type: "POST",
            //     url : url + "/api/Bookdiksa/exportfilterdiksa",
            //     dataType: "json",
            //     success: function(response){
            //         window.open(response.file_url);
            //         func.alerttoast("Data berhasil di export","bg-success");
            //     }
            // });

            
        },
        loadfilterv2: function(page){
            currentPage = page;
            $.ajax({
                type: "POST",
                url : url + "/api/Bookdiksa/filterdiksa?page=" + page,
                dataType: "json",
                success: function(isi){
                    let data = isi.data.results.items;
                    let currentpage = isi.data.current_page;
                    let lastpage = isi.data.last_page;
                    
                    $("tbody").empty();
                    var pagination = func.generatepagination(currentpage,lastpage);
                    $.each(data, function(i,dtfilterv2){
                        var color = "";
                        if(dtfilterv2.status === "Menunggu pendiksaan"){
                            color = "text-primary"
                        }else if(dtfilterv2.status ==="Pendiksaan selesai"){
                            color = "text-green-600"
                        }
                        
                        func.datafiltertbody(i,dtfilterv2,color);
                        func.datacollaps(i,dtfilterv2.kode_diksa);
                        func.datacollapchild(dtfilterv2.kode_diksa);

                        $("#pagination").html(pagination);
                        $("#next-page").on("click",function(){
                            func.loadfilterv2(currentpage +1 );
                        });
                        $("#prev-page").on("click",function(){
                            func.loadfilterv2(currentpage -1 );
                        });
                        
                    });
                    // end each
                }
            });
        },
        searchfilterdiksav2: function(tglfrom , tglto ,page){
            currentPage = page;
            var isi = {
                from_date : tglfrom,
                to_date : tglto
            }
            $.ajax({
                type:"POST",
                url : url+"/api/Bookdiksa/filterdatediksa?page=" + page,
                data : isi,
                dataType:"json",
                success: function(isidiksa){
                    let data = isidiksa.data.data;
                    let currentpage = isidiksa.data.current_page;
                    let lastpage = isidiksa.data.last_page;
                   
                    $("tbody").empty();
                    var pagination = func.generatepagination(currentpage,lastpage);
                    $.each(data,function(i,dtfilter){
                        var color = "";
                        if(dtfilter.status === "Menunggu pendiksaan"){
                            color = "text-primary"
                        }else if(dtfilter.status ==="Pendiksaan selesai"){
                            color = "text-green-600"
                        }
                        func.datafiltertbody(i,dtfilter,color);
                        func.datacollaps(i,dtfilter.kode_diksa);
                        func.datacollapchild(dtfilter.kode_diksa);
                        
        

                        //klik href 
                        $("#"+dtfilter.kode_diksa).on("click",function(){
                            var windowname="Laporan daftar diksa"
                            var windowpengaturan = "width=1080,height=789"
                            var senddturl = url+"/layouts/Buktidiksa/:data".replace(':data',encodeURIComponent(dtfilter.kode_diksa));
                            window.open(senddturl,windowname,windowpengaturan);
                        });
                    });
                    $("#pagination").empty();
                    $("#pagination").html(pagination);
                    $("#next-page").on("click",function(){
                        func.loadfilterv2(currentpage +1 );
                    });
                    $("#prev-page").on("click",function(){
                        func.loadfilterv2(currentpage -1 );
                    });
                    
                }
            });
        },
        resetinput: function(){
            $("#fromdiksa").val('');
            $("#todiksa").val('');
        },
        datafiltertbody: function(i,dtfilterv2,color){
            $("#datatablediksav3").append(`
            <tbody id="dtbody`+ i +`" x-data="{expanded:false}">
                <tr class="border-y border-transparent">
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+dtfilterv2.kode_diksa+`</td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    `+dtfilterv2.nama_indonesia+`
                    </td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                    >
                    `+dtfilterv2.total_orang_diksa+ ` Umat
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    `+dtfilterv2.no_hp+`
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                        class="badge space-x-2.5 px-0  `+color+` dark:text-accent-light"
                    >
                        <div class="h-2 w-2 rounded-full bg-current"></div>
                        <span>`+dtfilterv2.status+`</span>
                    </div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    `+dtfilterv2.tanggal_diksa+`
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button
                        @click="expanded = !expanded"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                        <i
                            :class="expanded && '-rotate-180'"
                            class="fas fa-chevron-down text-sm transition-transform"
                        ></i>
                        </button>
                    </td>
                    </tr>
                    <tr id="isicollaps`+ i +`" class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500" >
                    
                    </tr>    
                </tbody>         
            `);
        },
        datacollaps: function(i,kode_diksa){
            
            $("#isicollaps"+i).append(`
                        <td colspan="100" class="p-0">
                                    <div x-show="expanded" x-collapse>
                                    <div class="px-4 pb-4 sm:px-5">
                                        <p class="font-medium text-slate-700">
                                        Data Deskripsi Calon pendaftar
                                        </p>
                                        <div
                                        class="is-scrollbar-hidden min-w-full overflow-x-auto"
                                        >
                                        <table class="is-hoverable w-full text-left">
                                            <thead>
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                                            >
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                #
                                                </th>
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                Calon Diksa
                                                </th>
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                Kategori Pendiksa
                                                </th>
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                Jenis Kelamin
                                                </th>
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                Tanggal lahir
                                                </th>
                                                <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                                                >
                                                No.Hp
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="isicalonpdf`+kode_diksa+`"> </tbody>
                                        </table>
                                        </div>
                                        <div class="text-right">
                                        <button
                                            @click="expanded = false"
                                            class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                                            id="cdaftar`+i+`"
                                            >
                                            Cetak Pendaftaran
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                        `);
                        $("#cdaftar"+i).on("click",function(){
                            var windowname="Bukti Booking diksa"
                            var windowpengaturan = "width=1080,height=789"
                            var senddturl = url+"/layouts/Buktidiksa/:data".replace(':data',encodeURIComponent(kode_diksa));
                            window.open(senddturl,windowname,windowpengaturan);
                        });
                       
        },
        datacollapchild : function(dtkodediksa){
            var formisdf = {
                kode_diksa : dtkodediksa
            }
            $.ajax({
                type: "POST",
                url :  url+"/api/Bookdiksa/viewdaftar",
                data: formisdf,
                dataType: "json",
                success: function(isicl){
                    let datacl = isicl.data;
                    $.each(datacl,function(i,cldata){
                        var no = i + 1;
                        $("#isicalonpdf"+dtkodediksa).append(`
                        <tr
                                        class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                                    >   
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+no+`
                                        </td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+cldata.nama_pendiksa+`
                                        </td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+cldata.kategori_pendiksa+`
                                        </td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+cldata.Jenis_kel+`
                                        </td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+ cldata.tgl_lahir +`
                                        </td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >
                                        `+ cldata.no_hp +`
                                        </td>
                                    </tr>
                        `);
                    });
                }
            })
        },
        
    }
  


   

    $(window).on("load",function(){
        flatpickr("#fromdiksa",{
            locale : 'id',
            onChange: function(selectedDates){
                 isifromdiksa = this.formatDate(selectedDates[0],"Y-m-d");
            }
        });
        flatpickr("#todiksa",{
            locale : 'id',
            onChange: function(selectedDates){
                 isitodiksa = this.formatDate(selectedDates[0],"Y-m-d");
                  if(isifromdiksa > isitodiksa){
                    func.alerttoast("tanggal akhir tidak boleh kurang dari tanggal awal,Silahkan cek kembali!!","bg-warning");
                  }else{
                    func.searchfilterdiksav2(isifromdiksa,isitodiksa,1);
                  }
            }
        });
        func.loadfilterv2(1);
        $("#cancel").on("click",function(){
            func.loadfilterv2(1);
        });
        $("#cetak").on("click",function(){
           

            var ttglValue = isifromdiksa.replace(/-/g, '') + isitodiksa.replace(/-/g, '');
            var windowname="Laporan Pendiksaan"
            var windowpengaturan = "width=1080,height=789"
            if(ttglValue === ""){
                var senddturl = url+"/layouts/Lapdiksa/:data".replace(':data',encodeURIComponent(0));
            }else{
                var senddturl = url+"/layouts/Lapdiksa/:data".replace(':data',encodeURIComponent(ttglValue));
            }
          
            window.open(senddturl,windowname,windowpengaturan);
            func.resetinput();
            
        });
    });

   
}