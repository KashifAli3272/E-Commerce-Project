@extends('index')

@section('content')

<!-- Page Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="m-0">Manage Products</h1>
            <a href="{{ route('addproduct') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
    </div>
</div>

<div class="content">
<div class="container-fluid">

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    {{-- Filter --}}
    <div class="card card-outline card-secondary">
        <div class="card-body">
            <form method="GET" action="{{ route('product.index') }}">
            <div class="row align-items-end">

                <!-- Status Filter -->
                <div class="col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Filter By Status --</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Apply
                    </button>
                    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>

                <!-- Search Box -->
                <div class="col-md-4">
                    <label>Search</label>
                    <input type="text"
                           name="q"
                           class="form-control"
                           placeholder="Search products..."
                           value="{{ request('q') }}">
                </div>

                <!-- Buttons -->


            </div>
        </form>
    </div>
</div>

    {{-- Table --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title mb-0">Products List</h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered text-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="60">#</th>
                        <th width="80">Image</th>
                        <th>Name</th>
                        <th width="100">Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th width="130" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $product)
                        <tr>
                            <td>{{ $categories->firstItem() + $key }}</td>

                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}"
                                         width="50"
                                         height="50"
                                         class="img-thumbnail"
                                         alt="{{ $product->product_name }}">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>{{ $product->product_name }}</td>

                            <td>{{ number_format($product->price, 2) }}</td>

                            <td>{{ $product->brand->brand_name ?? '-' }}</td>

                            <td>{{ $product->category->name ?? '-' }}</td>

                            <td>{{ \Illuminate\Support\Str::limit($product->description, 40) }}</td>

                            <td>
                                @if($product->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('editproduct', $product->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('product.destroy', $product->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this product?')"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-3">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
            <div class="card-footer clearfix">
                {{ $categories->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        @endif

    </div>

</div>
</div>

@endsection
