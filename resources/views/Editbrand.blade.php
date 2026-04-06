@extends('index') <!-- AdminLTE master layout -->

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Brand</h1>
    </div>
</div>


<div class="content">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 offset-md-2">
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Brand: {{ $brand->brand_name }}</h3>
                    </div>

                    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- or PUT/PATCH depending on your route -->

                        <div class="card-body">

                            <!-- Name -->
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" value="{{ old('brand_name', $brand->brand_name) }}" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $brand->description) }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Image -->
                            <div class="form-group">
                                <label>Brand Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($brand->image)
                                    <img src="{{ asset('storage/'.$brand->image) }}" width="120" class="img-thumbnail mt-2">
                                @endif
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Brand</button>
                            <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
