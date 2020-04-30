@extends('layouts.master')

@section('title')
    UBOS | Categories List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> List of Categories</h4>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="category">
              <thead class=" text-primary">
                <th>Category</th>
                <th>Action</th>
              </thead>
              <tbody>
                @if (!empty($categories))
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->category}}</td>
                        <td>
                          <div class="row">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><i class="now-ui-icons ui-1_settings-gear-63"></i></a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                            </form>
                          </div>
                        </td>
                    @empty
                        <td>No Category</td>
                    </tr>
                    @endforelse
                @endif
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
    $('#category').DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
    });
  });
</script>      
@endsection