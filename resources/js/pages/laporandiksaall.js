export function laporandiksa(){
    var url = window.location.origin;
    var iddiksa = $("#iddiksa").val();
    var hasilid = iddiksa.split('/').join('');

    var func = {
        tabledata: function(){
            $.ajax({
                type: "POST",
                url : url + "/api/Bookdiksa/exportfilterdiksa",
                dataType: "json",
                success: function(isi){
                    let isidata = isi.data.results.item;

                    $.each(isidata, function(i,dataitems){
                        $("#datalapdiksa").append(`
                        <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5" >
                        `+dataitems.kode_diksa+`
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div>
                                <p class="font-medium text-slate-600 dark:text-navy-100" >
                                `+dataitems.nama_indonesia+`   
                                </p>
                                <p class="text-xs+">
                                `+dataitems.email+`   
                                </p>
                            </div>
                        </td>
                        <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                        `+dataitems.total_orang_diksa+`
                        </td>
                        <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                        `+dataitems.tanggal_diksa+`
                        </td>
                    </tr>
                        `);
                    });

                    $("#totaldiksa").append(`
                    <p class="text-lg font-bold text-slate-600 dark:text-navy-100">
                              `+isi.data.results.total_semua_diksa+` Umat
                            </p>
                    `);
                }
            });
        },
        exportdata : function(){
            if(hasilid === "0"){
                console.log("kosong");
                func.tabledata();
                $("#tglperiod").text("Semua Tanggal");
            }else{
                var currentdate = new Date();
                var formatcurr = currentdate.toLocaleDateString('en-GB');
                
                var isifromdiksaValue = hasilid.substring(0, 4) + '-' + hasilid.substring(4, 6) + '-' + hasilid.substring(6, 8);
                var isitodiksaValue = hasilid.substring(8, 12) + '-' + hasilid.substring(12, 14) + '-' + hasilid.substring(14, 16);
                var isi = {
                    from_date : isifromdiksaValue,
                    to_date : isitodiksaValue
                }
                $("#createdate").text(formatcurr);
                $.ajax({
                    type: "POST",
                    url : url + "/api/Bookdiksa/exportfilterdiksadate",
                    data : isi,
                    dataType: "json",
                    success: function(isi){
                        let isidata = isi.data.results.item;
                        if(isidata.length === 0){
                            $("#jadwalks").text('TIDAK ADA JADWAL DIKSA PADA BULAN INI');
                        }else{
                            let fromDate = new Date(isifromdiksaValue);
                            let toDate = new Date(isitodiksaValue);
                            let formattedFrom = fromDate.toLocaleDateString('en-GB');
                            
                            let formattedTo = toDate.toLocaleDateString('en-GB');
                            let output = formattedFrom + " - " + formattedTo;
                            $("#tglperiod").text(output);
                            $.each(isidata, function(i,dataitems){
                                $("#datalapdiksa").append(`
                                <tr>
                                <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5" >
                                `+dataitems.kode_diksa+`
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div>
                                        <p class="font-medium text-slate-600 dark:text-navy-100" >
                                        `+dataitems.nama_indonesia+`   
                                        </p>
                                        <p class="text-xs+">
                                        `+dataitems.email+`   
                                        </p>
                                    </div>
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                                `+dataitems.total_orang_diksa+`
                                </td>
                                <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5" >
                                `+dataitems.tanggal_diksa+`
                                </td>
                            </tr>
                                `);
                            });
        
                            $("#totaldiksa").append(`
                            <p class="text-lg font-bold text-slate-600 dark:text-navy-100">
                                    `+isi.data.results.total_semua_diksa+` Umat
                                    </p>
                            `);
                        }
                        console.log(isidata);
                      
                    }
                });
            }
        }
    }
    $(window).on("load",function(){
        func.exportdata();
    });
}