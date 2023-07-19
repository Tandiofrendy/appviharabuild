export function onboardconf(){
    var url = window.location.origin;
    $(window).on("load",function(){
        $("#btn-kegiatan").on("click",function(){
            window.location.href = url + "/layouts/Lihatjadwal";
        });
        $("#btn-diksa").on("click",function(){
            window.location.href = url + "/forms/Daftardiksa";
        });
    });
}