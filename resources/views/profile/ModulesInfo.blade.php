@extends('profile.Layout')

@section('content')

<div class="a:grid a:grid-cols-4 divide-x">
    <div class="a:col-span-1 hidden a:block overflow-auto h-screen">
        @include('profile.ModulesInfoNav') 
    </div>
    <div class="a:col-span-3 border-none overflow-auto h-screen">
        
        <div class="bg-white" style="  position: -webkit-sticky; position: sticky; top: 0;">
            <x-alert-script/>
            @include('profile.ContentNav')
        </div>

        <div class="p-2 m-10 mt-8 a4:w-80 xmmm:w-400 ml-auto mr-auto">
            <p class="text-center text-5xl mt-40">Coming Soon!!</p>
        </div>
    </div>
</div>

@endsection