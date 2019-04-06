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

           <small class="media-body meta text-secondary">

            <a class="text-secondary" href="{{ route('devcategories.show', $device->dev_category_id) }}" title="{{ $device->devcategory->name }}">
              <i class="far fa-folder"></i>
              {{ $device->devcategory->name }}
            </a>

            <span> • </span>
            <a class="text-secondary" href="{{ route('statuses.show', $device->status_id) }}" title="{{ $device->status->name }}">
              <i class="far fa-folder"></i>
              {{ $device->status->name }}
            </a>

            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃于：{{ $device->updated_at }}">{{ $device->updated_at->diffForHumans() }}</span>
          </small>
        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif
