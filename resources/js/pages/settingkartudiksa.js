import Toastify from "toastify-js";
export function settingkartu(){
    var urlo = window.location.origin;
    var func = {
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        carikode: function(kode){
            var isikode ={
                kode_diksa : kode
            }
           $.ajax({
                type:"POST",
                url : urlo + "/api/Bookdiksa/getdatakode",
                data : isikode,
                dataType: "json",
                success: function(dat){
                  if(dat.message == "error"){
                    func.alerttoast(dat.data,"bg-warning");
                  }else{
                    let isi = dat.data.data_detail;
                    $("#modalContainer").removeClass("hidden").addClass("flex");
                    $("#modalContainer").fadeIn();
                    $("#tablemodalcontent").empty();
                    
                    let datakirim = dat.data;
                   
                    var tanggaldiksa = dat.data.tanggal_diksa;
                   $.each(isi,function(i,isidat){
                    var jeniskel = isidat.Jenis_kel;
                    var ids = isidat.id;
                    var cekst = {
                        id : ids
                      }
                    var jeniskelbaru ;
                    if(jeniskel == "L" || jeniskel == "laki-laki"){
                      jeniskelbaru = "LAKI-LAKI";
                    }else if(jeniskel == "P" || jeniskel =="perempuan"){
                      jeniskelbaru = "PEREMPUAN";
                    }
                        $("#tablemodalcontent").append(`
                        <tr
                        class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                      >
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+isidat.nama_pendiksa+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        `+jeniskelbaru+`
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+isidat.tgl_lahir+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+tanggaldiksa+`</td>
                        <td id="statkartu`+i+`" class="whitespace-nowrap px-4 py-3 sm:px-5"></td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button
                          class="btn border border-primary/30 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:border-accent-light/30 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                          id="btn-pilih`+i+`"
                          >
                           Pilih
                        </button>
                        </td>
                      </tr>
                      `);

                      $.ajax({
                        type:"POST",
                        url : urlo + "/api/Reservasi/Checkkartu",
                        data : cekst,
                        dataType: "json",
                        success: function(hcek){
                          if(hcek.message == "Success"){
                            $("#btn-pilih"+i).text('Edit');
                            $("#statkartu"+i).append(`
                            <div
                                class="badge space-x-2.5 rounded-full bg-success/10 text-success dark:bg-accent-light/15 dark:text-accent-light "
                              >
                                <div class="h-2 w-2 rounded-full bg-current"></div>
                                <span id="karstat`+i+`">Ada</span>
                              </div>
                            `);
                          }else{
                            $("#statkartu"+i).append(`
                            <div
                                class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warning/15 "
                              >
                                <div class="h-2 w-2 rounded-full bg-current"></div>
                                <span id="karstat`+i+`">Tidak Ada</span>
                              </div>
                            `);
                          }
                        }
                      });
                    $("#btn-pilih"+i).on("click",function(){
                        if($("#karstat"+i).text() == "Tidak Ada"){
                          var tgldiksass = new Date(tanggaldiksa);
                          var tglcurrent = new Date();
                          if(tglcurrent <= tgldiksass ){
                              func.alerttoast("terdekteksi umat belum melakukan diksa","bg-warning");
                          }else{
                              func.handlebtnpilih(ids,datakirim,isidat.nama_pendiksa);
                          }
                        }else{
                          func.editpilih(ids,datakirim);
                          $("#modalContainer").fadeOut();
                        }
                      $("#modalContainer").fadeOut();
                    });
                   });
                  }
                }
           });
        },
        editpilih: function(ids,data){
          var obj = $.grep(data.data_detail, function(e) {
            return e.id === ids;
          });
          var dataDetail = obj[0];
          func.handlebtnpilih(ids,data,dataDetail.nama_pendiksa);

          $.ajax({
            type : "PUT",
            url : urlo + "/api/Kartudiksa/cari/" + ids,
            dataType: "json",
            success: function(edidata){
              var ambildata = edidata.data;
              $.each(ambildata,function(i,qdata){
                $('#namapandita').val(qdata.pandita);
                $('#namapengajak').val(qdata.pengajak);
                $('#namapenanggung').val(qdata.penanggung);
              });
              $('#savekartu').text("Update");
              $('#namaumt').removeAttr('readonly');
              $('#namaumt').removeClass('bg-gray-200');
              $('#namaumt').addClass('bg-transparent');
            }
          })
        },
        updatepilih: function(dataup,id,namaumats){
         
          var databaru = {
            id : dataup.id,
            pandita : dataup.pandita,
            pengajak : dataup.pengajak,
            penanggung : dataup.penanggung,
            namaumat : namaumats
          };
          $.ajax({
            type : "POST",
            url : urlo + "/api/Kartudiksa/Updatekartu/" + id ,
            data: databaru,
            dataType : "json",
            success : function(hsupdate){
              func.alerttoast(hsupdate.data,"bg-success");
              $('#savekartu').text("Save");
              func.resetinput();
            }
          });

         
        },
        handlebtnpilih: function(idbtnpilih,datak,namapdk){
          $("#namaumt").val(namapdk);
          $('#viewnamaumt').html(namapdk);
          var tgldks = new Date(datak.tanggal_diksa);
          var tanggalFormatted = tgldks.getDate() + '-' + 
                       tgldks.toLocaleString('default', { month: 'short' }).toUpperCase() + '-' + 
                       tgldks.getFullYear();
          $('#viewtgldiksa').html("Tanggal Diksa : "+ tanggalFormatted);
          $('#iddiksa').val(idbtnpilih);
       
        },
        checkinputkode: function(kode){
            if(kode){
            func.carikode(kode);
            return
            }
            func.alerttoast("inputan kode masih kosong !!","bg-warning");
        },
        inputancheck: function(){
          $("#modalContainer").fadeOut();
          $("#carikode").click(function() {
              var kode_diksa = $("#kodediksa").val();
              func.checkinputkode(kode_diksa);
            });
          $("#closeModalBtn").click(function() {
              $("#modalContainer").fadeOut();
          });
          $("#namapandita").on("input",function(){
            $("#viewpandita").html($(this).val());
          });
          $("#namapengajak").on("input",function(){
            $("#viewpengajak").html($(this).val());
          });
          $("#namapenanggung").on("input",function(){
            $("#viewpenanggung").html($(this).val());
          });
          $('#kodediksa').on('keydown', function(e) {
            var key = e.which || e.keyCode;
            // Memeriksa jika pengguna menekan tombol khusus (misalnya Ctrl + V)
            if ((e.ctrlKey || e.metaKey) && key === 86) {
              var input = $(this);
              // Menggunakan timeout untuk menunggu teks yang ditempel masuk ke input
              setTimeout(function() {
                var value = input.val();
                // Menghapus karakter selain angka dari nilai input
                var numbersOnly = value.replace(/\D/g, '');
                input.val(numbersOnly);
              }, 1);
            }
          });
          // Memeriksa perubahan nilai input
          $('#kodediksa').on('input', function(e) {
            var value = $(this).val();
            // Menghapus karakter selain angka dari nilai input
            var numbersOnly = value.replace(/\D/g, '');
            $(this).val(numbersOnly);
          });

          $('#namapandita, #namapenanggung, #namapengajak').on('keydown paste', function(e) {
            var input = $(this);
            var key = e.which || e.keyCode;
        
            // Memeriksa jika pengguna melakukan paste
            if (e.type === 'paste') {
              setTimeout(function() {
                var value = input.val();
                input.val(func.getNonNumericValue(value));
              }, 1);
            }
            // Memeriksa jika pengguna mengetikkan karakter
            else {
              if (func.isNumericInput(key)) {
                e.preventDefault();
              }
            }
          });
            // Memeriksa perubahan nilai input
            $('#namapandita, #namapenanggung, #namapengajak').on('input', function(e) {
              var input = $(this);
              var value = input.val();
              input.val(func.getNonNumericValue(value));
            });
          
        },
        getNonNumericValue:function(value){
          return value.replace(/\d/g, '');
        },
        isNumericInput: function(key){
          return (key >= 48 && key <= 57);
        },
        savekartu: function(terimadata){
          $.ajax({
            type: "POST",
            url : urlo + "/api/Kartudiksa/save",
            data : terimadata,
            dataType: "json",
            success: function(isi){
              func.alerttoast(isi.data,"bg-success");
              func.resetinput();
            }
          })
        },
        resetinput: function(){
          $('#namapandita').val('');
          $('#namapenanggung').val('');
          $('#namapengajak').val('');
          $("#iddiksa").val('');
           $("#namaumt").val('');
        }
    }
    $(window).on("load",function(){
          func.inputancheck();
          $("#savekartu").on("click",function(){
            var namapandita = $('#namapandita').val();
            var namapenanggung = $('#namapenanggung').val();
            var namapengajak = $('#namapengajak').val();
        
            // Memeriksa apakah ketiga input tidak kosong
            if (namapandita.trim() === '' || namapenanggung.trim() === '' || namapengajak.trim() === '') {
              func.alerttoast("Masih ada inputan, silahkan cek lagi!!","bg-warning");
              return;
            }
            
            var datakirims = {
                id : $("#iddiksa").val(),
                kode_diksa : $("#kodediksa").val(),
                pandita :  $('#namapandita').val(),
                pengajak : $('#namapengajak').val(),
                penanggung : $('#namapenanggung').val()
            };

            var cektext = $("#savekartu").text();
            if(cektext == "Save"){
              func.savekartu(datakirims);
         
            }else{
              var khususnama = $('#namaumt').val();
              func.updatepilih(datakirims,datakirims.id,khususnama);
            }
          });
    });
    $("#btn-print-diksa").on("click",function(){
      window.print();
    });
    if (window.matchMedia){
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                $("#kartudiksa").removeClass('card');
                $("#kartudiksa").addClass('hidden');
                $("#vihara").addClass('text-black');
                $("#judulheader").removeClass('flex');
                $("#judulheader").addClass('invisible');
                $("#kartu").removeClass('place-items-center');
                $("#kartu").addClass('place-items-start');
            } else {
                $("#kartudiksa").removeClass('hidden');
                $("#kartudiksa").addClass('card');
                $("#vihara").removeClass('text-black');
                $("#judulheader").removeClass('invisible');
                $("#judulheader").addClass('flex');
                $("#kartu").removeClass('place-items-start');
                $("#kartu").addClass('place-items-center');
            }
        });
    }

}