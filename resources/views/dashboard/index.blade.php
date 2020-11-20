@extends('layout.app')


@section('content')
   
   <div class="flex justify-center">
      <div class="w-4/12 bg-white p-6 rounded-lg">
        <h1>{{  auth()->user()->name. ' '. auth()->user()->lastName }}</h1>
      </div>
  </div>

@endsection
