@if (count($applies))
  <ul class="list-unstyled">
    @foreach ($applies as $apply)
      <li class="media">
        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('devices.show',$apply->device_id) }}" title="{{ $apply->device->title }}">
              {{ $apply->device->title }}
            </a>
          </div>

           <small class="media-body meta text-secondary">

            <a class="text-secondary" href="#" title="{{ $apply->user->name }}">
              <i class="far fa-folder"></i>
              {{ $apply->user->name }}
            </a>

            <span> • </span>
            <a class="text-secondary" href="#" title="{{ $apply->appstatus->name }}">
              <i class="far fa-folder"></i>
              {{ $apply->appstatus->name }}
            </a>
          </small>
            <form action="{{ route('applies.confirm')}}" name="data" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$apply->id}}">
                <input type="hidden" name="type" value="3">
                <button class="btn btn-default pull-right" type="submit">拒绝</button>
            </form>
            <form action="{{ route('applies.confirm')}}" name="data" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$apply->id}}">
                <input type="hidden" name="type" value="2">
                <button class="btn btn-default pull-right" type="submit">同意</button>
            </form>
        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据</div>
@endif
