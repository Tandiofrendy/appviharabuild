import {Html5QrcodeScanner} from "html5-qrcode"
import Toastify from "toastify-js";
export function absensijadwal() {


      
      var urls = window.location.origin;
      let func = {
        alerttoast: function(text,warna){
          Toastify({
              text: text,
              gravity: "top",
              className: warna,
            }).showToast();
        },
        absen : function(kodeqrs){
              var date = new Date();
              var jam  = date.getHours();
              var menit = date.getMinutes();
              var detik = date.getSeconds();
              var tgl = date.getDate();
              var bulan = date.getMonth() + 1;
              var tahun = date.getFullYear();
              var emails = $("#email").val();
              var getcurrentdt = tahun + "-" + bulan + "-" + tgl + " " + jam + ":" + menit + ":" + detik + "." + "000000";
              var formisi = {
                  kodeqr : kodeqrs,
                  email : emails,
                  waktu_absensi : getcurrentdt
              };

              $.ajax({
                  url : urls + "/api/Absensi/Cekkode",
                  type : "POST",
                  data : formisi,
                  dataType : "JSON",
                  success : function(datas){
                    $("#hasilpresensi").removeClass('hidden');
                    $("#datapres").empty();
                    $("#tpresensi").empty();
                    if(datas.message == "success"){
                     
                      $("#tpresensi").text("PRESENSI BERHASIL");
                     
                    }else{
                      $("#tpresensi").text("SUDAH MELAKUKAN PRESENSI");
                    }
                      let dtpresensi = datas.data
                      console.log(dtpresensi);
                      $.each(dtpresensi,function(i,data){
                        $("#datapres").append(`
                        <div class=" pt-4 sm:p-5 ">
                                    <div class="mt-5 ">
                                        <p class="text-sm+ font-normal">
                                            Full Name :
                                        </p>
                                        <h4 class="text-lg font-extrabold">
                                            ` + data.nama_indonesia +`
                                        </h4>
                                    </div>
                                    <div class="mt-5 ">
                                        <p class="text-sm+ font-normal">
                                            Nama Kegiatan :
                                        </p>
                                        <h4 class="text-lg font-extrabold">
                                        ` + data.judul_kegiatan +`
                                        </h4>
                                    </div>
                                </div>
                                <div class="pt-4 sm:p-5 mt-0">
                                    <div class="mt-5 ">
                                        <p class="text-sm+ font-normal">
                                            Email :
                                        </p>
                                        <h4 class="text-lg font-extrabold">
                                        ` + data.email +`
                                        </h4>
                                    </div>
                                    <div class="mt-5 ">
                                        <p class="text-sm+ font-normal">
                                            Waktu Scan :
                                        </p>
                                        <h4 class="text-lg font-extrabold">
                                        ` + data.waktu_absensi +`
                                        </h4>
                                    </div>
                                </div>
                        `)
                      });
                  }
              })
        }

        
      }
      $(window).on("load",function(){
        $("#hasilpresensi").addClass('hidden');

        $("#reader").addClass('hidden');

        $("#scanButton").on("click",function(){
            $("#btn-scan").addClass('hidden');
            $("#reader").removeClass('hidden');
        })
        function onScanSuccess(decodedText, decodedResult) {
          // handle the scanned code as you like, for example:
  
          html5QrcodeScanner.clear().then(_ => {
            func.absen(decodedText);
            
          }).catch((err) => {
            // Stop failed, handle it.
          });
          
        }
        
        function onScanFailure(error) {
      
  
        }
        
        let config = {  fps: 10, qrbox: 250  , aspectRatio: 1.777778	}
        
        let html5QrcodeScanner = new Html5QrcodeScanner(
          "reader",
          config,
          /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
      });
      $(document).on("click","#absen",function(){
          func.absen();
      });
      

   
}