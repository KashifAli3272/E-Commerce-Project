@include('user.Header')


<div class="container py-12">
    <h2 class="text-center mb-5"> Products</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100 border shadow-sm">
                <a href="{{ route('cartview', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         alt="{{ $product->product_name }}"
                         style="height: 200px; object-fit: cover;">
                </a>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('cartview', $product->id) }}" class="text-dark text-decoration-none">
                            {{ Str::limit($product->product_name, 40) }}
                        </a>
                    </h5>

                    <p class="card-text mb-3">
                        <strong>Rs {{ number_format($product->price, 2) }}</strong>
                        @if($product->old_price)
                        <span class="text-muted text-decoration-line-through small">Rs {{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-block">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include("user.Footer")
