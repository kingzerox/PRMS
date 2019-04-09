@extends('layouts.app')

@section('title','搜索结果')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card ">
      <div class="card-body">
        {{-- 列表 --}}
        @if (count($devices))
          <ul class="list-unstyled">
            @foreach ($devices as $device)
              <li class="media">
                <div class="media-body">
                  <div class="media-heading mt-0 mb-1">
                    <a href="{{ route('devices.show', [$device->id]) }}" title="{{ $device->title }}">
                      {{ $device->title }}
                    </a>
                  </div>
                </div>
              </li>
              @if ( ! $loop->last)
                <hr>
              @endif
            @endforeach
            <hr>
          </ul>
        @else
          <div class="empty-block">暂无数据 </div>
        @endif
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('devices._sidebar')
  </div>
</div>

@endsection
