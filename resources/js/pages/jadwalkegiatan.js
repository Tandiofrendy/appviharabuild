import Toastify from "toastify-js";
export function kegiatanconf(){
    $(function(){
        var num = 0;
        var urls = window.location.origin;
   
        let allstep = $('fieldset').length;
        $('#judul').show();
      
  
        flatpickr(".tglrr", {
          mode: 'range',
          onChange: function (selectedDates, datestr) {
            var tglmulai = $("#tglmulai");
            var tglsls   = $("#tglselesai");
            const dateArr = selectedDates.map(date => this.formatDate(date, "Y-m-d"));
            const dater = datestr.split("to");
            const day = dater[0].split("-");
            var day1 = day[2];
            if(selectedDates.length == 2){
              const select =this.formatDate( selectedDates[1], "j F Y");
              if(dateArr[0] == dateArr[1]){
                tglmulai.val(dater[0]);
                tglsls.val(dater[0]);
              $("#tglrange").val( this.formatDate(new Date(dateArr[0]),"j F Y"));
              }else{
                tglmulai.val(dater[0]);
                tglsls.val(dater[1]);
              $("#tglrange").val(day1 + ' - ' + select );
              }
            } 
          }
        });
  
        flatpickr("#tglsingle", {
          allowInput: true,
          altInput: true,
          mode: 'single',
          onChange: function (selectedDates ,datestr) {
            const dateArr = selectedDates.map(date => this.formatDate(date, "Y-m-d"));
            const dater = datestr.split("to");
            var tglsingle = $("#tglsl");
            tglsingle.val(dater[0]);
            $("#tglsingle").val(this.formatDate(selectedDates[0],"j F Y"));
          }
        });
  
  
        $('.next').click(function(){
            var judulkg = $("#judulkegiatan").val();
            var vhr = $('select[name=vihara] option').filter(':selected').text();
            var ktkegiatan = $('select[name=kategorikegiatan] option').filter(':selected').text();
            var penceramah = $("#namapch").val();
            var tgls = $("#tglsingle").val();
            var tglr = $("#tglrange").val();
            var wktm = $("#wktmulai").val();
            var wkts = $("#wktselesai").val();
            var ket = $("#keterangan").val();
            var starttgls = new Date(tgls);
            var today = new Date();
            var formattedStartDate = starttgls.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            var formattedtoday = today.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            let prev = $(this).closest('fieldset').attr('id');
            let next = $('#'+prev).closest('fieldset').next('fieldset').attr('id');
      

          if(prev === "judul"){
              if(judulkg === "") {
                func.alerttoast("Judul Kegiatan masih kosong","bg-info text-white");
              }else{
                $('#'+next).show();
                $('#'+prev).hide();
              }
          }else if(prev ==="hari"){
            if ($("#waktuacara").is(':checked')){
              var timeParts = tglr.split(' - ');
              var startTime = new Date(timeParts[0]);
              var endTime = new Date(timeParts[1]);
              var today = new Date();
              if(tglr === ""){
                func.alerttoast("tanggal kegiatan masih kosong","bg-info text-white");
                return
              }
              if (startTime < today  ) {
                func.alerttoast("Tanggal kegiatan tidak boleh kurang dari hari ini!!!","bg-warning text-white");
                return
              }
              if(endTime < today){
                func.alerttoast("Tanggal kegiatan tidak boleh kurang dari hari ini!!!","bg-warning text-white");
                return
              }
            }
            else{
              if(tgls === "" ){
                func.alerttoast("tanggal kegiatan masih kosong","bg-info text-white");
                return
              }
              if( formattedStartDate <= formattedtoday){
                func.alerttoast("Tanggal mulai tidak boleh kurang dari hari ini atau sama dengan hari ini!","bg-warning text-white");
                return
              }
              if (penceramah === ""){
                func.alerttoast("penceramah masih kosong","bg-info text-white");
                return
              }
           
            }
            if (wktm === ""){
              func.alerttoast("waktu mulai masih kosong","bg-info text-white");
              return
            }
            if (wkts === ""){
              func.alerttoast("waktu selesai masih kosong","bg-info text-white");
              return
            }
            if (ket === ""){
              func.alerttoast("keterangan masih kosong","bg-info text-white");
              return
            }
            
            if (wktm >= wkts){
              func.alerttoast("Waktu mulai harus lebih kecil dari waktu selesai!","bg-warning text-white");
              return
            }
            $('#'+next).show();
            $('#'+prev).hide();
          }
          if(next == "preview"){
            $("#jdltxt").text(judulkg);
            $("#vhrtxt").text(vhr);
            $("#jenistxt").text(ktkegiatan);
            $("#waktutxt").text(wktm + " " + "  sampai  "+ " "+ wkts + " " + "WIB");
            $("#kettxt").text(ket);
            if(!$("#waktuacara").is(':checked')){
              $("#pchtxt").show();
              $("#pchtxt").text(penceramah);
              $("#haritxt").text(tgls);
            }else{
              $("#pchtxt").hide();
              $("#haritxt").text(tglr);
            }
          }
        });
  
  
        $('.prev').click(function(){
          let current = $(this).closest('fieldset').attr('id');
          let prev =$('#'+current).closest('fieldset').prev('fieldset').attr('id');
          $('#'+prev).show();
          $('#'+current).hide();
        })
  
     
        let func = {
            cekcheck: function(){
              if($('#waktuacara').is(':checked'))
                  {
                    $('.date1').removeClass('hidden');
                    $('.date1').addClass('flex');
                    $('.date2').removeClass('flex');
                    $('.date2').addClass('hidden');
                    $('.penceramah').removeClass('block');
                    $('.penceramah').addClass('hidden');
                  }else
                  {
                    $('.date2').removeClass('hidden');
                    $('.date2').addClass('flex');
                    $('.date1').removeClass('flex');
                    $('.date1').addClass('hidden');
                    $('.penceramah').removeClass('hidden');
                    $('.penceramah').addClass('block');
                  }
            },
            alerttoast: function(text,warna){
              Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
            },
            getvihara: function(){
                $.ajax({
                    type : "GET",
                    url  : urls + "/api/Vihara/View",
                    dataType: "json",
                    success: function(data){
                        let isi = data.data
                        $.each(isi,function(i,data){
                            $("#vihara").append(`<option value="`+ data.kode_vihara +`">`+ data.nama_vihara +`</option>`)
                        })
                    }

                })
            },
            resetinput: function(){
                $("#tabinput")[0].reset();
                $("#tabinput1")[0].reset()
            },
            getkategori: function(){
                $.ajax({
                    type : "GET",
                    url  : urls +"/api/kategori/viewdata",
                    dataType: "json",
                    success : function(data){
                        let isi = data.data;
                        $.each(isi,function(i,data){
                            $("#kategorikegiatan").append(`<option value="`+ data.kodekategori+`">`+ data.namakategori +`</option>`)
                        })
                    }
                })
            },
            cekid: function(kode){
                $.ajax({
                    type : "POST",
                    url  : urls + "/api/Jadwalkegiatan/Count/"+kode,
                    dataType: "json",
                    success : function(data){
                      $("#cekid").val(data.data);
                    }
                })
            },
            savejadwal: function(){
                var tglmulai = $("#tglmulai");
                var tglsls   = $("#tglselesai");
                var tglsingle = $("#tglsl")
                var vihara = $('select[name=vihara] option').filter(':selected').val();
                var d  = new Date();
                var month = d.getMonth()+1;
                var day = d.getDate();
                var years = d.getFullYear();
                var ids = "JW" + "-" + day + month + years;
                func.cekid(ids);
                var tgla ="";
                var tglb ="";
                var wa = "";
                var npch = "";
                if($('#waktuacara').is(':checked')){
                  tgla  = tglmulai.val();
                  tglb  = tglsls.val();
                  wa =1;
                  npch = "";
                }else{
                  tgla = tglsingle.val();
                  tglb = tglsingle.val();
                  wa=0;
                  npch = $("#namapch").val();
                }
                var formdata = {
                   kode_kegiatan : ids,
                   email         : $("#email").val(),
                   status_jadwal : 0,
                }

                var formdata2 = {
                   kode_kegiatan : ids,
                   kodekategori  : $('select[name=kategorikegiatan] option').filter(':selected').val(),
                   kode_vihara   : vihara,
                   judul_kegiatan: $("#judulkegiatan").val(),
                   tanggal_kegiatan : tgla,
                   tglselesai_kegiatan : tglb,
                   mulai_kegiatan : $("#wktmulai").val(),
                   selesai_kegiatan: $("#wktselesai").val(),
                   lama_kegiatan : wa,
                   nama_penceramah : npch,
                   keterangan : $("#keterangan").val()
                }

                var cekids = $("#cekid").val() ;



                if(cekids == 1){
                  func.savetemp(formdata2);
                  func.viewall();
                }else{
                  $.ajax({
                    type : "POST",
                    url : urls + "/api/Jadwalkegiatan/simpan",
                    data : formdata,
                    dataType : "json",
                    success: function(){
                       func.savetemp(formdata2);
                       func.viewall();
                  
                    }
                 })
                }
                
            },
            savetemp: function(formdata2){
               $.ajax({
                  type: "POST",
                  url : urls + "/api/Jadwal/simpan",
                  data: formdata2,
                  dataType: "json",
                  success: function(data){
                    func.alerttoast(data.data,"bg-success text-white");
                    func.resetinput();

                   
                  }
               });
            },
            viewall: function(){
              $.ajax({
                type : "GET",
                url  : urls + "/api/Jadwal/Viewall",
                dataType: "json",
                success : function(isi){
                  let data = isi.data;
                  $("#dataajax").empty();
                  $.each(data,function(i,data){
                    $("#dataajax").append(`
                    <tr class="border .isitr border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap  rounded-l-lg px-4 py-3 sm:px-5">`+ data.id +`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.kode_kegiatan +`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.namakategori +`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.nama_vihara+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.judul_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.tanggal_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.tglselesai_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.mulai_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.selesai_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.lama_kegiatan+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.nama_penceramah+`</td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.keterangan+`</td>
                        <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                            <div class="flex justify-center space-x-2">
                                <button value="`+ data.id + ` "  class="btn dataedit`+ i +`  h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25" id="`+ i +`" name="edit">
                                    <i class="fa fa-edit edit"  id="`+ i +`" ></i>
                                </button>
                                <button value="`+ data.id + ` "   class="btn datahp`+ i +` h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25" id="`+ i +`" name="hapus">
                                    <i class="fa fa-trash-alt hapus"  id="`+ i +`" ></i>
                                </button>
                            </div>
                        </td>
                    </tr>`);
                   
                  });
                  
                }
              })
            },
            editajxjadwal: function(urlid){
              func.resetinput();
              func.cekcheck();
              $.ajax({
                  type : "POST",
                  url  : urlid,
                  dataType : "json",
                  success : function(data){
                      let isi = data.data;
                      $.each(isi,function(i,edit){
                        $("#kdkeg").val(edit.kode_kegiatan);
                        $("#judulkegiatan").val(edit.judul_kegiatan);
                        $("#wktmulai").val(edit.mulai_kegiatan);
                        $("#wktselesai").val(edit.selesai_kegiatan);
                        $( `#vihara option[value=`+ edit.kode_vihara +`]`).attr('selected','selected');
                        $( `#kategorikegiatan option[value=`+ edit.kodekategori +`]`).attr('selected','selected');
                        
                        if(edit.lama_kegiatan == 0){
                          $('#waktuacara').prop("checked",false);
                          func.cekcheck();
                          $("#namapch").val(edit.nama_penceramah);
                          $("#keterangan").val(edit.keterangan);
                        }else{
                          $('#waktuacara').prop("checked",true);
                          func.cekcheck();
                          $("#keterangan").val(edit.keterangan);
                        }
                        $(".simpan").text("Update");
                      });
            
                    
                  }
              });
            },
            updateajxtemp: function(){
              var tgla ="";
              var tglb ="";
              var wa = "";
              var npch = "";
              var tglmulai = $("#tglmulai");
              var tglsls   = $("#tglselesai");
              var tglsingle = $("#tglsl");
              if($('#waktuacara').is(':checked')){
                tgla  = tglmulai.val();
                tglb  = tglsls.val();
                wa =1;
                npch = "";
              }else{
                tgla = tglsingle.val();
                tglb = tglsingle.val();
                wa=0;
                npch = $("#namapch").val();
              }
              var id =  $("#updateid").val();
              var formdata2 = {
         
                kodekategori  : $('select[name=kategorikegiatan] option').filter(':selected').val(),
                kode_vihara   : $('select[name=vihara] option').filter(':selected').val(),
                judul_kegiatan: $("#judulkegiatan").val(),
                tanggal_kegiatan : tgla,
                tglselesai_kegiatan : tglb,
                mulai_kegiatan : $("#wktmulai").val(),
                selesai_kegiatan: $("#wktselesai").val(),
                lama_kegiatan : wa,
                nama_penceramah : npch,
                keterangan : $("#keterangan").val()
             }

             $.ajax({
                type : "PUT",
                url  : urls + "/api/Jadwal/update/" + id,
                data : formdata2,
                dataType: "json",
                success : function(data){
                  func.alerttoast(data.data,"bg-success text-black font-bold");
                  func.resetinput();
                  func.cekcheck();
                  func.viewall();
                  $(".simpan").text("Simpan");
                }
             })
            },
            deleteajxtemp: function(urlhp){
                $.ajax({
                  type : "DELETE",
                  url  : urlhp,
                  dataType: "json",
                  success : function(data){
                    func.alerttoast(data.data,"bg-success text-black font-bold");
                    func.viewall();
                    if( $(".simpan").text() == "Update"){
                      func.resetinput();
                      func.cekcheck();
                        $(".simpan").text("Simpan");
                    }
                  }

                })
            },
            resetfieldset: function(){
              $('#preview').hide();
              $('#judul').show();
            }


        }


        $('#waktuacara').click(function(){
          func.cekcheck();
        });
        $(window).on("load",function(){
            var d  = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var years = d.getFullYear();
            var ids = "JW" + "-" + day + month + years;
            func.cekid(ids);
            func.getvihara();
            func.getkategori();
            func.viewall();

        });

        $(".simpan").on("click",function(){
            if($(".simpan").text() == "Simpan"){
              func.savejadwal();
              func.resetfieldset();
            }else{
              func.updateajxtemp();
              func.resetfieldset();
            }
            
        });

        // $(".prev").on("click",function(){
        //   $(".simpan").text("Update");
        //   console.log("hello")
        // });

        $("#dataajax").on("click",function(e){
          if(e.target.className == 'fa fa-edit edit' || e.target.name == 'edit'){
            var idedit = $(".dataedit"+e.target.id).val();
            var urledt = urls+"/api/Jadwal/edit/"+idedit;
            $("#updateid").val(idedit);
            func.editajxjadwal(urledt);
          }
          if(e.target.className == 'fa fa-trash-alt hapus' || e.target.name == 'hapus'){
            var idhapus = $(".datahp"+e.target.id).val();
            var urlhapus = urls+"/api/Jadwal/delete/" +idhapus
            
            $.confirm({
                title: 'Anda yakin menghapus ?',
                content: 'Data tidak dapat dikembalikan!',
                type: 'red',
                typeAnimated: true,
                useBootstrap: false,
                boxWidth: '20%',
                buttons: {
                    tryAgain: {
                        text: 'Ya!',
                        btnClass: 'btn-red',
                        action: function(){
                            func.deleteajxtemp(urlhapus);
                        }
                    },
                    close:{
                        text : 'No',
                        function () {
                        }
                    } 
                }
            });
        }
        });

    });
}