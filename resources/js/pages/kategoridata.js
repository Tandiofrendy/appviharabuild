import Toastify from "toastify-js";
export function kategori(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    var url = window.location.origin;
    let func = {
        dialogalert:function(textd){
            $.dialog({
                useBootstrap: false,
                boxWidth: '20%',
                icon: 'fa fa-warning',
                title: 'Error!!!',
                content: textd,
            });
        },
        alerttoast: function(text,warna){
            Toastify({
                text: text,
                gravity: "top",
                className: warna,
              }).showToast();
        },
        resetinput: function(){
            $(".tabinput")[0].reset()
        },
        loadajax: function(){
            $.ajax({
                type:"GET",
                url : url+"/api/kategori/viewdata",
                dataType: 'json',
                success: function(isi){
                    let data = isi.data
                    $("#getdatajax").empty()
                    $.each(data, function(i,data){
                        
                        $("#getdatajax").append(`
                            <tr class="border .isitr border-transparent border-b-slate-200 dark:border-b-navy-500">
                                <td class="whitespace-nowrap  rounded-l-lg px-4 py-3 sm:px-5">`+ data.kodekategori +`</td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">`+ data.namakategori +`</td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ` + data.keterangan +`
                                </td>
                                <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                                <div class="flex justify-center space-x-2">
                                    <button value="`+ data.kodekategori + ` "  class="btn dataedit`+ i +`  h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25" id="`+ i +`" name="edit">
                                     
                                        <i class="fa fa-edit edit"  id="`+ i +`" ></i>
                                    </button>
                                    <button value="`+ data.kodekategori + ` "   class="btn datahp`+ i +` h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25" id="`+ i +`" name="hapus">
                                        
                                        <i class="fa fa-trash-alt hapus"  id="`+ i +`" ></i>
                                    </button>
                                </div>
                                </td>
                            </tr>
                        `)
                    })
                }
            });
        },
        validateinput : function(){
            $("#kodekategori").on('input',function(){
                var kode = $("#kodekategori").val();
                kode = kode.replace(/[^A-Za-z0-9]/g, '');
                // Mengatur format menjadi AA-001
                if (kode.length > 2) {
                    kode = kode.slice(0, 2) + '-' + kode.slice(2);
                }
                // Mengatur maksimal panjang input menjadi 6 karakter
                if (kode.length > 6) {
                    kode = kode.slice(0, 6);
                }
            
                $(this).val(kode );
            });
        }
        ,
        saveajax: function(){
        var kode = $("#kodekategori").val();
        var nama = $("#namakategori").val();
        var keterangan = $("#keterangan").val();
        var aturankode = /^[A-Z]{2}-\d{3}$/;
        if (kode === "" && aturankode.test(kode)) {
            func.dialogalert('Data inputan masih kosong atau terdapat kode yang sama !!');
        }else if (nama === ""){
            func.dialogalert('Data inputan masih kosong atau terdapat kode yang sama !!');
        }else if(keterangan ===""){
            func.dialogalert('Data inputan masih kosong atau terdapat kode yang sama !!');
        }else{
            var formdata ={
                kodekategori : $("#kodekategori").val(),
                namakategori : $("#namakategori").val(),
                keterangan   : $("#keterangan").val()
            }
            $.ajax({
                type:"POST",
                url: url+"/api/kategori/simpan",
                data : formdata,
                dataType: 'json',
                success : function(data){
                    func.alerttoast(data.data,"bg-success");
                    func.loadajax();
                    func.resetinput();
                }
            })
        }
        },
        hapusajax: function(url){
            $.ajax({
                type:"DELETE",
                url : url,
                success : function(data){
                    func.alerttoast(data.data,"bg-warning");
                    func.loadajax();

                },
                error : function(data){
                    console.log('Error',data)
                }
            })
        },
        editajax: function(url){
             $.ajax({
                type:"POST",
                url : url,
                dataType:'json',
                success:  function(isi){
                    let isiedit = isi.data
                    $.each(isiedit,function(i,edit){
                        $("#kodekategori").val(edit.kodekategori);
                        $("#namakategori").val(edit.namakategori);
                        $("#keterangan").val(edit.keterangan);
                        $("#kodekategori").prop('disabled', true);
                        
                    })
                },
                error: function(){
                    func.dialogalert('Terdapat Error internal');
                }
            })
        },
        updateajax: function(kodekt){
            var formdata ={
                kodekategori : $("#kodekategori").val(),
                namakategori : $("#namakategori").val(),
                keterangan   : $("#keterangan").val()
            }
            $.ajax({
                type:"PUT",
                url : url+"/api/kategori/update/"+kodekt,
                data : formdata,
                dataType: 'json',
                success : function(data){
                    func.loadajax();
                    func.alerttoast(data.data,"bg-secondary text-white");
                    func.resetupdate();
                },
                error: function(){
                    func.dialogalert('Terdapat Error internal');
                }
            })
        },
        resetupdate: function(){
            func.resetinput();
            $("#kodekategori").prop('disabled', false);
            if($(".btn").hasClass("save")){
                $(".savespn").text("Save");
            }
        }
    }


    $(window).on("load",function(){
        func.validateinput();
    });

    $("#getdatajax").on("click",function(e){
        if(e.target.className == 'fa fa-trash-alt hapus' || e.target.name == 'hapus'){
            var idhapus = $(".datahp"+e.target.id).val();
            var urlhapus = url+"/api/kategori/delete/" + idhapus
            
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
                            func.hapusajax(urlhapus);
                            func.resetupdate();
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
        if(e.target.className == 'fa fa-edit edit' || e.target.name == 'edit'){
            var idedit = $(".dataedit"+e.target.id).val();
            var urledit = url+"/api/kategori/edit/" + idedit
            func.editajax(urledit);

            if($(".btn").hasClass("save")){
               $(".savespn").text("Update");
            }
        }
    })

    $(".save").on("click",function(){

        if($(".savespn").text() == "Save"){
            func.saveajax();
        }else{
            var getid =  $("#kodekategori").val();
            func.updateajax(getid);
        }
    })
    func.loadajax()



   
}