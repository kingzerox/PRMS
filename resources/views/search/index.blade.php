@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row mb-5">
  <div class="col-lg-9 col-md-8 topic-list">
    <div class="card ">
      <div class="card-body">
      <form action="{{ route('search.show')}}" name="data" method="POST" accept-charset="UTF-8">
        {{ csrf_field() }}
        <select class="form-control col-lg-2 pull-left" name="devCategory_id">
          <option>==设备类型==</option>
                   @foreach ($devcategory as $d)
          <option value="{{$d->id}}">{{$d->name}}</option>
                   @endforeach
        </select>
        <select class="form-control col-lg-2 " name="status_id">
        <option>==设备状态==</option>
                   @foreach ($status as $s)
          <option value="{{$s->id}}">{{$s->name}}</option>
                   @endforeach
        </select>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="device_name"  placeholder="请填写设备名称">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">搜索</button>
                    </span>
                </div>
            </div>
        </div>
    </form>
     </div>
    </div>
  </div>
</div>

@endsection
