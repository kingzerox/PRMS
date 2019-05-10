@if (count($applies))

  <ul class="list-group mt-4 border-0">
    @foreach ($applies as $apply)
      <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 @if($loop->first) border-top-0 @endif">
        <a href="{{ route('devices.show',$apply->device->id) }}">
          {{ $apply->device->title }}
        </a>

        <div class="reply-content text-secondary mt-2 mb-2">
          {{ $apply->appstatus->name }}
        </div>

        <div class="text-secondary" style="font-size:0.9em;">
          <i class="far fa-clock"></i> 申请于 {{ $apply->created_at->diffForHumans() }}
        </div>
        @if($apply->app_status_id==2 && $apply->user_id==(Auth::id()))
         <form action="{{ route('applies.return') }}" name="data" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$apply->id}}">
                <input type="hidden" name="dev_id" value="{{ $apply->device->id }}">
                <button class="btn btn-default pull-right" type="submit">设备归还</button>
        </form>
        <form action="#" name="data" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$apply->id}}">
                <input type="hidden" name="dev_id" value="{{ $apply->device->id }}">
                <button class="btn btn-default pull-right" type="submit">设备使用</button>
        </form>
        @endif
      </li>
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据</div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
  {!! $applies->appends(Request::except('page'))->render() !!}
</div>
