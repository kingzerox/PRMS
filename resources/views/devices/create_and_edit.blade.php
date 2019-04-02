@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Device /
          @if($device->id)
            Edit #{{ $device->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($device->id)
          <form action="{{ route('devices.update', $device->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('devices.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $device->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="body-field">Body</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $device->body ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $device->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="dev_category_id-field">Dev_category_id</label>
                    <input class="form-control" type="text" name="dev_category_id" id="dev_category_id-field" value="{{ old('dev_category_id', $device->dev_category_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="last_user_id-field">Last_user_id</label>
                    <input class="form-control" type="text" name="last_user_id" id="last_user_id-field" value="{{ old('last_user_id', $device->last_user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $device->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('devices.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
