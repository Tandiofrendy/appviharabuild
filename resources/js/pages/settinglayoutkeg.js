export function settingkegiatan(){
    var urls = window.location.origin;
    let func = {
        
        ambildata: function(start,to){
            var tglke = $("#tglkeg").val();
            var hasiltgl = tglke.split('/').join('');
            var isi = {
                from_date : start,
                to_date : to
            };
            if(hasiltgl === "0"){
                $.ajax({
                    type:"POST",
                    url : urls + "/api/Jadwalkegiatan/Ambiljadwal",
                    dataType: "json",
                    success: function(isis){
                        var datai = isis.data;
                        $.each(datai,function(i,eisi){
                            $("#datakegiatan").append(`
                            <tr>
                                <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5" >
                                `+eisi.kode_posting+`
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div>
                                        <p class="font-medium text-slate-600 dark:text-navy-100" >
                                        `+eisi.judul_kegiatan+`
                                        </p>
                                        <p class="text-xs+">
                                        `+eisi.namakategori+`
                                        </p>
                                    </div>
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                `+eisi.tanggal_kegiatan+`
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                `+eisi.nama_vihara+`
                                </td>
                                <td
                                    class="w-3/12 whitespace-nowrap rounded-r-lg px-4 py-3 text-right font-semibold sm:px-5">
                                -
                                </td>
                            </tr>
                            `);
                        });
                    }
                });
            }else{
                $.ajax({
                    type:"POST",
                    url : urls + "/api/Jadwalkegiatan/jadwalbetween",
                    data: isi,
                    dataType: "json",
                    success: function(isis){
                        var datai = isis.data;
                        var dateObj1 = new Date(isi.from_date);
                        var indeksBulan1 = dateObj1.getMonth();
                        var dateObj2 = new Date(isi.to_date);
                        var indeksBulan2 = dateObj2.getMonth();
                        var namaBulan = [
                            "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI",
                            "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"
                          ];
                        var namaBulanLengkap1 = namaBulan[indeksBulan1];
                        var namaBulanLengkap2 = namaBulan[indeksBulan2];
                        
                        if (namaBulanLengkap1 === namaBulanLengkap2) {
                            $("#bulan").text(namaBulanLengkap1);
                          } else {
                            $("#bulan").text(namaBulanLengkap1 + "-" + namaBulanLengkap2);
                          }
                        $.each(datai,function(i,eisi){
                            $("#datakegiatan").append(`
                            <tr>
                                <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5" >
                                `+eisi.kode_posting+`
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div>
                                        <p class="font-medium text-slate-600 dark:text-navy-100" >
                                        `+eisi.judul_kegiatan+`
                                        </p>
                                        <p class="text-xs+">
                                        `+eisi.namakategori+`
                                        </p>
                                    </div>
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                `+eisi.tanggal_kegiatan+`
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                `+eisi.nama_vihara+`
                                </td>
                                <td
                                    class="w-3/12 whitespace-nowrap rounded-r-lg px-4 py-3 text-right font-semibold sm:px-5">
                                -
                                </td>
                            </tr>
                            `);
                        });
                    }
                });
            }
           
        }
    }
    $(window).on("load",function(){
        var tglke = $("#tglkeg").val();
        var hasiltgl = tglke.split('/').join('');
        var tanggal1 = hasiltgl.substring(0, 8);
        var tanggal2 = hasiltgl.substring(8, 16);
        tanggal1 = tanggal1.substring(0, 4) + "-" + tanggal1.substring(4, 6) + "-" + tanggal1.substring(6, 8);
        tanggal2 = tanggal2.substring(0, 4) + "-" + tanggal2.substring(4, 6) + "-" + tanggal2.substring(6, 8);


        func.ambildata(tanggal1,tanggal2);
    });
}