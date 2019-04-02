@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Device
          <a class="btn btn-success float-xs-right" href="{{ route('devices.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($devices->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Body</th> <th>User_id</th> <th>Dev_category_id</th> <th>Last_user_id</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($devices as $device)
              <tr>
                <td class="text-xs-center"><strong>{{$device->id}}</strong></td>

                <td>{{$device->title}}</td> <td>{{$device->body}}</td> <td>{{$device->user_id}}</td> <td>{{$device->dev_category_id}}</td> <td>{{$device->last_user_id}}</td> <td>{{$device->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('devices.show', $device->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('devices.edit', $device->id) }}">
                    E
                  </a>

                  <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $devices->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
