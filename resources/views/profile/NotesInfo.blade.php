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

        <div class="a5:grid a5:grid-cols-2 p-2 m-2 mt-8  lg1:m-10 lg1:mt-8">

            <form 
                method="POST" 
                action="/notes"
                class="p-2 pt-10 lg1:p-10">
                @csrf

                <input 
                    name="title"
                    class="border border-slate-400 w-100 p-3 rounded-lg"
                    placeholder="Note Title"/>
                    @error('title')
                    <p class="text-red-500 text-xs ml-2 mt-1">{{$message}}</p>
                    @enderror

                <textarea 
                    name="note"
                    placeholder="Your note here..."
                    class="border-slate-400 w-100 h-400 rounded-lg mt-3"
                    ></textarea>
                    @error('note')
                    <p class="text-red-500 text-xs ml-2">{{$message}}</p>
                    @enderror

                <br/>

                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 p-10 pt-2 pb-2 text-white hover:bg-blue-700 mt-4 rounded-lg">Save</button>
                </div>

            </form>
            <div class="p-2 pt-10 lg1:p-10">
                <p class="bg-slate-500 text-white text-center rounded-t-lg p-3">Notes</p>
                <div class="border border-slate-400 p-5 rounded-b-lg h-415 overflow-auto">
                    @unless ($notes->isEmpty())
                    @foreach ($notes as $note)
                        <div class="flex w-100 h-80a rounded-lg">
                            <div class="w-70 pt-3 h-80a overflow-hidden">
                                <p class="whitespace-nowrap overflow-ellipsis">{{ $note->title }}</p>
                                <p class="text-sm font-light">{{ $note->created_at }}</p>
                            </div>
                            <div class="w-30 pl-2 pt-1">
                                <button type="button" class="w-100 p-3 pt-1 pb-1 bg-slate-400 text-white rounded-lg hover:bg-slate-500 mb-2" onclick="window.location.href='{{ route('note.show', ['note' => $note->id]) }}'">View</button>
                                <form method="POST" action="{{ route('note.destroy', ['note' => $note->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex justify-center">
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="underline underline-offset-4 text-sm text-red-500" type="button">
                                            Delete
                                        </button>
                                    </div>


                                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this note?</h3>
                                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </form>  
                            </div>
                        </div>
                        <hr class="h-1 mb-2 mt-2 bg-slate-600"/>
                    @endforeach
                    @else
                    <div class="text-center">
                        <p>No available notes.</p>
                    </div>
                    @endunless
                </div>
                
            </div>


           

        </div>
        
    </div>
</div>


@endsection