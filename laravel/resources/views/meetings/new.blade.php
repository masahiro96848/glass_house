@extends('app')

@section('title', 'zoomミーティングを作る')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--wrapper--center">zoomミーティングを作成する</h2>
    </div>
    <div class="l-container--wrapper u-pt_40 u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('meetings.create')}}" enctype="">
          @csrf
            @include('meetings.form')
          <button class="c-button c-button--submit " type="submit">作成する</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')  
@endsection

{{-- {{dd($product->id)}} --}}