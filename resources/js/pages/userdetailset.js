export function userdetsettings(){

    $(function(){
        $(window).on("load",function(){
            console.log("hello");
            $('#exportuser').on('click', function() {
                window.location.href = '/Laporanex/exportuser'; // Ganti dengan URL route yang sesuai
            });
        });
    });
   
}