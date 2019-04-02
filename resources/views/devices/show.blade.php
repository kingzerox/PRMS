@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Device / Show #{{ $device->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('devices.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('devices.edit', $device->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $device->title }}
</p> <label>Body</label>
<p>
	{{ $device->body }}
</p> <label>User_id</label>
<p>
	{{ $device->user_id }}
</p> <label>Dev_category_id</label>
<p>
	{{ $device->dev_category_id }}
</p> <label>Last_user_id</label>
<p>
	{{ $device->last_user_id }}
</p> <label>Order</label>
<p>
	{{ $device->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
