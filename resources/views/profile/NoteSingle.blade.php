@extends('profile.Layout')

@section('content')

<div class="a:grid a:grid-cols-4 divide-x">
    <div class="a:col-span-1 hidden a:block overflow-auto h-screen">
        @include('profile.NotesInfoNav') 
    </div>
    <div class="a:col-span-3 border-none overflow-auto h-screen">

        <div class="bg-white" style="  position: -webkit-sticky; position: sticky; top: 0;">
            <x-alert-script/>
            @include('profile.ContentNav')
        </div>

        <div class="flex justify-center p-5 mt-8">

            
            <form class="w-100 md1:w-70 lg1:w-50" action="{{ route('note.update', ['note' => $note->id]) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="mt-8">
                    <label class="ml-2"><i class="fa-sharp fa-solid fa-t"></i> Title</label>
                    <input class="w-100 border border-slate-500 p-2 rounded-lg" name="title" value="{{ $note->title }}">
                </div>
            
                <div class="mt-2">
                    <label class="ml-2"><i class="fa-solid fa-book mb-2"></i> Note</label>
                    <textarea class="w-100 rounded-lg h-80" name="note">{{ $note->note }}</textarea>
                </div>
            
                <div class="flex justify-between items-center mt-5 p-5 pt-0">
                    <a href="/notes" class="p-2 pl-0 h-3 w-3 rounded-full text-slate-600 flex items-center"><i class="fa-solid fa-circle-arrow-left"></i><span class="ml-1">Back</span></a>
                    <button type="submit" class="bg-blue-600 p-10 pt-2 pb-2 text-white hover:bg-blue-700 mt-4 rounded-lg">Update</button>
                </div>
            </form>

        </div>
        
    </div>
</div>

@endsection



        





