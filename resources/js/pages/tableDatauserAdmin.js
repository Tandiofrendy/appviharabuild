import Toastify from "toastify-js";
import TomSelect from "tom-select";
export function datauseradmin(){
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        var url = window.location.origin;

        let func = {
            alertdiag: function(titles,contents,data,id,i){
                $.confirm({
                    title: titles,
                    content: contents,
                    type: 'blue',
                    typeAnimated: true,
                    useBootstrap: false,
                    boxWidth: '30%',
                    buttons: {
                        tryAgain: {
                            text: 'Ya!',
                            btnClass: 'btn-blue',
                            action: function(){
                                func.updateajx(data,id)
                            }
                        },
                        close:{
                            text : 'No',
                            action: function () {
                               if(id == 1){
                                 $("#status"+i).prop("checked",false);
                                 
                               }else{
                                $("#status"+i).prop("checked",true);
                               }
                            }
                        } 
                    }
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
                $('#emails').empty();
            },
            loadajx: function(){
                $.ajax({
                    type:"GET",
                    url :url+"/api/Roleadmin/View",
                    dataType:'json',
                    success: function(isi){
                        let data = isi.data;
                        $("#datatable").empty();
                        $.each(data,function(i,data){
                            $("#datatable").append(`
                            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"  >
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5" >`+ data.id +`</td>
                            <td class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 dark:text-navy-100 lg:px-5"  >`+ data.name +`</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5" >`+ data.nama_divisi +`</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            <div
                                class="badge rounded-full"
                                id="roleclass`+ i +`"
                            >
                             `+ data.role +`
                            </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <label class="inline-flex items-center">
                                    <input
                                    class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                                    type="checkbox"
                                    id="status`+ i +`"
                                    />
                                </label>
                            </td>
                            <td class="whitespace-nowrap rounded-r-lg px-4 py-3 sm:px-5">
                            <div class="flex justify-center space-x-2">
                                <button value="`+ data.id + ` "   class="btn datahp`+ i +` h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25" id="`+ i +`" name="hapus">
                                    <i class="fa fa-trash-alt hapus"  id="`+ i +`" ></i>
                                </button>
                            </div>
                            </td>
                        </tr>
                            `);
                            var isii= i;
                            if(data.role == "Admin"){
                                $("#roleclass"+i).removeClass("bg-info/10 text-info dark:bg-info/15");
                                $("#roleclass"+i).addClass("bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light");
                            }else{
                                $("#roleclass"+i).removeClass("bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light");
                                $("#roleclass"+i).addClass("bg-info/10 text-info dark:bg-info/15");
                                
                            }
                            if(data.status === 0){
                                $("#status"+i).prop("checked",false);
                            }else{
                                $("#status"+i).prop("checked",true);
                            }
                            $("#status"+i).on("change",function(){
  
                                $("#status"+i).prop("checked",function(ii,value){
                                    if(value == true){       
                                        func.alertdiag('Status admin/sub-admin akan diaktifkan yakin ?','Harap periksa kembali data sebelum mengaktifkan role!',data.id,1,isii);    
                                    }else{
                                        func.alertdiag('Status admin/sub-admin akan di-nonaktifkan yakin ??','Anda dapat mengaktifkan kembali pada tombol status!',data.id,0,isii)
                                    }
                                })
                            })
                        })
                        
                        
                        
                    }
                })
            },
            saveajx: function(){
                var formdata = {
                    email : $("#email").val(),
                    kode_divisi : $("#divisi").val(),
                    role : $("#role").val()
                }

                $.ajax({
                    type: "POST",
                    url : url+"/api/Roleadmin/simpan",
                    data:formdata,
                    dataType: "json",
                    success:function(data){
                        func.resetinput();
                        func.loadajx();
                        func.alerttoast(data.data,"bg-success text-white font-semibold")
                    }
                })
            },
            deleteajx: function(id){
                $.ajax({
                    type:"DELETE",
                    url : url+"/api/Roleadmin/delete/"+id,
                    dataType:"json",
                    success: function(data){
                        func.loadajx();
                        func.alerttoast(data.data,"bg-warning text-white font-semibold");
                    }
                })
            },
            updateajx: function(id,status){
                var dataf = {
                    status : status
                }
                $.ajax({
                    type :"PUT",
                    url  : url+"/api/Roleadmin/update/"+id,
                    data : dataf,
                    dataType:"json",
                    success : function(){
                        func.loadajx();
                        if(status == 1){
                            func.alerttoast("Status admin/sub-admin telah di-aktifkan","bg-warning text-white font-semibold");
                        }else{
                            func.alerttoast("Status admin/sub-admin telah di-nonaktifkan","bg-warning text-white font-semibold");
                        }
                    }
                })
            }

        }

        $("#save").on("click",function(){
            func.saveajx();

        });

        $("#datatable").on("click",function(e){
           
            if(e.target.className == 'fa fa-trash-alt hapus' || e.target.name == 'hapus'){
                var idhapus = $(".datahp"+e.target.id).val();
    
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
                                func.deleteajx(idhapus);
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
        })
        $(window).on("load",function(){
            func.loadajx();
        })


    })
}