import { each } from "lodash";
import Toastify from "toastify-js";
export function regisadmin(){
    $(function(){
        var url = window.location.origin;
        let currentPage = 1;
        let func= { 
            alerttoast: function(text,warna){
                Toastify({
                    text: text,
                    gravity: "top",
                    className: warna,
                  }).showToast();
            },
            save : function(){
                var datas = {
                    name : $("#name").val(),
                    email : $("#email").val(),
                    password : $("#password").val()
                }
                $.ajax({
                    type : "POST",
                    url  : url + "/api/Useradmin/Simpan",
                    data : datas,
                    dataType : "json",
                    success : function(datas){
                       if(datas.data === "Terdeteksi email atau username telah digunakan atau password terlalu lemah,cek lagi inputan!!" ){
                        func.alerttoast(datas.data,"bg-warning text-white");
                       }else{
                        func.alerttoast(datas.data,"bg-success text-white");
                        $("#name").val("");
                        $("#email").val("");
                        $("#password").val("");
                        func.view(1);
                        }
                       
                       
                    }
                });
            },
            view : function(page){
                currentPage = page;
                $.ajax({
                    type : "POST",
                    url  : url + "/api/Useradmin/view?page=" + page,
                    dataType : "json",
                    success : function(datass){
                        let isi = datass.data.data
                        let currentpage = datass.data.current_page;
                        let lastpage = datass.data.last_page;
                        $("tbody").empty();
                        var pagination = func.generatepagination(currentpage,lastpage);
                        $.each(isi,function(i,isidt){

                            var rolecolor = ""
                            if(isidt.role === "Admin"){
                                rolecolor = "bg-primary  text-white"
                            }else{
                                rolecolor = "bg-green-500   text-black"
                            }
                            $("#datausertf").append(`
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td
                                        class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 dark:text-navy-100 lg:px-5"
                                        >
                                         `+isidt.email+`</td>
                                        <td
                                        class="whitespace-nowrap px-4 py-3 sm:px-5"
                                        >`+isidt.name+`</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div
                                            class="badge `+rolecolor+` rounded-full"
                                        >
                                        `+isidt.role+`
                                        </div>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div
                                            x-data="usePopper({placement:'bottom-end',offset:4})"
                                            @click.outside="if(isShowPopper) isShowPopper = false"
                                            class="inline-flex"
                                        >
                                            <button
                                            x-ref="popperRef"
                                            @click="isShowPopper = !isShowPopper"
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                            >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5"
                                                fill="none"
                                                viewbox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                                />
                                            </svg>
                                            </button>

                                            <div
                                            x-ref="popperRoot"
                                            class="popper-root"
                                            :class="isShowPopper && 'show'"
                                            >
                                            <div
                                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                                            >
                                                <ul>
                                                <li>
                                                    <a
                                                    href="#"
                                                   
                                                    class="flex h-8 items-center text-red-400 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    id="hapus`+i+`"
                                                    >Hapus Users</a
                                                    >
                                                </li>
                                                </ul>
                                            </div>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                            `);
                            $("#hapus" + i).on("click",function(){
                                func.deleteajax(isidt.id);
                            });
                        });
                        $("#pagination").html(pagination);
                        $("#next-page").on("click",function(){
                            func.view(currentpage +1 );
                        });
                        $("#prev-page").on("click",function(){
                            func.view(currentpage -1 );
                        });
                       
                    }
                });
            },
            generatepagination: function(curpage,lastpage){

                var html = '<div class="flex items-centerspace-x-2 text-xs+"></div>';
                html += `<ol class="pagination">`;
                if(curpage > 1){
                    html += `
                    <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                        <a
                          href="#"
                          data-page="`+(curpage-1)+`"
                          class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                          id="prev-page"
                          >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewbox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 19l-7-7 7-7"
                            />
                          </svg>
                        </a>
                      </li>
                    `;
                }
                
                var active = 'rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90';
                var nonactive = 'rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90';

                for(var i= 1 ; i <= lastpage; i++){
                    html += `
                    <li class="bg-slate-150 dark:bg-navy-500">
                        <a
                          href="#"
                          data-page="`+i+`"
                          class="flex h-8 min-w-[2rem] items-center justify-center `+ (i === curpage ? active : nonactive)+`"
                          >`+i+`</a
                        >
                      </li>
                    `;
                }

                if(curpage < lastpage){
                    html += `
                    <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                        <a
                          href="#"
                          data-page="`+ (curpage + 1)+`"
                          class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                          id="next-page"
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
                              d="M9 5l7 7-7 7"
                            />
                          </svg>
                        </a>
                      </li>
                    `;
                }
                html += `</ol>`;
                html += '<div class="text-xs+">' + curpage +'-'+lastpage +' of 10 entries</div>';

                return html;
            },
            deleteajax : function(id){
                $.ajax({
                    type:"DELETE",
                    url: url+"/api/Useradmin/delete/"+id,
                    success:function(data){
                        func.view(1);
                        func.alerttoast(data.data,"bg-success");
                    }
                })
            }
        }

        $("#simpan").on("click",function(){
            func.save();
        });

        $(window).on("load",function(){
            func.view(1);
           
        });
    });
}