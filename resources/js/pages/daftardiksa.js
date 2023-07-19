import Toastify from "toastify-js";
export function dafdiksa(){
    var url = window.location.origin;
    var num = 0; 
    var max =0;
    var dewasanum 
    var anaknum 
    var bayinum 
    var localsto = 0;
    var saveval = 0;

    let func = {
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        validasiinputreser:function(){

        },
        validasiinputandaftar: function(validasi){
          var datapdf = {
            kode_diksa : $("#idpdf").val(),
            tanggal_diksa : $("#tgldiksapdf").val(),
            kode_vihara : $("#select-vihara").val(),
            email : $("#emailpdf").val(),
            total_dewasa : $("#kategoripil0").val(),
            total_anak : $("#kategoripil1").val(),
            total_bayi : $("#kategoripil2").val(),
          }

          var errors = {};
          var isAnyValueValid = false;
          // Validasi tanggal_diksa
          
          if($('#tambah-pdf').prop('checked')){
           // Validasi total_dewasa, total_anak, dan total_bayi

              if (
                ( datapdf.total_dewasa <= 0) &&
                ( datapdf.total_anak <= 0) &&
                ( datapdf.total_bayi <= 0)
              ) {
                errors.total = "Minimal satu dari Total Dewasa, Total Anak, atau Total Bayi harus memiliki nilai yang valid.";
              } else {
                isAnyValueValid = true;
              }

              if (isAnyValueValid) {
                delete errors.total_dewasa;
                delete errors.total_anak;
                delete errors.total_bayi;
              }
          }
          

          if (datapdf.tanggal_diksa.trim() === "") {
            errors.tanggal_diksa = "Tanggal Diksa tidak boleh kosong.";
          } else {
            var today = new Date();
            var selectedDate = new Date(datapdf.tanggal_diksa);

            if (selectedDate < today) {
              errors.tanggal_diksa = "Tanggal Diksa tidak boleh kurang dari tanggal hari ini.";
            }
          }


          // Validasi kode_vihara
          if (datapdf.kode_vihara.trim() === "") {
            errors.kode_vihara = "Kode Vihara tidak boleh kosong.";
          }
          if (Object.keys(errors).length > 0) {
            for (var field in errors) {
              if (errors.hasOwnProperty(field)) {
                func.alerttoast(errors[field],"bg-warning");
              }
            }
          } else {
              return validasi = 1 ;
          }

        },
        checkdata: function(){
        
          if(dewasanum === ""){
            dewasanum = 0
          }
          if(anaknum === ""){
            anaknum = 0
          }
          if(bayinum === ""){
            bayinum = 0
          }

          var datapdf = {
            kode_diksa : $("#idpdf").val(),
            tanggal_diksa : $("#tgldiksapdf").val(),
            kode_vihara : $("#select-vihara").val(),
            email : $("#emailpdf").val(),
            total_dewasa : dewasanum,
            total_anak : anaknum,
            total_bayi : bayinum,
          }

          var dataString = JSON.stringify(datapdf);
          localStorage.setItem('data_'+datapdf.email, dataString);


        },
        selvihara: function(){
          const select = $('#select-vihara');
            $.ajax({
                type:"GET",
                url :  url+"/api/Vihara/View",
                dataType: "json",
                success : function(isi){
                    let viharasel = isi.data
                    
                    for (let iA = 0; iA < viharasel.length; iA++) {
                        const option = $('<option></option>');
                        option.attr('value', viharasel[iA].kode_vihara);
                        option.text(viharasel[iA].nama_vihara);
                        select.append(option);
                    }
                }
            });
            select.change(function() {
              var selectedValue = $(this).val();
              if (selectedValue !== select.find('option:eq(2)').val()) {
                // Mengubah opsi terpilih menjadi opsi kedua
                select.val(select.find('option:eq(2)').val());
              }
           
            });
           
        },
        datapendaftar: function(urle){
          $.ajax({
              type: "POST",
              url : urle,
              dataType:"json",
              success: function(isi){
                  let isidata = isi.data;
                      $.each(isidata,function(i,cekdata){
                          $("#namapdf").val(cekdata.nama_indonesia);
                          $("#jkelaminpdf").val(cekdata.jenis_kelamin);
                          $( "#tlahirpdf" ).val(cekdata.ttlahir);
                          $("#no-hppdf").val(cekdata.nohp);
                      });

              }
          })
        },
        cekkuotadiksa: function(){
          var formisi = {
            tanggal_diksa : $("#tgldiksapdf").val()
          }

          $.ajax({
            type: "POST",
            url : url+"/api/Bookdiksa/cektotaldiksa",
            data : formisi,
            dataType:"json",
            success: function(kuota){
              let kuotadiksa = kuota.data ;
              if(kuotadiksa === 10 ){
                $("#my-modal").removeClass('hidden');
                $("#btn-hapus-mo").click(function(){
                  $("#my-modal").addClass('hidden');
                  $("#select-vihara").prop('disabled',true);
                  $(".next").prop('disabled',true);
                });

              }else{
                $("#select-vihara").prop('disabled',false);
                $(".next").prop('disabled',false);
              }
            }
          });
          
        },
        buatid: function(){
          var formisi = {
            tanggal_diksa : $("#tgldiksapdf").val()
          }

          if(localsto === 0){
              
              $.ajax({
                type: "POST",
                url : url+"/api/Bookdiksa/cektotaldiksa",
                data : formisi,
                dataType:"json",
                success: function(isi){
                  let countdiksa = isi.data + 1;
                  var dbNumber = ('0' + countdiksa ).slice(-2);
                  var tgl_lama = $("#tgldiksapdf").val();
                  var tanggal_baru = tgl_lama.split('-').join('').substring(2);
                  var id = tanggal_baru+dbNumber ;
                  func.checkid(id);
                }
              });
          }
         
       
        },
        checkid:function(idkode){
          var dataid = {
            kode_diksa : idkode,
            tanggal_diksa : $("#tgldiksapdf").val()
          }

          $.ajax({
            type: "POST",
            url : url+"/api/Bookdiksa/checkiddiksa",
            data : dataid,
            dataType:"json",
            success: function(isi){
            
              $("#idpdf").val(isi.data);
            }
          });
        },
        daftardiksa: function(email){
          var storedDataString = localStorage.getItem('data_'+email); 
          var storedData = JSON.parse(storedDataString);
          $.ajax({
            type: "POST",
            url : url+"/api/Bookdiksa/simpan",
            data : storedData,
            dataType:"json",
            success: function(isi){
              func.simpanreservasi();
              console.log(isi.data);
            }
          });
        },
        dfdiksanreservasi: function(){
          var datapdf = {
            kode_diksa : $("#idpdf").val(),
            tanggal_diksa : $("#tgldiksapdf").val(),
            kode_vihara : $("#select-vihara").val(),
            email : $("#emailpdf").val()
          }
          $.ajax({
            type: "POST",
            url : url+"/api/Bookdiksa/simpan",
            data : datapdf,
            dataType:"json",
            success: function(isi){
              console.log(isi.data);
              func.createreservasi();
            }
          });
        },
        createreservasi: function(){
          var reserv = {
            kode_diksa : $("#idpdf").val(),
            katepdf : "dewasa",
            namapdf : $("#namapdf").val(),
            nohppdf : $("#no-hppdf").val(),
            tgllpdf : $("#tlahirpdf").val(),
            jeniskelpdf : $("#jkelaminpdf").val(),
          }
          
          var reserkodeurl =   $("#idpdf").val();
          var senddturl = url+"/layouts/Buktidiksa/:data".replace(':data',encodeURIComponent(reserkodeurl));

          var datajs = [];
          datajs.push(reserv);
          console.log(datajs);
          $.ajax({
            type: "POST",
            url : url+"/api/Reservasi/simpan",
            data : JSON.stringify(datajs),
            dataType:"json",
            success: function(isi){
              func.alerttoast("reservasi berhasil disimpan","bg-success");
              window.location.replace(senddturl);
             
            }
          });
        },
        ambillocalstorage: function(email){
          var storedDataString = localStorage.getItem('data_'+email);
          if(storedDataString != null){
            
          var storedData = JSON.parse(storedDataString);
        
          var jumlahData = localStorage.length;

          // Membuat array untuk menyimpan data dinamis dari local storage
          var dataDinamis = [];
          for (var a = 0; a < jumlahData; a++) {
            var key = localStorage.key(a);
            if (key.startsWith("data_dinamis")) {
              var dataString = localStorage.getItem(key);
              var dataObj = JSON.parse(dataString);
              dataDinamis.push(dataObj);
            }
          }
            $('#modalTemplate').fadeIn();
            $('#isimodalv2').append(`
            <div class="flex flex-col justify-between ">
            <span  class="text-base text-black font-semibold">Kode diksa : </span> 
            <h4 class="text-base text-black font-normal">`+storedData.kode_diksa+`</h4> 
            <span  class="text-base text-black font-semibold">Tanggal diksa : </span> 
            <h4 class="text-base text-black font-normal">`+storedData.tanggal_diksa+`</h4>
            </div>
            <h3 class="text-lg text-black font-bold">apakah ingin dilanjut ? </h3>
            `);

          $('#modalTemplate').on('click', '#close', function() {
              $('#modalTemplate').fadeOut(); // Sembunyikan modal dengan efek fadeOut
              localStorage.clear();
          });
          $('#modalTemplate').on('click', '#oke', function() {
            $("#idpdf").val(storedData.kode_diksa);
            $("#select-vihara").val(storedData.kode_vihara);
            localsto = 1;
            $("#tgldiksapdf").val(storedData.tanggal_diksa);
            flatpickr("#tgldiksa", {
              defaultDate: storedData.tanggal_diksa,  // Tanggal dari database
              disable: [
                function (date) {
                      const  senin = 1;
                      const  selasa = 2;
                      const  kamis = 4;
                      const  jumat = 5;
                      const  sabtu = 6;
                      const  minggu = 0;
                      return (date.getDay() === senin || date.getDay() === selasa  || date.getDay() === kamis || date.getDay() === jumat || date.getDay() === sabtu || date.getDay() === minggu );
                      
                  }
                ],
              locale: 'id',
            });
            
            $('#tambah-pdf').prop('checked',true);
            $("#kategoripil0").val(storedData.total_dewasa);
            $("#kategoripil1").val(storedData.total_anak);
            $("#kategoripil2").val(storedData.total_bayi);
           

            $.each(dataDinamis,function(i,dtdinamis){
                $("#namapdf"+dtdinamis.idinput).val(dtdinamis.namapdf);
                console.log(dtdinamis.kode_diksa);
            });
            $('#modalTemplate').fadeOut(); // Sembunyikan modal dengan efek fadeOut
          });

          }
        },
        buttonmodal : function(){
          // Menangani tombol Escape untuk menutup modal
          $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
              $('#modalTemplate').hide(); // Sembunyikan modal
            }
          });
        },
        simpanreservasi: function(){
          // Mendapatkan jumlah data dinamis yang tersimpan dalam local storage
          var jumlahData = localStorage.length;

          // Membuat array untuk menyimpan data dinamis dari local storage
          var dataDinamis = [];
          var reserkodeurl =   $("#idpdf").val();
          var senddturl = url+"/layouts/Buktidiksa/:data".replace(':data',encodeURIComponent(reserkodeurl));

          // Mengambil setiap data dinamis dari local storage dan menyimpannya dalam array
          for (var a = 0; a < jumlahData; a++) {
            var key = localStorage.key(a);
            if (key.startsWith("data_dinamis")) {
              var dataString = localStorage.getItem(key);
              var dataObj = JSON.parse(dataString);
              dataDinamis.push(dataObj);
            }
          }
          $.ajax({
            type: "POST",
            url : url+"/api/Reservasi/simpan",
            data : JSON.stringify(dataDinamis),
            dataType:"json",
            success: function(){
              func.alerttoast("reservasi berhasil disimpan","bg-success");
              localStorage.clear();
              window.location.replace(senddturl);
            }
          });
          
        }
    };

    $(window).on("load",function(){


      func.buttonmodal();
        var email = $("#emailpdf").val()
        func.ambillocalstorage(email);
        var urls = url+"/api/Userinformation/cekdata/"+email
        func.datapendaftar(urls)
        func.selvihara();
        for (let pil = 0; pil < 3; pil++) {
            $("#pilihan").append(`
            <label class="block">
            <span id="judulpil`+pil+`"></span>
              <div
                  class="flex flex-row form-input mt-1.5 justify-center border h-10 w-full rounded-lg border-slate-300 relative"
                >
                  <button
                    class="font-semibold   border-r border-slate-300 bg-white  text-black hover:border-slate-400  h-full w-20 flex rounded-l focus:outline-none cursor-pointer"
                    id="minus`+pil+`"
                  >
                    <span class="m-auto">-</span>
                  </button>
                  <input
                    type="hidden"
                    class="md:p-2 p-1 text-xs md:text-base border-gray-400 focus:outline-none text-center"
                    readonly
                    name="kategoripil`+pil+`"
                    id = "kategoripil`+pil+`"
                  />
                  <div
                    class="bg-white  w-24 text-xs md:text-base flex items-center justify-center cursor-default"
                  >
                    <span id="isicount`+pil+`">0</span>
                  </div>
    
                  <button
                    class="font-semibold  border-l border-slate-300 bg-white  text-black hover:border-slate-400  h-full w-20 flex rounded-r focus:outline-none cursor-pointer"
                    id="plus`+pil+`"
                  >
                    <span class="m-auto">+</span>
                  </button>
                </div>
          </label>
            `);

            $("#plus"+pil).click(function(){
                batas(++max);
                num  = +$("#kategoripil"+pil).val();
                num  = num + 1;
                $("#kategoripil"+pil).val(num);
                $("#isicount"+pil).text(num);
                
                dewasanum = $("#kategoripil0").val();
                anaknum = $("#kategoripil1").val();
                bayinum = $("#kategoripil2").val();
              });

              $("#minus"+pil).click(function(){
                
                 num  = +$("#kategoripil"+pil).val();
                 num  = num - 1;
                if(num == -1){
                  var nums = 0
                  $("#kategoripil"+pil).val(nums);
                  $("#isicount"+pil).text(nums);
                  dewasanum = $("#kategoripil0").val();
                  anaknum = $("#kategoripil1").val();
                  bayinum = $("#kategoripil2").val();
                }else{
                  $("#kategoripil"+pil).val(num);
                  $("#isicount"+pil).text(num);
                  batas(--max);
                  dewasanum = $("#kategoripil0").val();
                  anaknum = $("#kategoripil1").val();
                  bayinum = $("#kategoripil2").val();
                }
              });
         }

        $("#judulpil0").text("Dewasa");
        $("#judulpil1").text("Anak-anak");
        $("#judulpil2").text("Bayi");
          $(".next").click(function(){
             
              if(func.validasiinputandaftar() === 1){
              let prev = $(this).closest('fieldset').attr('id');
              let next = $('#'+prev).closest('fieldset').next('fieldset').attr('id');
              $('#'+next).show();
              $('#'+prev).hide();
              if(next == "inputdata"){
                const datamentah  = gettotalpendiksa();
                var splitdata = datamentah.toString().split(",");
                const judul = [
                  "Dewasa","Anak-anak","Bayi"
                ]
                let no = 0;
                for(let j=0; j < judul.length; j++){
                    for(let i=1; i <= splitdata[j]; i++){
                    $("#dinamisform").append(`
                          <fieldset class="space-y-4 p-4 `+ judul[j] + i +` " id="`+ judul[j] +`">
                            <div class="border-b border-slate-200  dark:border-navy-500 sm:px-2">
                              <div class="flex flex-row justify-between" >
                                <div class="flex flex-row">
                                <h4
                                  class="text-lg font-medium text-slate-700 dark:text-navy-100"
                                >
                                `+ judul[j] +`  
                                </h4>
                                <h3 class="text-lg ml-1.5 font-medium text-slate-700 dark:text-navy-100"> `+ i +` </h3>
                                </div>
                                <div>
                                <button
                                  class="btn simpan`+ judul[j] +i+` h-6 rounded bg-primary px-3 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                  data-entitas="`+ judul[j] +`"
                                  >
                                  Simpan
                                </button>
                                </div>
                              </div>
                            </div>
                              <label class="block">
                              <input
                                  class="form-input `+ judul[j] +` hidden disabled:opacity-75 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  type="text"
                                  id="kategori`+judul[j]+i+`"
                                  name="kategori`+judul[j]+i+`"
                                  value=" `+ judul[j] +` "
                                  readonly
                                  
                                />
                                <span>Nama :</span>
                                <span class="relative mt-1.5 flex">
                                  <input
                                    class="form-input `+ judul[j] +`   peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="tandio frendy"
                                    type="text"
                                    id="namapdf`+judul[j]+i+`"
                                    name="namapdf`+judul[j]+i+`"
                                    
                                  />
                                  <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                  >
                                    <i class="fa-solid fas fa-user text-base"></i>
                                  </span>
                                </span>
                              </label> 
                              <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <label class="block" id="no`+judul[j]+`">
                                  <span>No Hp :</span>
                                  <span class="relative mt-1.5 flex">
                                    <input
                                      class="form-input `+ judul[j] +` peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="081232312322"
                                      type="number"
                                      id="nohp`+judul[j]+i+`"
                                      name="nohp`+judul[j]+i+`"
                                     
                                    />
                                    <span
                                      class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                    >
                                      
                                    </span>
                                  </span>
                                </label> 

                                <div class="grid grid-cols-2 gap-4">
                                  <label class="block">
                                    <span>Jenis Kelamin :</span>
                                    <span class="relative mt-1.5 flex">
                                      <select
                                        class="form-select `+ judul[j] +`  w-full rounded-lg border border-slate-300 bg-white px-3 py-2 pl-9 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id ="jkelamin`+judul[j]+i+`"
                                        name ="jkelamin`+judul[j]+i+`"
                                        >
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                        
                                      </select>
                                      <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                      >
                                        <i class="fa-solid fas fa-venus-mars text-base"></i>
                                      </span>
                                    </span>
                                  </label> 
                                  <label class="block">
                                    <span>Tgl Lahir :</span>
                                    <span class="relative mt-1.5 flex">
                                    <input
                                      x-input-mask="{
                                          date: true,
                                          delimiter: '-',
                                          datePattern: ['Y', 'm','d']
                                        }"
                                      class="form-input `+ judul[j] +`  w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="19-02-2005"
                                      type="text"
                                      id="tgllahir`+judul[j]+i+`"
                                      name="tgllahir`+judul[j]+i+`"
                                    />
                                      <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                      >
                                        <i class="fa-solid far fa-calendar-alt text-base"></i>
                                      </span>
                                    </span>
                                  </label> 
                                </div>
                              </div>                     
              
                          </fieldset>                
                    `);
                    $(".simpan"+ judul[j] +i).click(function(){
                      
                      var entitas = judul[j] +i;
                      var entitass = judul[j];
                      var newnopdf = "";
                      if(entitass ===  'Dewasa') {
                        newnopdf = $("#nohp"+judul[j] +i).val()
                      } else if (entitass === 'Anak-anak'){
                        newnopdf = "";
                      } else {
                        newnopdf = "";
                      }
                      var datarev = {
                        kode_diksa : $("#idpdf").val(),
                        katepdf : $("#kategori"+judul[j] +i).val(),
                        namapdf : $("#namapdf"+judul[j] +i).val(),
                        nohppdf : newnopdf,
                        tgllpdf : $("#tgllahir"+judul[j] +i).val(),
                        jeniskelpdf : $("#jkelamin"+judul[j]+i).find(":selected").val(),
                        idinput : entitas
                      }
                      var  {nohppdf,namapdf,tgllpdf} = datarev;
                      if(namapdf === ""){
                        func.alerttoast("nama pendaftar masih kosong","bg-warning");
                        return
                      }
                      if(tgllpdf === ""){
                        func.alerttoast("tanggal lahir masih kosong","bg-warning");
                        return
                      }
                      if(entitass === "Dewasa"){
                        if(nohppdf===""){
                          func.alerttoast("nomor hp masih kosong","bg-warning");
                          return;
                        }
                        if (nohppdf.length === 0) {
                          func.alerttoast("nomor hp masih kosong","bg-warning");
                          return;
                        }
                        if (nohppdf.length <= 10 ) {
                          func.alerttoast("Masukkan nomor HP dengan format yang benar (10 angka) contoh: 081238372222","bg-warning");
                          return;
                        }
                      }
                        var dataRevString = JSON.stringify(datarev);
                        localStorage.setItem("data_dinamis_"+entitas, dataRevString);
                        $(this).closest('fieldset').remove();
                        func.alerttoast("Data " + entitas + " Berhasil Disimpan!","bg-success");
                    });
                    var fieldstkat= $("#dinamisform").children("fieldset").attr('id');
                    if (fieldstkat.includes("Anak-anak") || fieldstkat.includes("Bayi") || fieldstkat.includes("Dewasa")) {
                        $("#noAnak-anak,#noBayi").remove(); // Jika semua kategori dipilih, hapus input nohp untuk anak-anak dan bayi
                    } else if (fieldstkat.includes("Anak-anak") || fieldstkat.includes("Bayi")) {
                        $("#noAnak-anak,#noBayi").remove(); // Jika kategori anak-anak atau bayi dipilih, sembunyikan input nohp untuk anak-anak dan bayi
                    }
                  }}
                  if($('#tambah-pdf').prop('checked')){
                    func.checkdata();
                  }
                }
              }
               
              });
          $(".prev").click(function(){
            let current = $(this).closest('fieldset').attr('id');
            let prev =$('#'+current).closest('fieldset').prev('fieldset').attr('id');
            $('#'+prev).show();
            $('#'+current).hide();
            $("#dinamisform").children("fieldset").remove();
          });

          $(".save").click(function(){
            if($('#tambah-pdf').prop('checked')== false){
              func.dfdiksanreservasi();
              return
            }
            func.daftardiksa(email);
          });
      });
    function setalert(tdata){
        $(".isAlert").html(`
                   <div
                     x-data ="{isShow:true}"
                     :class="!isShow && 'opacity-0 transition-opacity duration-300'"
                     class="alert flex items-center justify-between overflow-hidden rounded-lg border border-info text-info"
                   >
                         <div class="flex">
                           <div class="bg-info p-3 text-white">
                             <svg
                               xmlns="http://www.w3.org/2000/svg"
                               class="h-5 w-5"
                               fill="none"
                               viewbox="0 0 24 24"
                               stroke="currentColor"
                             >
                               <path
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 stroke-width="2"
                                 d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                               />
                             </svg>
                           </div>
                           <div class="px-4 py-3 sm:px-5" >` + tdata +`</div>
                         </div>
                         <div class="px-2">
                           <button
                             @click="isShow = false; setTimeout(300)"
                             class="btn h-7 w-7 rounded-full p-0 font-medium text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                             id="calert"
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
                               />
                             </svg>
                           </button>
                         </div>
                       </div> 
               `);
     }
     flatpickr("#tgldiksa", {
       disable: [
           function (date) {
                 const  senin = 1;
                 const  selasa = 2;
                 const  kamis = 4;
                 const  jumat = 5;
                 const  sabtu = 6;
                 const  minggu = 0;
                 return (date.getDay() === senin || date.getDay() === selasa  || date.getDay() === kamis || date.getDay() === jumat || date.getDay() === sabtu || date.getDay() === minggu );
                 
             }
           ],
           locale: 'id',
         onChange: function (selectedDates) {
           $("#tgldiksa").val(this.formatDate(selectedDates[0],"D, j F Y"));
           $("#tgldiksapdf").val(this.formatDate(selectedDates[0],"Y-m-d"));
          func.buatid();
          func.cekkuotadiksa();
          
           if(selectedDates[0].getDay() == 3){
              setalert("Pelayanan diksa pada hari rabu, Khusus luar kota.");
           }
           
         }
       });

     $(".alert").hide();
     batas(max);
     function batas(maxnum){
       if(maxnum == 10){
         for(let i=0 ; i < 3 ; i++){
            $("#plus"+i).prop('disabled',true);
         }
       
         setalert("Batas maksimum 10 orang untuk dewasa,anak-anak dan bayi")
        
       }else{
          $("#plus0").prop('disabled',false);
          $("#plus1").prop('disabled',false);
          $("#plus2").prop('disabled',false);
       }

     }
     function gettotalpendiksa(total){

       let dt1 = $("#kategoripil0").val();
       let dt2 = $("#kategoripil1").val();
       let dt3 = $("#kategoripil2").val();
       const datajlhdiksa  = [
         dt1,
         dt2,
         dt3
       ];
       return datajlhdiksa;
     }

}