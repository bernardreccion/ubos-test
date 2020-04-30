@extends('layouts.master')

@section('title')
    UBOS | Users
@endsection

@section('content')
    
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered Roles</h4>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="roles">
              <thead class=" text-primary">
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <div class="row">
                        <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-success"><i class="now-ui-icons ui-1_settings-gear-63"></i></a>
                        <form action="{{ route('roles.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                        </form>
                      </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready( function () {
  $('#roles').DataTable({
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
  });
});
</script>
@endsection