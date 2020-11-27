@extends('layout.app')


@section('content')

<div class="flex justify-center">

    <div class="w-8/12 bg-white p-6 rounded-lg">

        @if(Session::has('status'))
            <div class="w-full bg-green-100 text-green-500 p-6 rounded-lg mb-6 border-green text-center">
                {{ Session::get('status') }}
            </div>
        @endif


        <form action="{{ route('posts.store') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post something!"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>

                <button accesskey="S" type="submit"
                    class="bg-blue-500 hover:bg-blue-400 px-4 py-3 rounded text-white font-medium ">Login</button>

            </div>
        </form>

        @if($posts->count())

            @foreach($posts as $post)
              <div class="border-blue-500 border-2 p-4 m-2">
                    <a href="#" class="font-bold">{{ $post->user->name }} <span
                            class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span></a>
                    <p class="mb-2"">{{ $post->body }}</p>

                <div class=" flex items-center">
                   @auth
                       @if(!$post->linkedBy(auth()->user()))

                          <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                              @csrf
                              <button type="submit" class="text-blue-500 border-blue-500 border-2 py-2 px-3 rounded mr-1 hover:text-white hover:bg-blue-500">Like </button>
                            
                          </form>
                        @else

                        <form action="{{route('posts.unlikes', $post)}}" method="POST" class="mr-1">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-500 border-red-500 border-2 py-2 px-3 rounded mr-1 hover:text-white hover:bg-red-500 ">Unlike</button>

                          </form>
                          
                        @endif
                      @endauth
                        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count()) }}</span>
                </div>

              </div>

            @endforeach
    {{ $posts->links() }}
@else
    <p>There is no post</p>
    @endif

</div>

</div>




@endsection
