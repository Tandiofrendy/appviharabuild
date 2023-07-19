import Toastify from "toastify-js";

export function  registers(){
   
        var url = window.location.origin;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    
        let func = {
            alerttoast: function(model,contents,text,warna){
                let removeTrigger = null;
                if(model === 1){
                    const options = {
                        node: document.querySelector(contents).content.firstElementChild.cloneNode(true),
                        gravity: "top",
                        className: " html",
                        position:"center",
                        newWindow: true,
                    }
                    const toastify = Toastify(options);
                    toastify.showToast()
                    if (contents == "#custom-html-notif") {
                            removeTrigger = toastify.toastElement.querySelector(
                            "[data-notification-remove]"
                            );
                            if (removeTrigger) {
                            removeTrigger.addEventListener("click", () =>
                                toastify.removeElement(toastify.toastElement)
                            );
                            }
                    }
                }else{
                    const options = {
                        text: text,
                        gravity: "top",
                        className: warna,
                        position : "center"
                    }
                    const toastify = Toastify(options);
                    toastify.showToast();

                }
                

            },  
            createcode: function(){
                var isi = {
                    email : $("#email").val()
                }
                $.ajax({
                    type:"POST",
                    url: url+"/api/Register/getcode",
                    data : isi,
                    success: function(){
                        func.alerttoast(1,'#custom-html-notif');
                    }
                });
            },
            buttoncount: function(){
                var time = 30;
                var seconds = Math.ceil(time);
                var disableElement = $(".getcode");
                var originaltext = "GetCode";

                disableElement.text( seconds );
                disableElement.prop('disabled',true);
                disableElement.removeClass("bg-secondary shadow-secondary/50");
                disableElement.addClass("bg-slate-600 shadow-slate/50");

                var interfal = setInterval(function(){
                    seconds = seconds-1;
                    disableElement.text(seconds);
                    if(seconds === 0 ){
                        disableElement.removeProp('disabled').text(originaltext);
                        disableElement.removeClass("bg-slate-600 shadow-slate/50");
                        disableElement.addClass("bg-secondary shadow-secondary/50");
                        disableElement.prop('disabled',false);
                        clearInterval(interfal);
                    }
                },1000);

            },
            resetinput: function(){
                $(".input")[0].reset()
            },
            regis: function(){
                var formdata ={
                    email : $("#email").val(),
                    name  : $('#name').val(),
                    password: $('#password').val()
                }

                $.ajax({
                    type:"POST",
                    url: url+"/api/Register/simpan",
                    data : formdata,
                    dataType : "json",
                    success: function(formdata){
                        func.alerttoast(2,'',formdata.data,'bg-info text-white');
                        func.createcode();
                        func.buttoncount();
                        func.getcodes();
                    }
                });
            },
            getcodes: function(){
                $(".verifcode").show();
                $(".input").hide();
                func.changebtn();
            },
            changebtn: function(){
                $(".signup").hide();
                $(".verif").show();
            },
            verification: function(){
                var emaildata = $("#email").val();
                var dataup  = {
                    isVerified : 1,
                    token_activation : $("#token_activation").val()
                }
                $.ajax({
                    type:"PUT",
                    url: url+"/api/Register/verifcode/"+emaildata,
                    data : dataup,
                    dataType : "json",
                    success: function(formdata){
                        
                        
                        if(formdata.message == "error"){
                            func.alerttoast(2,'',formdata.data,'bg-info text-white');
                        }else{
                            func.alerttoast(2,'',formdata.data,'bg-info text-white');
                            window.location.href ="/login";
                        }
                    }
                });
            }
         };

        $(".getcode").on("click",function(){
            
            func.createcode();
            func.buttoncount();
 
        });

        $(window).on("load",function(){
            $(".verifcode").hide();
            $(".verif").hide();
            
        });

        $(".verif").on("click",function(){
            func.verification();
        });

        $(".signup").on("click",function(){
            func.regis();
        
        });

}