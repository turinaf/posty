@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-white w-4/12 rounded-lg mt-4 p-6">
            <p class="mb-2">Login</p>
             @if (session('status'))
               <div class="bg-red-500 rounded-lg w-full mb-6 text-white text-center p-4">
                {{session('status')}}
               </div>
                 
             @endif

           <form action="{{route('login')}}" method="POST">
            @csrf
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
               <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"  class="mr-2" >
                <label for="remember">Remember me</label>
               </div>
             </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 w-full p-2 rounded-lg text-white py-3 px-4">Login</button>
            </div>
           </form>
        </div>
    </div>
@endsection