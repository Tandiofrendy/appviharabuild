export function userdetsettings(){

    $(window).on("load",function(){
        $('#exportuser').on('click', function() {
            window.location.href = '/Laporanex/exportuser'; // Ganti dengan URL route yang sesuai
        });
    });
}