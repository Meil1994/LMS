
<div class="bg-white" style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
  <x-alert-script/>
  <div class="p-2">
    <div class="flex justify-content-between"  id="nav">
      <div>
        <div class="grid grid-cols-1 md3:grid-cols-12">
  
          <div class="col-span-1 md3:col-span-1 grid xm1:grid-cols-2 md3:grid-cols-1">
            <a href="/" class="flex items-center justify-center" style="height:100px; width:120px;">
              <img style="height:100px; width:120px;" src="img/E-TAGUYOD LOGO.png" class="d-block" alt="...">
            </a>

          </div>
  
          
          <div class="hidden md3:block md3:col-span-10">
            <h1 style="color:darkblue; margin-left:2vh; margin-top:2vh; font-size: clamp(1.2em,1.5vw,2em); font-weight:bold;" class="text-center"><span class="text-3xl text-black">Kawanihan ng Linangan sa Pagkatuto</span> <br/> <span class="text-md">Sangay ng Pagtuturo at Pagkatuto</span></h1>
            
            <ul class="flex justify-evenly mt-4">
              <li class="nav-item"><a class="flex no-underline" href="/"> <img class="h-5 w-5" src="img/E-TAGUYOD BLACK.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Taguyod</span></a></li>
              <li class="nav-item"><a class="flex no-underline" href="/eturo"> <img class="h-5 w-5" src="img/E-TURO.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Turo</span></a></li>
              <li class="nav-item"><a class="flex no-underline" href="/esaliksik"> <img class="h-5 w-5" src="img/E-SALIKSIK.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Saliksik</span></a></li>
              <li class="nav-item"><a class="flex no-underline" href="/eglobal"> <img class="h-5 w-5" src="img/E-GLOBAL.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Global</span></a></li>
              <li class="nav-item"><a class="flex no-underline" href="/linang"> <img class="h-5 w-5" src="img/E-LINANG.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Linang</span></a></li>
              <li class="nav-item"><a class="flex no-underline" href="/esalin"> <img class="h-5 w-5" src="img/E-SALIN.png" alt=""/> <span class="text-black text-sm ml-2a"> E-Salin</span> </a></li>
              @auth
              <li class="nav-item flex"><a class="flex no-underline" href="/profile"><i class="fa-regular fa-user text-black"></i><span class="text-black text-sm ml-2a"> Profile</span></a></li>
              <li class="nav-item flex">
                <form class="inline" method="POST" action="/logout">
                  @csrf
                  <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
              </li>
              @else
              <li class="nav-item flex"><a class="flex no-underline" href="/signin"><i class="fa-solid fa-right-to-bracket text-sm text-black"></i><span class="text-black text-sm ml-2a"> Mag Sign-in</span></a></li>
              <li class="nav-item flex"><a class="flex no-underline" href="/signup"><i class="fa-solid fa-user-pen text-sm text-black"></i><span class="text-black text-sm ml-2a"> Mag Sign-up</span></a></li>
              @endauth
            </ul>
            
          </div>
          
  
        </div>    
      </div>
  
      <nav class="text-black text-sm navbar d-flex d-lg-none navbar-expand-lg justify-content-end">
        <div>
          <div class="md3:hidden">
            <button class="navbar-toggler d-flex justify-content-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon d-flex"></span>
            </button>
          </div>
          <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigations</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end">
  
                <li>
                  <a class="text-black flex items-center no-underline" href="/">
                    <img class="h-8 w-8" src="img/E-TAGUYOD BLACK.png" alt="" >
                    <span class="text-md ml-1">E-Taguyod</span>
                  </a>
                </li>
  
                <li class="mt-2">
                  <a class="text-black flex items-center no-underline" href="/eturo">
                    <img class="h-8 w-8" src="img/E-TURO.png" alt="" >
                    <span class="text-md ml-1">E-Turo</span>
                  </a>
                </li>
  
                <li class="mt-2">
                  <a class="text-black flex items-center no-underline" href="/esaliksik">
                    <img class="h-8 w-8" src="img/E-SALIKSIK.png" alt="" >
                    <span class="text-md ml-1">E-Saliksik</span>
                  </a>
                </li>
  
                <li class="mt-2">
                  <a class="text-black flex items-center no-underline" href="/eglobal">
                    <img class="h-8 w-8" src="img/E-GLOBAL.png" alt="" >
                    <span class="text-md ml-1">E-Global</span>
                  </a>
                </li>
  
                <li class="mt-2">
                  <a class="text-black flex items-center no-underline" href="/linang">
                    <img class="h-8 w-8" src="img/E-LINANG.png" alt="" >
                    <span class="text-md ml-1">E-Linangl</span>
                  </a>
                </li>
  
                <li class="mt-2">
                  <a class="text-black flex items-center no-underline" href="/esalin">
                    <img class="h-8 w-8" src="img/E-SALIN.png" alt="" >
                    <span class="text-md ml-1">E-Salin</span>
                  </a>
                </li>
  
                
                @auth
                <li class="nav-item d-xl-flex ml-2"><a class="nav-link align-items-center d-flex text-black" href="/profile"><i class="fa-solid fa-user-pen text-lg"></i><span class="text-md ml-1">Profile</span></a></li>
                <li class="nav-item d-xl-flex">
                  <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class=" ml-2"><i class="fa-solid fa-right-from-bracket text-lg"></i> <span class="text-md ml-1">Logout</span></button>
                  </form>
                </li>
                @else
                <li class="nav-item d-xl-flex ml-2"><a class="nav-link align-items-center d-flex text-black" href="/signin"><i class="fa-solid fa-right-to-bracket text-lg"></i><span class="text-md ml-1">Mag Sign-In</span></a></li>
                <li class="nav-item d-xl-flex ml-2"><a class="nav-link align-items-center d-flex text-black" href="/signup"><i class="fa-solid fa-user-pen text-lg"></i><span class="text-md ml-1">Mag Sign-Up</span></a></li>
                @endauth
              </ul>
            </div>
          </div>
        </div>
      </nav>
  
    </div>
  </div>
</div>
<div class="h-140"></div>