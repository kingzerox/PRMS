@extends('layouts.app')

@section('title')

@section('content')
<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card ">
      <div class="card-body">
        {{-- 列表 --}}
        @include('applies._apply_list', ['applies' => $applies])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $applies->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
