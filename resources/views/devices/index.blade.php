@extends('layouts.app')

@section('title', isset($devcategory) ? $devcategory->name : '设备列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    @if (isset($devcategory))
      <div class="alert alert-info" role="alert">
        {{ $devcategory->name }} ：{{ $devcategory->description }}
      </div>
    @endif
    @if (isset($status))
      <div class="alert alert-info" role="alert">
        {{ $status->name }} ：{{ $status->description }}
      </div>
    @endif
    <div class="card ">
      <div class="card-body">
        {{-- 列表 --}}
        @include('devices._device_list', ['devices' => $devices])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $devices->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  @can('manage_contents')
  <div class="col-lg-3 col-md-3 sidebar">
    @include('devices._sidebar')
  </div>
  @endcan
</div>

@endsection
