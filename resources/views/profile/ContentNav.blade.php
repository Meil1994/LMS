
<div class="overflow-auto">
    <div id="menu" class="hidden slide w-100 absolute">
        <div class=" a:hidden bg-white w-100 xm1:ml-30 xm1:w-70 a6:w-50 a6:ml-50">

            <div class="border-none h-screen overflow-auto" style="background-color:#033c59;"> 

                <div class="flex justify-end p-4">
                    <button id="close"><i class="fa-solid fa-circle-xmark text-2xl"></i></button>
                </div>

                <div class="flex items-center justify-center pb-2">
                    <img src="{{ asset('img/E-TAGUYOD LOGO.png') }}" class="h-50a" alt="Logo">
                    <h1 class="text-white underline underline-offset-4 text-xl ml-1">E-Taguyod</h1>
                </div>

                <div class="flex a3:hidden justify-evenly mt-10">
                    <a class="flex items-center" href="/eturo">
                        <img src="{{ asset('img/E-TURO.png') }}" class="a3:block h-25a a2:h-30a ring-2 bg-white rounded-full" alt="Logo">
                    </a>

                    <a class="flex items-center" href="/esaliksik">
                        <img src="{{ asset('img/E-SALIKSIK.png') }}" class="a3:block h-25a a2:h-30a ring-2 bg-white rounded-full" alt="Logo">
                    </a>

                    <a class="flex items-center" href="/eglobal">
                        <img src="{{ asset('img/E-GLOBAL.png') }}" class="a3:block h-25a a2:h-30a ring-2 bg-white rounded-full" alt="Logo">
                    </a>

                    <a class="flex items-center" href="/linang">
                        <img src="{{ asset('img/E-LINANG.png') }}" class="a3:block h-25a a2:h-30a ring-2 bg-white rounded-full" alt="Logo">
                    </a>

                    <a class="flex items-center" href="/esalin">
                        <img src="{{ asset('img/E-SALIN.png') }}" class="a3:block h-25a a2:h-30a ring-2 bg-white rounded-full" alt="Logo">
                    </a>
                </div>
            
                <div class="mt-2">
                    <div class="flex justify-center">
                        <div class="text-white m-5 p-5 bg-slate-800 rounded-lg text-center ring-2 a3:w-250">
                            @if (Auth::check() && Auth::user()->logo)
                            <div class="flex justify-center">
                                <img class="rounded-full bg-white h-100a w-100a object-cover ml-1 ring-2 ring-white" src="{{ asset('storage/' . Auth::user()->logo) }}" alt="Logo" class="logo"/>
                            </div>
                            @else
                            
                            <div class="h-100a w-100a bg-white ml-auto mr-auto items-center flex justify-center rounded-full ring-2 ring-white">
                                <i class="fa-solid fa-user text-5xl text-black"></i>
                            </div>
                            @endif
                
                            <p class="text-xl mt-4">{{$user->firstname}}</p>
                            <p class="text-sm mt-2"><i class="fa-solid fa-briefcase"></i> {{$user->user_type}}</p>
                            <p class="text-sm"><i class="fa-solid fa-phone"></i> {{$user->phone_number}}</p>
                        </div>
                    </div>
            
                    <div class="mt-4">
                        <button onclick="window.location.href='/profile'" class="border-none w-100 p-3 text-slate-300 text-lg hover:bg-white hover:text-black"><i class="fa-solid fa-user"></i> Account Info</button>
                        <button onclick="window.location.href='/personal'" class="border-none w-100 p-3 text-slate-300 text-lg hover:bg-white hover:text-black"><i class="fa-sharp fa-solid fa-file-invoice"></i> Personal Info</button>
                        <button onclick="window.location.href='/modules'" class="border-none w-100 p-3 text-slate-300 text-lg hover:bg-white hover:text-black"><i class="fa-solid fa-book"></i> Modules</button>
                        <button onclick="window.location.href='/notes'" class="border-none w-100 p-3 text-slate-300 text-lg hover:bg-white hover:text-black"><i class="fa-sharp fa-solid fa-clipboard"></i> My Notes</button>
                        <form class="flex justify-center mt-6 mb-10" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="bg-a p-2 pl-10 pr-10 text-white hover:bg-b border-4 border-white hover:border-4 hover:border-white hover:text-red-600"><i class="fa-solid fa-right-from-bracket text-lg"></i> <span class="text-lg ml-1">Logout</span></button>
                        </form>
                    </div>
                </div>
               
            </div>

        </div>

    </div>

    <div class="p-5 pb-0">
        
        <div class="flex justify-between mb-2">

            <a class="flex a3:hidden items-center" href="/">
                <img src="{{ asset('img/E-TAGUYOD LOGO.png') }}" class="h-50a a:hidden" alt="Logo">
                <img src="{{ asset('img/E-TAGUYOD BLACK.png') }}" class="hidden a:block h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Taguyod</p>
            </a>

            <a class="flex items-center ml-1" href="/eturo">
                <img src="{{ asset('img/E-TURO.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Turo</p>
            </a>

            <a class="flex items-center ml-1" href="/esaliksik">
                <img src="{{ asset('img/E-SALIKSIK.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Saliksik</p>
            </a>

            <a class="flex items-center ml-1" href="/eglobal">
                <img src="{{ asset('img/E-GLOBAL.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Global</p>
            </a>

            <a class="hidden a3:flex items-center" href="/">
                <img src="{{ asset('img/E-TAGUYOD LOGO.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Taguyod</p>
            </a>

            <a class="flex items-center ml-1" href="/linang">
                <img src="{{ asset('img/E-LINANG.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Linang</p>
            </a>

            <a class="flex items-center ml-1" href="/esalin">
                <img src="{{ asset('img/E-SALIN.png') }}" class="hidden a3:block h-25a a2:h-30a" alt="Logo">
                <p class="hidden a2:block text-sm">E-Salin</p>
            </a>

            <div class="items-center flex">
                <div class="h-40a w-40a a:hidden bg-slate-200 items-center flex justify-center rounded-full ml-1">
                    @if (Auth::check() && Auth::user()->logo)
                    <img class="rounded-full object-cover h-40a w-40a" src="{{ asset('storage/' . Auth::user()->logo) }}" alt="Logo" class="logo"/>
                    @else   
                    <i class="fa-solid fa-user text-black"></i>  
                    @endif 
                </div>

                <div class="a:hidden ml-4 flex items-center">
                    <button id="burger" class="p-1 pb-0 border border-slate-500 rounded-md"><i class="fa-solid fa-bars text-lg"></i></button>
                </div>
            </div>

        </div>

        <hr class="h-1 bg-slate-200"/>

        
    </div>
   
</div>
