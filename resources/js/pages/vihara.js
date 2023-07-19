import Toastify from "toastify-js";
export function Viharaconf(){
    var url = window.location.origin;
    let func = {
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        resetinput: function(){
            $(".tabinputs")[0].reset()
        },
        viewajax: function(){
            $.ajax({
                type:"GET",
                url :  url+"/api/Vihara/View",
                dataType: "json",
                success: function(isi){
                    let data = isi.data;
                    $("#dataajax").empty();
                    $.each(data,function(i,data){
                        $("#dataajax").append(`
                        <tr class="border .isitr border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap  rounded-l-lg px-4 py-3 sm:px-5">`+ data.kode_vihara +`</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.nama_vihara +`</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.alamat+`</td>
                            <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                                <div class="flex justify-center space-x-2">
                                    <button value="`+ data.kode_vihara + ` "  class="btn dataedit`+ i +`  h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25" id="`+ i +`" name="edit">
                                    
                                        <i class="fa fa-edit edit"  id="`+ i +`" ></i>
                                    </button>
                                    <button value="`+ data.kode_vihara + ` "   class="btn datahp`+ i +` h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25" id="`+ i +`" name="hapus">
                                        
                                        <i class="fa fa-trash-alt hapus"  id="`+ i +`" ></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        `);
                    });
                }
            })
        },
        saveajax: function(){
            var formdata = {
                kode_vihara : $("#kodevihara").val(),
                nama_vihara : $("#namavihara").val(),
                alamat      : $("#alamat").val()
            }

            $.ajax({
                type:"POST",
                url : url+"/api/Vihara/simpan",
                data : formdata,
                dataType :"json",
                success : function(data){
                    if(data.data == "Data Berhasil diinput"){
                        func.viewajax();
                        func.resetinput();
                        func.alerttoast(data.data,"bg-success");
                    }else{
                        func.alerttoast(data.data,"bg-warning");
                    }
                },
                error : function(data){
                    func.alerttoast("Data inputan masih ada yang kosong","bg-error");
                }
            });
        },
        cekedit: function(iddata){
            var urlcek = url+"/api/Vihara/cekedit/"+iddata;
            $.ajax({ 
                type: "POST",
                url : urlcek,
                dataType: "json",
                success: function(data){
                   if(data.data == ""){
                    var urledt = url+"/api/Vihara/edit/"+iddata;
                    func.editajax(urledt);
                   }else{
                    $.confirm({
                        title: 'Data ditemukan pada table lain yakin di ubah ?',
                        content: data.data,
                        type: 'blue',
                        typeAnimated: true,
                        useBootstrap: false,
                        boxWidth: '30%',
                        buttons: {
                            tryAgain: {
                                text: 'Ya!',
                                btnClass: 'btn-blue',
                                action: function(){
                                    var urledt = url+"/api/Vihara/edit/"+iddata;
                                    func.editajax(urledt);
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
                }

            })
        },
        editajax: function(urls){
            $.ajax({
                type: "POST",
                url : urls,
                dataType: "json",
                success: function(isi){
                    let data = isi.data;

                    $.each(data,function(i,edit){
                        $("#kodevihara").val(edit.kode_vihara);
                        $("#namavihara").val(edit.nama_vihara);
                        $("#alamat").val(edit.alamat);
                        $("#kodevihara").prop('disabled', true);
                        $(".savespn").text("Update");
                    });
                }
            })
        },
        updateajax: function(){
            var formdata = {
                kode_vihara : $("#kodevihara").val(),
                nama_vihara : $("#namavihara").val(),
                alamat      : $("#alamat").val()
            }

            $.ajax({
                type:"PUT",
                url: url+"/api/Vihara/update",
                data: formdata,
                dataType: "json",
                success: function(data){
                    func.viewajax();
                    func.alerttoast(data.data,"bg-success text-white");
                    $(".savespn").text("Save");
                    $("#kodevihara").prop('disabled',false);
                    func.resetinput();
                }
        
            });
        },
        deleteajax: function(urls){
            $.ajax({
                type:"DELETE",
                url: urls,
                success:function(data){
                    func.viewajax();
                    func.alerttoast(data.data,"bg-warning");
                }
            })
        },
        validateaction: function(){
            var btn = $('.savespn');
            var formdata ={
                kode_vihara : $("#kodevihara").val(),
                nama_vihara : $("#namavihara").val(),
                alamat      : $("#alamat").val()
            }

            if(formdata.kode_vihara == "" || formdata.nama_vihara == ""){
                func.alerttoast("Masih ada inputan kosong","bg-warning text-semibold text-black")
            }else{
                if(btn.text()=="Save"){
                    func.saveajax();
                }else{
                    func.updateajax();
                }
            }
            
            
        }

    }

    $(".save").on("click",function(){
        func.validateaction();
    })

    $(window).on("load",function(){
        func.viewajax();
    })

    $("#dataajax").on("click",function(e){
        if(e.target.className == 'fa fa-edit edit' || e.target.name == 'edit'){
            var idedit = $(".dataedit"+e.target.id).val();
            func.cekedit(idedit);
        }

        if(e.target.className == 'fa fa-trash-alt hapus' || e.target.name == 'hapus'){
            var idhapus = $(".datahp"+e.target.id).val();
            var urlhpus = url+"/api/Vihara/delete/"+idhapus;

            func.deleteajax(urlhpus);
        }
    })
}