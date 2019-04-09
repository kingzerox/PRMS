@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Apply
          <a class="btn btn-success float-xs-right" href="{{ route('applies.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($applies->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Device_id</th> <th>User_id</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($applies as $apply)
              <tr>
                <td class="text-xs-center"><strong>{{$apply->id}}</strong></td>

                <td>{{$apply->device_id}}</td> <td>{{$apply->user_id}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('applies.show', $apply->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('applies.edit', $apply->id) }}">
                    E
                  </a>

                  <form action="{{ route('applies.destroy', $apply->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $applies->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
