@extends('index') <!-- AdminLTE master layout -->

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Manage Categories</h1>
    </div>
</div>
 @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
<div class="content">
    <div class="container-fluid">

        <!-- Filter Row -->
        <form method="GET" action="{{ route('category.index') }}">
            <div class="row mb-3">
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">-- Filter By Status --</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Filter</button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Reset</a>
                </div>
                <div class="col-md-2 offset-md-5 text-right">
                    <a href="{{ route('addcategory') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add Category
                    </a>
                </div>
            </div>
        </form>

        <!-- Categories Table -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Categories List</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered text-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>

                            <!-- Image -->
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/'.$category->image) }}" width="50" height="50" alt="{{ $category->name }}" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <!-- Description -->
                            <td>{{ Str::limit($category->description, 50) }}</td>

                            <!-- Status -->
                            <td>
                                @if($category->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td>

                                <a href="{{ route('editcategory', $category->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No categories found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer clearfix">
               {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
</div>

@endsection
