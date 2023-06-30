      <!-- Main content goes here -->
  <section class="about_section">

    <div class="p-4 pt-0 mt-4">
        <div class="a8:grid a8:grid-cols-3 bg-blue-100 0:p-2 a2:p-28 a4:p-9"  data-aos="fade-right">
            <div class="col-span-2 text-slate-800 pt-3 pb-3">
              <div>
                <h2 class="text-bold"><u>Mission</u></h2>
                <p class="mt-4">Ang Filipino E-Taguyod ay isang maka-Filipino at pang-Pilipinong programa na magpapalakas at magtataguyod sa Filipino sa edukasyon. Tuon sa pagbuo, pagpapatupad, pagsubaybay at ebalwasyon ng mga proyekto at gawaing pagpapaunlad ng mga kaalaman at kasanayan sa Filipino sa paglinang pang-Pilipino gaya ngunit hindi limitado sa: (1) pagtuturo at pagkatuto ng Filipino; (2) pagtuturo at pagkatuto ng iba pang asignatura gamit ang Filipino; (3) pananaliksik at pagsasalin sa pagtuturo ng Filipino; at iba pang kaugnay sa gamit at paggamit ng Filipino sa edukasyon.</p>
              </div>

              <div>
                <h2 class="text-bold"><u>Vission</u></h2>
                <p class="mt-4">Ang Filipino E-Taguyod ay isang maka-Filipino at pang-Pilipinong programa na magpapalakas at magtataguyod sa Filipino sa edukasyon. Tuon sa pagbuo, pagpapatupad, pagsubaybay at ebalwasyon ng mga proyekto at gawaing pagpapaunlad ng mga kaalaman at kasanayan sa Filipino sa paglinang pang-Pilipino gaya ngunit hindi limitado sa: (1) pagtuturo at pagkatuto ng Filipino; (2) pagtuturo at pagkatuto ng iba pang asignatura gamit ang Filipino; (3) pananaliksik at pagsasalin sa pagtuturo ng Filipino; at iba pang kaugnay sa gamit at paggamit ng Filipino sa edukasyon.</p>
              </div>
            </div>
            <div class="w-100 overflow-auto h-250 a8:h-100">
                <div class="a9:w-2000 a8:w-100 flex justify-center h-250">
                    <div class="a9:flex a8:block h-250 pb-2">
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="ring-2 ring-black m-2 bg-slate-500 text-white a8:mb-4 mb-5" style="height: 200px; width:200px;">VIDEO HERE</div>
                        <div class="m-2 h-2"></div>
                    </div>
               </div>
            </div>
        </div>
   </div>

    <div class="hidden a10:block p-3 -mt-4 xm1:mt-0 mb-0 xmmm1:m-10 xmmm1:mt-0 a7:mt-9 xmmm1:mb-0">
        <div class=" grid grid-cols-3 a7:flex a7:justify-between">


           <div class="flex justify-center">
                <div class="h-40 w-40">
                    <a href="" class="p-2 object-cover">
                        <img class="ring-4 ring-slate-500 contain  rounded-full object-cover w-full h-full" src="img/photo4.1.jpeg"/> 
                        <div class="flex justify-center">
                            <p class="absolute mt-3">Blogs</p>
                        </div>
                    </a>
                </div>
           </div>

           <div class="flex justify-center">
                <div class="h-40 w-40">
                    <a href="" class="p-2 object-cover">
                        <img class="ring-4 ring-slate-500 contain  rounded-full object-cover w-full h-full" src="img/photo5.1.jpeg"/> 
                        <div class="flex justify-center">
                            <p class="absolute mt-3">Social</p>
                        </div>
                    </a>
                </div>
           </div>



           <div class="flex justify-center">
                <div class="h-40 w-40">
                    <a href="" class="p-2 object-cover">
                        <img class="ring-4 ring-slate-500 contain  rounded-full object-cover w-full h-full" src="img/photo5.1.jpeg"/> 
                        <div class="flex justify-center">
                            <p class="absolute mt-3">Press</p>
                        </div>
                    </a>
                </div>
            </div>

            

        </div>
    </div>
</section>


     

    <script>
        $(document).ready(function() {
            // Set the default video source
            var defaultVideoSrc = 'img/E-TAGUYOD.mp4';
            
            // Set the video source dynamically
            $('#videoPlayer').attr('src', defaultVideoSrc);
            
            // Add 'active' class to the default video item
            $('.playlist .video-item[data-src="' + defaultVideoSrc + '"]').addClass('active');
            
            // When a video item is clicked
            $('.playlist .video-item').on('click', function() {
                // Get the video source from the data attribute
                var videoSrc = $(this).data('src');
                
                // Remove 'active' class from all video items
                $('.playlist .video-item').removeClass('active');
                
                // Add 'active' class to the clicked video item
                $(this).addClass('active');
                
                // Set the video source dynamically
                $('#videoPlayer').attr('src', videoSrc);
                
                // Play the video
                $('#videoPlayer').get(0).play();
                
                // Scroll to the top of the player
                $('html, body').animate({
                scrollTop: $('.player').offset().top
                }, 500);
            });
        });
      </script>