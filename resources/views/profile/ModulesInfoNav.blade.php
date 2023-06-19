<div class="h-screen border-none overflow-auto" style="background-color:#033c59;">
    <div class="flex items-center justify-center pt-10 pb-2">
        <img src="img/E-TAGUYOD LOGO.png" class="h-50a"/>
        <h1 class="text-white underline underline-offset-4 text-xl ml-1">E-Taguyod</h1>
    </div>

    <div class="mt-10">
        <div class="text-white m-5 mb-0 md2:m-10 md2:mb-1 p-5 bg-slate-800 rounded-lg text-center ring-2">
            
            @if (Auth::check() && Auth::user()->logo)
            <div class="flex justify-center">
                <img class="rounded-full bg-white h-100a w-100a object-cover ml-1 ring-2 ring-white" src="{{ asset('storage/' . Auth::user()->logo) }}" alt="Logo" class="logo"/>
            </div>
            @else
            
            <div class="h-100a w-100a bg-white ml-auto mr-auto items-center flex justify-center rounded-full ring-2 ring-white">
                <i class="fa-solid fa-user text-5xl text-black"></i>
            </div>
            @endif

            <p class="text-xl mt-10">{{$user->firstname}}</p>
            <p class="text-13 mt-1"><i class="fa-solid fa-briefcase"></i> {{$user->user_type}}</p>
            <p class="text-13 mt-1"><i class="fa-solid fa-phone"></i> {{$user->phone_number}}</p>
        </div>

        <div class="bg-white">
            <div class="bg-a h-10"></div>
            <button onclick="window.location.href='/profile'" class="w-100 bg-a p-3 text-slate-300 text-lg hover:text-slate-400"><i class="fa-solid fa-user"></i> Account Info</button>
            <button onclick="window.location.href='/personal'" class="w-100 bg-a rounded-br-3xl p-3 text-slate-300 text-lg hover:text-slate-400" style="border:1px solid #033c59;"><i class="fa-sharp fa-solid fa-file-invoice"></i> Personal Info</button>
            <button onclick="window.location.href='/modules'" class=" w-100 p-3 text-lg bg-white text-black"><i class="fa-solid fa-book"></i> My Modules</button>
            <button onclick="window.location.href='/notes'" class="bg-a w-100 rounded-tr-3xl p-3 text-slate-300 text-lg hover:text-slate-400" style="border:1px solid #033c59;"><i class="fa-sharp fa-solid fa-clipboard"></i> My Notes</button>
        

            <form class="flex justify-center pt-20 mb-10 bg-a" method="POST" action="/logout">
                @csrf
                <button type="submit" class="bg-a p-2 pl-10 pr-10 text-white hover:bg-b border-4 border-white hover:border-4 hover:border-white hover:text-red-600"><i class="fa-solid fa-right-from-bracket text-lg"></i> <span class="text-lg ml-1">Logout</span></button>
            </form>

        </div>
    </div>


</div>