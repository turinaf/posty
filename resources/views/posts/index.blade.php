@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
         <div class="bg-white w-8/12 rounded-lg p-6 mt-4">
           <form action="{{route('posts')}}" method="POST" class="mb-4">
              @csrf
             <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write your post" ></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                       {{$message}}
                    </div>
                @enderror
             </div>
             
              <div>
                 <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
              </div>
           </form>
              <hr>
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
         </div>
    </div>
@endsection