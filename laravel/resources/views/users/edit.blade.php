@extends('app')

@section('title', 'レビューを編集')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-member--other">レビューを登録</h3>
        <div class="l-container--border ">
          <div class="p-comment--area">
            <div class="c-user--feature u-bb--none">
              @include('error')
              <form method="post" action="{{ route('users.update', ['r_id' => $review->id, 'm_id' => $matching->id])}}">
                @csrf
                @method('PUT')
                @include('users.form')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection