<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>
<body class="bg-gray-100">
    <nav class="flex justify-between p-6 bg-white mb-6">
      <ul class="flex items-center">
          <li><a href="{{route('home')}}" class="p-2">Home</a></li>
          <li><a href="{{route('dashboard')}}" class="p-2">Dashboard</a></li>
          <li><a href="{{route('posts')}}" class="p-2">Post</a></li>
      </ul>
      <ul class="flex items-center ">
          @auth
           <li><a href="#" class="p-2">{{ auth()->user()->name. ' ' . auth()->user()->lastName }}</a></li>
           <li>
             <form action="{{route('logout')}}" method="post" class="inline p-3">
              @csrf
              <button type="submit">Logout</button>
            
            </form>
             
           </li>
          @endauth 

          @guest
            <li><a href="{{route('login')}}" class="p-2">Login</a></li>
            <li><a href="{{route('register')}}" class="p-2">Register</a></li>
          @endguest
          
           
           
      </ul>
    </nav>
     @yield('content')
</body>
</html>