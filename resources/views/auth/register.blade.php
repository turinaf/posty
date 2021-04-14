@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-white w-4/12 rounded-lg mt-4 p-6">
          Register
           <form action="{{route('register')}}" method="POST">
               @csrf
               <div class="mb-4">
                   <label for="name" class="sr-only">Name</label>
                   <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">

                   @error('name')
                     <div class="text-red-500 text-sm mt-2">
                        {{$message}}
                     </div> 
                   @enderror
               </div> <!--form-group-->

               <div class="mb-4">
                <label for="username" class="sr-only">username</label>
                <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('username') border-red-500 @enderror" value="{{old('username')}}">
                @error('username')
                <div class="text-red-500 text-sm mt-2">
                   {{$message}}
                </div> 
              @enderror
            </div> <!--form-group-->

            <div class="mb-4">
                   <label for="email" class="sr-only">Email</label>
                   <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                   @error('email')
                   <div class="text-red-500 text-sm mt-2">
                      {{$message}}
                   </div> 
                 @enderror
               </div> <!--form-group-->

               <div class="mb-4">
                <label for="password" class="sr-only">password</label>
                <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('password') border-red-500 @enderror" >
                @error('password')
                <div class="text-red-500 text-sm mt-2">
                   {{$message}}
                </div> 
              @enderror
            </div> <!--form-group-->

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Repeat Paassword</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" class="bg-gray-100 border-2 w-full p-2 rounded-lg" >
            </div> <!--form-group-->
             
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 w-full p-2 rounded-lg text-white py-3 px-4">Register</button>
            </div>
           </form>
        </div>
    </div>
@endsection