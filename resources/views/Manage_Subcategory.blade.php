@extends('index') <!-- AdminLTE master layout -->

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Manage SubCategories</h1>
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
        <form method="GET" action="{{ route('subcategory.index') }}">
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
                    <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Reset</a>
                </div>
                <div class="col-md-2 offset-md-5 text-right">
                    <a href="{{ route('addsubcategory') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add SubCategory
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
                            <th>Category</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $subcategory)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>{{ $subcategory->category->name ?? 'N/A' }}</td>

                            <!-- Image -->
                            <td>
                                @if($subcategory->image)
                                    <img src="{{ asset('storage/'.$subcategory->image) }}" width="50" height="50" alt="{{ $subcategory->name }}" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <!-- Description -->
                            <td>{{ Str::limit($subcategory->description, 50) }}</td>

                            <!-- Status -->
                            <td>
                                @if($subcategory->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td>

                                <a href="{{ route('editsubcategory', $subcategory->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subcategory?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No subcategories found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination
            <div class="card-footer clearfix">
                {{ $categories->withQueryString()->links('pagination::bootstrap-4') }}
            </div>-->
        </div>

    </div>
</div>

@endsection
