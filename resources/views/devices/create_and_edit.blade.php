@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            @if($device->id)
            编辑设备
            @else
            添加设备
            @endif
          </h2>

          <hr>

          @if($device->id)
            <form action="{{ route('devices.update', $device->id) }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
          @else
            <form action="{{ route('devices.store') }}" method="POST" accept-charset="UTF-8">
          @endif

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('shared._error')

              <div class="form-group">
                <input class="form-control" type="text" name="title" value="{{ old('title', $device->title ) }}" placeholder="请填写名字" required />
              </div>

              <div class="form-group">
                <select class="form-control" name="dev_category_id" required>
                  <option value="" hidden disabled {{ $device->id ? '' : 'selected' }}>请选择分类</option>
                    @foreach ($devcategories as $value)
                      <option value="{{ $value->id }}" {{ $device->dev_category_id == $value->id ? 'selected' : '' }}>
                        {{ $value->name }}
                      </option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <textarea name="description" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('description', $device->description ) }}</textarea>
              </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        upload: {
          url: '{{ route('devices.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>
@stop
