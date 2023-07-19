import Toastify from "toastify-js";
import flatpickr from "flatpickr";
export function UserSettings(){
    $(function(){

        var url = window.location.origin;
        let func = {

            alerttoast: function(text,warna){
                Toastify({
                    text: text,
                    gravity: "top",
                    className: warna,
                  }).showToast();
            },
            save: function(){
                var formdata = {
                    nama_mandarin : $("#nama_mandarin").val(),
                    nama_indonesia : $("#nama_indonesia").val(),
                    email : $("#email_user").val(),
                    nohp  : $("#nohp").val(),
                    ttlahir : $("#ttlahir").val(),
                    alamat : $("#alamat").val(),
                    jenis_kelamin : $("input[type='radio'][name='jenis']:checked").val()
        
                }

                $.ajax({
                    type: "POST",
                    url : url+"/api/Userinformation/simpan",
                    data : formdata,
                    dataType : "json",
                    success: function(data){
                        $(".save").text("Edit");
                        func.alerttoast("Data berhasil di input!!", "bg-success text-white font-bold");
                       
                    }
                });
                console.log(formdata);
            },
            disButton: function(){
                $("#nama_mandarin").prop("disabled",true);
            },
            update: function(){
                var formdata = {
                        nama_mandarin : $("#nama_mandarin").val(),
                        nama_indonesia : $("#nama_indonesia").val(),
                        email : $("#email_user").val(),
                        nohp  : $("#nohp").val(),
                        ttlahir : $("#ttlahir").val(),
                        alamat : $("#alamat").val(),
                        jenis_kelamin : $("input[type='radio'][name='jenis']:checked").val()

                }
                $.ajax({
                    type: "PUT",
                    url : url+"/api/Userinformation/update",
                    data : formdata,
                    dataType : "json",
                    success: function(data){
                        $(".save").text("Edit");
                        
                        func.alerttoast("Update Data berhasil!!", "bg-success text-white font-bold");
                    }
                })
                 console.log(formdata);
            },
            cekdata: function(url){
                $.ajax({
                    type: "POST",
                    url : url,
                    dataType:"json",
                    success: function(isi){
                        let isidata = isi.data;
                 
                        if(isidata.length !== 0){
                            $.each(isidata,function(i,cekdata){
                                $("#nama_mandarin").val(cekdata.nama_mandarin);
                                $("#nama_indonesia").val(cekdata.nama_indonesia);
                                $("#nohp").val(cekdata.nohp);
                                $("#alamat").val(cekdata.alamat);
                                $("input[type='radio'][value="+ cekdata.jenis_kelamin +"]").prop('checked',true);
                                $( "#ttlahir" ).flatpickr({
                                    altInput: true,altFormat: 'F j, Y',dateFormat: 'Y-m-d',
                                    defaultDate: [new Date(cekdata.ttlahir)]
                                 });
                            });
                            $(".save").text("Edit");
                            $("#forminputan input").prop("disabled",true);
                            $("#alamat").prop("disabled",true);

                        }else{
                            func.alerttoast("Informasi anda masih kosong, Harap lengkapi data diri anda !!!", "bg-warning text-black font-bold");
                        }
                    }
                })
            },
            validationinput: function(){
          
                var nm = $("#nama_mandarin");
                var ni = $("#nama_indonesia");
                var nhp = $("#nohp");
                var ttlhr = $("#ttlahir");
                var alamat = $("#alamat");
                var btn = $(".save");
                var jk = $("input[type='radio'][name='jenis']:checked")

                    if(btn.text() == "Edit"){
                        $("#forminputan input").prop("disabled",false);
                        alamat.prop("disabled",false);
                        $(".save").text("Update");
                      
                        
                    }else{
                       if(btn.text() == "Save"){
                            if(nm.val() == "" || ni.val() == "" || nhp.val() == "" || ttlhr.val() == "" || alamat.val() == "" || jk.length == 0 ){
                                func.alerttoast("masih ada inputan kosong", "bg-info text-white font-bold");
                            }else{
                                $("#forminputan input").prop("disabled",true);
                                alamat.prop("disabled",true);
                                func.save();
                               
                            }
                 
                       }else{
                            if(nm.val() == "" || ni.val() == "" || nhp.val() == "" || ttlhr.val() == "" || alamat.val() == "" ){
                                func.alerttoast("masih ada inputan kosong", "bg-info text-white font-bold");
                            }else{
                                $("#forminputan input").prop("disabled",true);
                                alamat.prop("disabled",true);
                                func.update();
                            }

                       }
                        
                    }
                    
            }
        }
        $(".save").on("click",function(){
            func.validationinput()


        });
        
        $(window).on("load",function(){
            var email = $("#email_user").val()
            var urls = url+"/api/Userinformation/cekdata/"+email
            func.cekdata(urls)
            
        });

        // $(".coba").on("click",function(){
        //     var c = $("input[type='radio'][name='jenis']:checked")
        //     if(c.length == 0){
        //         console.log("jenis kelamin tidak terpilih")
        //     }
        // })


    });
    


}