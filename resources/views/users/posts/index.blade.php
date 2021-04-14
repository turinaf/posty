@extends('layouts.app')
@section('content')
    <div class="justify-center flex">
       
       <div class="p-4 mt-4 w-8/12 ">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
                <p>Posted {{ $posts->count()}} {{Str::plural('post', $posts->count())}}</p>
                <p>Received {{$user->receivedLikes->count()}} {{Str::plural('like', $user->receivedLikes->count())}}</p>
            </div>
        <div class="bg-white p-6 w-full rounded-lg">
           @if ($posts->count()>0)
               @foreach ($posts as $post)
               <div class="mt-4">
                  <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-500 text-sm">{{$post->created_at->diffForHumans()}}</span>
                 
                 <p>{{$post->body}}</p>
                   @if ($post->ownedBy(auth()->user()))
                      <div class="mt-2">
                         <form action="{{route('posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                      </form>
                      </div>
                   @endif
                   
                  <div class="flex items-center">
                     {{-- Check if the user have like the post --}}
                    @if (!$post->likedBy(auth()->user()))
                         <form action="{{route('posts.likes',  $post->id)}}" method="POST" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-500">Like</button>
                         </form>
                   
                          
                      @else
                      <form action="{{route('posts.likes',  $post->id)}}" method="POST" class="mr-1">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                     </form>
                    @endif
                    
                    
                   <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                  </div>
               </div>
               @endforeach
               <div class="mt-8">
                  {{$posts->links()}}
               </div>
               
           @else
               <p>There are no posts yet</p>
           @endif
        </div> <!-- Post container -->
       </div>
    </div>
@endsection