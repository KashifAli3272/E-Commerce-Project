

<div class="container my-4">
    <div class="d-flex justify-content-center gap-4 flex-wrap">

        <!-- Products Dropdowns -->

        <!-- Categories Dropdowns -->
        @foreach($categories as $category)
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <span>{{ $category->name }}</span>
            </button>
            <ul class="dropdown-menu">
                @foreach($category->subcategories as $sub)
                <li>
                    <a class="dropdown-item" href="#">{{ $sub->subcategory_name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
