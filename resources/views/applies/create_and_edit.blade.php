@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Apply /
          @if($apply->id)
            Edit #{{ $apply->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($apply->id)
          <form action="{{ route('applies.update', $apply->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('applies.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="device_id-field">Device_id</label>
                    <input class="form-control" type="text" name="device_id" id="device_id-field" value="{{ old('device_id', $apply->device_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $apply->user_id ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('applies.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
