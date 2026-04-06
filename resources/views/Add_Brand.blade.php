 @extends('index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Add Brand</h1>
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
            <h3 class="card-title">Add Brand</h3>
          </div>

          <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                 <div class="form-group">


              </div>

              <!-- Category Name -->
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="brand_name" class="form-control" placeholder="Enter brand name" required>
              </div>




              <!-- Category Image -->
              <div class="form-group">
                <label>Brand Image</label>
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="brandImage" required>
                  <label class="custom-file-label" for="brandImage">Choose file</label>
                </div>
              </div>



              <!-- Category Description -->
              <div class="form-group">
                <label>Brand Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter brand description"></textarea>
              </div>

              <!-- Category Status -->
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
                <i class="fas fa-save"></i> Save Brand
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

