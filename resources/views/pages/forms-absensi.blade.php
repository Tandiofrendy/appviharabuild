<x-app-layout title="Absensi" is-header-blur="true" >
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.absensi.absensijadwal">
       
        <div class="flex flex-col justify-center items-center" >
            <div id="btn-scan" class="flex flex-col items-center justify-center h-screen">
                <h1 class="text-4xl font-bold mb-8">Scan Presensi</h1>
                <button class="scan-button" id="scanButton">
                <svg fill="#000000" width="101px" height="101px" viewBox="0 0 32 32" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="matrix(1,0,0,1,-192,0)"> <g transform="matrix(1.1,0,0,1.1,-19.5,-0.3)"> <path d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z" style="fill:#90e0ef;"></path> </g> <g transform="matrix(1.1,0,0,1.1,-4.5,-0.3)"> <path d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z" style="fill:#90e0ef;"></path> </g> <g transform="matrix(1.1,0,0,1.1,-19.5,14.7)"> <path d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z" style="fill:#90e0ef;"></path> </g> <path d="M207,20C207,19.204 206.684,18.441 206.121,17.879C205.559,17.316 204.796,17 204,17C202.014,17 198.986,17 197,17C196.204,17 195.441,17.316 194.879,17.879C194.316,18.441 194,19.204 194,20C194,21.986 194,25.014 194,27C194,27.796 194.316,28.559 194.879,29.121C195.441,29.684 196.204,30 197,30C198.986,30 202.014,30 204,30C204.796,30 205.559,29.684 206.121,29.121C206.684,28.559 207,27.796 207,27L207,20ZM219,29L219,28C219,28 221,28 221,28C221.552,28 222,27.552 222,27C222,26.448 221.552,26 221,26L218,26C217.448,26 217,26.448 217,27L217,29C217,29.552 217.448,30 218,30C218.552,30 219,29.552 219,29ZM210,27L210,29C210,29.552 210.448,30 211,30L215,30C215.552,30 216,29.552 216,29L216,27C216,26.448 215.552,26 215,26C214.448,26 214,26.448 214,27L214,28L212,28C212,28 212,27 212,27C212,26.448 211.552,26 211,26C210.448,26 210,26.448 210,27ZM205,20L205,27C205,27.265 204.895,27.52 204.707,27.707C204.52,27.895 204.265,28 204,28L197,28C196.735,28 196.48,27.895 196.293,27.707C196.105,27.52 196,27.265 196,27L196,20C196,19.735 196.105,19.48 196.293,19.293C196.48,19.105 196.735,19 197,19L204,19C204.265,19 204.52,19.105 204.707,19.293C204.895,19.48 205,19.735 205,20ZM204,22C204,21.47 203.789,20.961 203.414,20.586C203.039,20.211 202.53,20 202,20C201.129,20 199.871,20 199,20C198.47,20 197.961,20.211 197.586,20.586C197.211,20.961 197,21.47 197,22C197,22.871 197,24.129 197,25C197,25.53 197.211,26.039 197.586,26.414C197.961,26.789 198.47,27 199,27C199.871,27 201.129,27 202,27C202.53,27 203.039,26.789 203.414,26.414C203.789,26.039 204,25.53 204,25L204,22ZM202,22L202,25L199,25L199,22L202,22ZM212,24L212,22C212,21.448 211.552,21 211,21C210.448,21 210,21.448 210,22L210,24C210,24.552 210.448,25 211,25C211.552,25 212,24.552 212,24ZM215,24L215,23C215,23 216,23 216,23C216.552,23 217,22.552 217,22C217,21.448 216.552,21 216,21L214,21C213.448,21 213,21.448 213,22L213,24C213,24.552 213.448,25 214,25C214.552,25 215,24.552 215,24ZM218,25L221,25C221.552,25 222,24.552 222,24L222,22C222,21.448 221.552,21 221,21C220.448,21 220,21.448 220,22L220,23C220,23 218,23 218,23C217.448,23 217,23.448 217,24C217,24.552 217.448,25 218,25ZM221,18L211,18C210.448,18 210,18.448 210,19C210,19.552 210.448,20 211,20L221,20C221.552,20 222,19.552 222,19C222,18.448 221.552,18 221,18ZM207,5C207,4.204 206.684,3.441 206.121,2.879C205.559,2.316 204.796,2 204,2C202.014,2 198.986,2 197,2C196.204,2 195.441,2.316 194.879,2.879C194.316,3.441 194,4.204 194,5C194,6.986 194,10.014 194,12C194,12.796 194.316,13.559 194.879,14.121C195.441,14.684 196.204,15 197,15C198.986,15 202.014,15 204,15C204.796,15 205.559,14.684 206.121,14.121C206.684,13.559 207,12.796 207,12L207,5ZM222,5C222,4.204 221.684,3.441 221.121,2.879C220.559,2.316 219.796,2 219,2C217.014,2 213.986,2 212,2C211.204,2 210.441,2.316 209.879,2.879C209.316,3.441 209,4.204 209,5C209,6.986 209,10.014 209,12C209,12.796 209.316,13.559 209.879,14.121C210.441,14.684 211.204,15 212,15C213.986,15 217.014,15 219,15C219.796,15 220.559,14.684 221.121,14.121C221.684,13.559 222,12.796 222,12L222,5ZM205,5L205,12C205,12.265 204.895,12.52 204.707,12.707C204.52,12.895 204.265,13 204,13L197,13C196.735,13 196.48,12.895 196.293,12.707C196.105,12.52 196,12.265 196,12L196,5C196,4.735 196.105,4.48 196.293,4.293C196.48,4.105 196.735,4 197,4L204,4C204.265,4 204.52,4.105 204.707,4.293C204.895,4.48 205,4.735 205,5ZM220,5L220,12C220,12.265 219.895,12.52 219.707,12.707C219.52,12.895 219.265,13 219,13L212,13C211.735,13 211.48,12.895 211.293,12.707C211.105,12.52 211,12.265 211,12L211,5C211,4.735 211.105,4.48 211.293,4.293C211.48,4.105 211.735,4 212,4L219,4C219.265,4 219.52,4.105 219.707,4.293C219.895,4.48 220,4.735 220,5ZM204,7C204,6.47 203.789,5.961 203.414,5.586C203.039,5.211 202.53,5 202,5C201.129,5 199.871,5 199,5C198.47,5 197.961,5.211 197.586,5.586C197.211,5.961 197,6.47 197,7C197,7.871 197,9.129 197,10C197,10.53 197.211,11.039 197.586,11.414C197.961,11.789 198.47,12 199,12C199.871,12 201.129,12 202,12C202.53,12 203.039,11.789 203.414,11.414C203.789,11.039 204,10.53 204,10L204,7ZM219,7C219,6.47 218.789,5.961 218.414,5.586C218.039,5.211 217.53,5 217,5C216.129,5 214.871,5 214,5C213.47,5 212.961,5.211 212.586,5.586C212.211,5.961 212,6.47 212,7C212,7.871 212,9.129 212,10C212,10.53 212.211,11.039 212.586,11.414C212.961,11.789 213.47,12 214,12C214.871,12 216.129,12 217,12C217.53,12 218.039,11.789 218.414,11.414C218.789,11.039 219,10.53 219,10L219,7ZM202,7L202,10L199,10L199,7L202,7ZM217,7L217,10L214,10L214,7L217,7Z" style="fill:#1990a7;"></path> </g> </g></svg>
                Klik Untuk Scan
                </button>
            </div>
            <div id="hasilpresensi">
            <div class="card mt-20 w-full max-w-xl p-4 sm:p-5">
                      <div class="flex items-center place-content-center  py-4 ">
  
                          <div class="flex-row justify-center  text-center">
                              <img
                              src="{{asset('images/success.png')}}"
                              class="w-28 m-auto"
                              />
                              <p class="text-md font-extrabold " id="tpresensi">
                                
                              </p>
                          </div>
  
                          
                      </div>
                      <p class="text-xl font-medium ">
                                      INFORMASI CHECK-IN
                      </p>
                      <div class=" justify-between sm:flex flex-row" id="datapres">
                              
                      </div>
  
                  </div>
            </div>
            <div class="mt-10 ">
                 <div id="reader" class="flex flex-col items-center justify-center w-72 h-72 " ></div>
            </div>
            <div class=""
                @if(Auth::check()) 
                <input type="hidden" id="email"  value="{{Auth::user()->email}}">
                @endif
            </div>
            
            
            
        </div>
        
    </main>
</x-app-layout>