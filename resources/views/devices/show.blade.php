@extends('layouts.app')

@section('title', $device->title)
@section('description')

@section('content')

  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center mt-3 mb-3">
                        {{ $device->title }}
          </h1>

          <div class="article-meta text-center text-secondary">
            {{ $device->created_at->diffForHumans() }}
            ⋅
          </div>

          <div class="topic-body mt-4 mb-4">
            {!! $device->description !!}
          </div>
          @can('manage_contents')
            <div class="operate">
              <hr>
              <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
                <i class="far fa-edit"></i> 编辑
              </a>
              <form action="{{ route('devices.destroy', $device->id) }}" method="post"
                    style="display: inline-block;"
                    onsubmit="return confirm('您确定要删除吗？');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-secondary btn-sm">
                  <i class="far fa-trash-alt"></i> 删除
                </button>
              </form>
            </div>
          @endcan
          @if($device->status_id==1)
          <hr>
              <a href="{{ route('applies.store', $device->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
                <i class="far fa-edit"></i> 申请使用
              </a>
         @endif
        </div>
      </div>
    </div>
  </div>
@stop
