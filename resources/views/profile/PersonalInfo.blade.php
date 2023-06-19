@extends('profile.Layout')

@section('content')

<div class="a:grid a:grid-cols-4 divide-x">
    <div class="a:col-span-1 hidden a:block overflow-auto h-screen">
        @include('profile.PersonalInfoNav') 
    </div>
    <div class="a:col-span-3 border-none overflow-auto h-screen">
        
        <div class="bg-white" style="  position: -webkit-sticky; position: sticky; top: 0;">
            <x-alert-script/>
            @include('profile.ContentNav')
        </div>

        <div class="p-2 m-10 mt-6 a4:w-80 xmmm:w-400 ml-auto mr-auto">

            <form method="POST" action="/personal">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-users ml-2"></i> Type</label>
                    <select
                    name="user_type"
                    aria-label="Default select example" 
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    <option value="Teacher">Teacher</option>
                    <option value="Student">Student</option>
                </select>
                </div>

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-signature ml-2"></i> First Name</label>
                    <input 
                    name="firstname"
                    placeholder="First Name"
                    value="{{$user->firstname}}"
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    @error('firstname')
                        <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>

               <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-signature ml-2"></i> Middle Name</label>
                    <input 
                    name="middlename"
                    value="{{$user->middlename}}"
                    placeholder="Middle Name"
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    @error('middlename')
                        <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
               </div>

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-signature ml-2"></i> Last Name</label>
                    <input 
                    name="lastname"
                    value="{{$user->lastname}}"
                    placeholder="Last Name"
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    @error('lastname')
                        <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-phone ml-2"></i> Phone Number</label>
                    <input 
                    name="phone_number"
                    value="{{$user->phone_number}}"
                    placeholder="Phone Number"
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    @error('phone_number')
                    <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-birthday-cake ml-2"></i> Birth Date</label>
                    <input  
               
                    name="birthday"
                    value="{{$user->birthday}}"
                    placeholder="Birth Date"
                    class="w-100 border border-slate-500 p-3 rounded-xl">
                    @error('birthday')
                    <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="text-sm text-slate-700"><i class="fa fa-thin fa-venus-mars ml-2"></i> Gender</label>
                    <div class="rounded-xl border border-slate-500 p-3">
                    <div class="flex justify-between h-4 items-center">
                        <div class="flex">
                        <input 
                        name="gender" 
                        type="radio" 
                        id="male" 
                        value="Male"/>
                          <label class="text-sm ml-1">Male</label>
                        </div>

                        <div class="flex">
                          <input 
                        name="gender" 
                        type="radio" 
                        id="female" 
                        value="Female" />
                          <label class="text-sm ml-1">Female</label>
                        </div>
                    </div>
                    </div>
                    @error('gender')
                       <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                    @enderror
                </div>
                

                <label class="text-sm text-slate-700"><i class="fa fa-thin fa-address-book ml-2"></i> Address</label>
                <input 
                name="address"
                value="{{$user->address}}"
                placeholder="Address"
                class="w-100 border border-slate-500 p-3 rounded-xl">
                @error('address')
                   <p class="text-red-500 text-xs m-0 ml-4">{{$message}}</p>
                @enderror

                <div class="flex justify-center">
                    <button type="submit" class="p-20 pt-3 pb-3 rounded-xl mt-10 bg-blue-600 text-white hover:bg-blue-700">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection