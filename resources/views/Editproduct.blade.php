@extends('index')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Product</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Alerts -->
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

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product Details</h3>
                    </div>

                    <form action="{{ route('product.update', $product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <!-- Category -->
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sub Category -->
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="">-- Select Sub Category --</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Brand -->
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">-- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Product Name -->
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text"
                                       name="product_name"
                                       value="{{ old('product_name', $product->product_name) }}"
                                       class="form-control"
                                       placeholder="Enter product name">
                            </div>

                            <!-- Price -->
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number"
                                       name="price"
                                       value="{{ old('price', $product->price) }}"
                                       class="form-control"
                                       placeholder="Enter product price">
                            </div>

                            <!-- Current Image -->
                            @if($product->image)
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img src="{{ asset('storage/'.$product->image) }}"
                                         width="120"
                                         class="img-thumbnail mb-2">
                                </div>
                            @endif

                            <!-- Upload New Image -->
                            <div class="form-group">
                                <label>Change Product Image</label>
                                <div class="custom-file">
                                    <input type="file"
                                           name="image"
                                           class="custom-file-input"
                                           id="productImage">
                                    <label class="custom-file-label"
                                           for="productImage">Choose file</label>
                                </div>
                                <small class="text-muted">Leave empty if you don't want to change the image.</small>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="description"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Enter description">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Product
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
