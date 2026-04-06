@extends('index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Add Product</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8 offset-md-2">

        <!-- Success Message -->
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
            <h3 class="card-title">Add Product</h3>
          </div>

          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

              <!-- Category Name -->
              <div class="form-group">
    <label>Category Name</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Select Category --</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>
 <div class="form-group">
    <label>Sub Category Name</label>
    <select name="subcategory_id" class="form-control" required>
        <option value="">-- Select Sub Category --</option>

        @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">
                {{ $subcategory->subcategory_name }}
            </option>
        @endforeach

    </select>
</div>
 <div class="form-group">
    <label>Brand Name</label>
    <select name="brand_id" class="form-control" required>
        <option value="">-- Select Brand --</option>

        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">
                {{ $brand->brand_name }}
            </option>
        @endforeach

    </select>
</div>
<div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
              </div>
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter product price" required>
              </div>

              <!-- Product Image -->
              <div class="form-group">
                <label>Product Image</label>
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="productImage" required>
                  <label class="custom-file-label" for="productImage">Choose file</label>
                </div>
              </div>

              <!-- Product Description -->
              <div class="form-group">
                <label>Product Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter product description"></textarea>
              </div>

              <!-- Product Status -->
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>

            </div>

            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Product
              </button>
              <button type="reset" class="btn btn-secondary">
                Reset
              </button>
            </div>

          </form>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection
