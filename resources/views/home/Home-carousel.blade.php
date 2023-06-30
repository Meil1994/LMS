<style>
  .bg-1{
  background-image: url('img/carouselTop.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  }

  .bg-2{
  background-image: url('img/carousel2nd.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  }

  .bg-3{
  background-image: url('img/etaguyod-1.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  
  }

  .bg-4{
  background-image: url('img/carousel3top.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  
  }

</style>



<div class="pt-4 pb-2 mt-6">
  <div id="default-carousel" class="relative mb-10 h-250 w-full sm1:h-300 sm1:w-full md1:h-400 md1:w-full xmmm:h-500 xmmm:w-full xmmm1:h-600  ml-auto mr-auto" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden h-full">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="bg-1 absolute block h-full w-full   -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div  class="bg-2 absolute block h-full w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div  class="bg-3 absolute block h-full w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <div  class="bg-4 absolute block h-full w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
      </div>
      
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 mt-0 rounded-lg left-1/2 pt-2 pb-2 p-4">
        <div class="bg-zinc-500 w-4 h-4 flex justify-center items-center rounded-full">
          <button type="button" class="w-3 h-3 rounded-full bg-slate-900" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        </div>
        <div class="bg-zinc-500 w-4 h-4 flex justify-center items-center rounded-full">
          <button type="button" class="w-3 h-3 rounded-full bg-slate-900" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        </div>
        <div class="bg-zinc-500 w-4 h-4 flex justify-center items-center rounded-full">
          <button type="button" class="w-3 h-3 rounded-full bg-slate-900" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <div class="bg-zinc-500 w-4 h-4 flex justify-center items-center rounded-full">
          <button type="button" class="w-3 h-3 rounded-full bg-slate-900" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class=" inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10  dark:bg-gray-800/30    group-focus:outline-none">
            <svg aria-hidden="true" class="hover:bg-slate-500 bg-slate-500/50 w-10 h-10 p-2 rounded-full text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class=" inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 dark:bg-gray-800/30  group-focus:outline-none">
            <svg aria-hidden="true" class="hover:bg-slate-500 bg-slate-500/50 w-10 h-10 p-2 rounded-full text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
  </div>
</div>
