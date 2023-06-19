@extends('profile.Layout')

@section('content')

<div class="a:grid a:grid-cols-4 divide-x">
    <div class="a:col-span-1 hidden a:block h-screen overflow-auto">
        @include('profile.AccountInfoNav') 
    </div>
    <div class="a:col-span-3 border-none h-screen overflow-auto">

        <div class="bg-white" style="  position: -webkit-sticky; position: sticky; top: 0;">
            <x-alert-script/>
            @include('profile.ContentNav')
        </div>
        
        <div class="p-2 m-10 mt-8 a4:w-80 xmmm:w-400 ml-auto mr-auto">
            <form method="POST" action="/profile" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="w-250 h-300 ml-auto mr-auto">
                    <label for="logo" class="cursor-pointer">
                        
                        <div>
                            @if (Auth::check() && Auth::user()->logo)
                            <img class="mt-1 ml-auto mr-auto h-250 w-250 rounded-full ring-4 object-cover" id="previewImage" src="{{$user->logo ? asset('storage/' . $user->logo) : asset('/images/no-image.png')}}" alt=""/>
                            @else
                            <img class="mt-1 ml-auto mr-auto h-250 w-250 rounded-full ring-4 object-cover" id="previewImage" src="/img/no-photo.jpg"  alt=""/>
                            @endif
                            <input class="hidden" id="logo" name="logo" type="file" accept="image/*" onchange="previewLogo(event)">
                        </div>
                        <div class="-mt-60a">
                            <i class="fa-solid fa-camera p-3 rounded-full ml-200 bg-blue-400 text-white"></i>
                        </div>
                    </label>
                </div>
        
                
                <div class="mb-4">
                    <label class="ml-2 text-sm text-slate-500"><i class="fa fa-thin fa-envelope"></i> Email Address:</label>
                    <input
                    name="email"
                    type="email"
                    required
                    value="{{ $user->email }}"
                    class="border border-slate-400 w-100 p-2 rounded-2xl  xmmm:p-4"
                    placeholder="Email"/>
                    @error('email')
                        <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="mb-4">
                    <label class="ml-2 text-sm text-slate-500"><i class="fa fa-thin fa-user"></i> Username:</label>
                    <input
                    name="username"
                    minlength="5" 
                    required
                    value="{{ $user->username }}"
                    class="border border-slate-400 w-100 p-2 rounded-2xl xmmm:p-4"
                    placeholder="Username"/>
                    @error('username')
                        <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>
        
                <label class="ml-2 text-sm text-slate-500"><i class="fa fa-thin fa-lock"></i> Password:</label>
                <input
                minlength="6"
                name="password"
                type="password"
                class="border border-slate-400 w-100  p-2 rounded-2xl xmmm:p-4"
                placeholder="Password"/>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
        
        
               <div class="flex justify-center">
                <button type="submit" class="p-20 pt-3 pb-3 rounded-xl mt-10 bg-blue-600 text-white hover:bg-blue-700">Update</button>
               </div>
        
               
            </form>
        </div>
    </div>
</div>

<script>
    function previewLogo(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection