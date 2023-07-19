export function repdiksa(){
    var url = window.location.origin;
    var iddiksa = $("#iddiksa").val();
    var hasilid = iddiksa.split('/').join('');

    var func = {
        getinfodiksa: function(){
           
            var formisi = {
                kode_diksa : hasilid
              }
    
            $.ajax({
                type:"POST",
                url :  url+"/api/Bookdiksa/view",
                data: formisi,
                dataType: "json",
                success : function(isi){
                    let isiinfo = isi.data
                    $.each(isiinfo,function(i,cekdata){
                        var date = cekdata.created_at;
                        var formattedDate = moment(date).format("MMMM DD, YYYY");
                        var datediksa = cekdata.tanggal_diksa;
                        var formatteddiksadate = dayjs(datediksa).format("ddd,DD-MMMM-YYYY");
                        $("#nomordiksa").text(cekdata.kode_diksa);
                        $("#waktucetak").text(formattedDate);
                        $("#tanggaldiksa").text(formatteddiksadate);
                        $("#namavihara").text(cekdata.nama_vihara);
                        
                    });

                }
            });
        },
        tabledatadiksa : function(){
            var formisi = {
                kode_diksa : hasilid
            }
            $.ajax({
                type:"POST",
                url :  url+"/api/Bookdiksa/viewdaftar",
                data: formisi,
                dataType: "json",
                success : function(isi){
                    let isiinfo = isi.data
                    $.each(isiinfo,function(i,cekdata){
                       $("#tablebodydiksa").append(`
                       <tr>
                       <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5" >
                            `+ cekdata.kode_diksa +`
                       </td>
                       <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                           <div>
                               <p class="font-medium text-slate-600 dark:text-navy-100" >
                                `+ cekdata.nama_pendiksa +`
                               </p>
                               <p class="text-xs+" >
                               `+ cekdata.kategori_pendiksa +`
                               </p>
                           </div>
                       </td>
                       <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                       `+ cekdata.Jenis_kel +`
                       </td>
                       <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                       `+ cekdata.tgl_lahir +`
                       </td>
                       <td
                           class="w-3/12 whitespace-nowrap rounded-r-lg px-4 py-3 text-right font-semibold sm:px-5" >
                           `+ cekdata.no_hp +`
                       </td>
                   </tr>
                       `)
                        
                      
                    });


                }
            });
        }
    }
    $(window).on("load",function(){
       func.getinfodiksa();
       func.tabledatadiksa();
    });
}