


<style>

/* body */
body{
    font-size:18px;
}

/* navbar brand */
.navbar-brand{
    font-size:28px;
    font-weight:bold;
}

/* navbar links */
.navbar-nav .nav-link{
    font-size:16px; /* parent category slightly smaller */
    padding-left:20px;
    padding-right:20px;
}

/* Subcategory links */
.subcategory{
    font-size:10px; /* bigger than parent */
    font-weight:50;
    color:#555;
    text-decoration:none;
    transition: all 0.2s ease;
}

.subcategory:hover{
    color:#0d6efd;
}

/* Subcategory font slightly bigger */
.dropdown-item{
    font-size:18px;
    font-weight:100;
    color:#555;
    transition: all 0.2s ease;
}

.dropdown-item:hover{
    color:#0d6efd;
    background-color: #f8f9fa;
}

/* Small width dropdown (50–150px) */
.nav-item.dropdown .dropdown-menu {
    min-width: 120px; /* adjust width as needed */
}

/* Open dropdown on hover */
.nav-item.dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
}

/* Smooth transition */
.dropdown-menu {
    transition: all 0.3s ease;
    border-radius: 8px;
}
.navbar{
    width: 50px;
    margin-left: 230px
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg ">
    <div class="container">



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">

                @foreach($allCategories as $product)
                <li class="nav-item dropdown position-relative">
                    <!-- Parent Category -->
                    <a class="nav-link dropdown-toggle fs-6 fw-medium text-dark" href="#">
                        {{ $product->name }}
                    </a>

                    @if($product->subCategories->count())
                    <!-- Small width dropdown -->
                    <ul class="dropdown-menu shadow rounded-3 p-2">
                        @foreach($product->subCategories as $sub)
                        <li>
                            <a class="dropdown-item fs-5 py-2 text-dark" href="{{ route("showsubproduct" ,$sub->id) }}">
                                {{ $sub->subcategory_name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


