@extends('app')

@section('title', 'zoomミーティングの日程を調整する')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--wrapper--center">zoomミーティングの日程調整</h2>
    </div>
    <div class="l-container--wrapper u-pt_40 u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('meetings.update', ['id' => $meeting->id])}}" enctype="">
          @csrf
          @method('PUT')
            @include('meetings.form')
          <button class="c-button c-button--submit " type="submit">作成する</button>
        </form>
      </div>
    </div>
  </div>
@endsection

{{-- {{dd($product->id)}} --}}