@include('user.Header')

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <form action="{{ route('updatecart') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <table class="table table-cart">
                                            <tbody>
                                                @foreach ($products as $id => $product)
                                                    <tr>
                                                        <td class="product-col">
                                                            <div class="product">
                                                                <figure class="product-media">
                                                                    <a href="#">
                                                                        <img src="{{ asset('storage/' . $product['image']) }}"
                                                                            alt="Product image">
                                                                    </a>
                                                                </figure>
                                                                <h3 class="product-title">
                                                                    <a href="#">{{ $product['name'] }}</a>
                                                                </h3>
                                                            </div>
                                                        </td>
                                                        <td class="price-col">RS: {{ $product['price'] }}</td>
                                                        <td class="quantity-col">
                                                            <input type="number"
                                                                name="quantities[{{ $id }}]"
                                                                class="form-control"
                                                                value="{{ $product['quantity'] }}" min="1"
                                                                max="10" step="1">
                                                        </td>
                                                        <td class="total-col">RS:
                                                            {{ $product['price'] * $product['quantity'] }}</td>
                                                        <td class="remove-col">
                                                            <a href="{{ route('cart.remove', $id) }}"
                                                                class="btn-remove"><i class="icon-close"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="cart-bottom">
                                            <button type="submit" class="btn btn-outline-dark-2">
                                                <span>UPDATE CART</span><i class="icon-refresh"></i>
                                            </button>
                                        </div>

                                    </form>


                                    <aside class="col-lg-6">

                                        <form action="{{ route('checkout.index') }} " method="POST">
                                            @csrf

                                        <div class="summary summary-cart">
                                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                            <table class="table table-summary">
                                                @php
                                                    $subtotal = 0;
                                                @endphp

                                                @foreach ($products as $product)
                                                    @php
                                                        $subtotal += $product['price'] * $product['quantity'];
                                                    @endphp
                                                @endforeach
                                                <tbody>
                                                    <tr class="summary-subtotal">
                                                        <td>Subtotal:</td>
                                                        <td> RS {{ number_format($subtotal) }}</h5>
                                                        </td>
                                                    </tr><!-- End .summary-subtotal -->


                                                    <tr class="summary-total">
                                                        <td>Total:</td>
                                                        <td>RS {{ number_format($subtotal) }}</td>
                                                    </tr><!-- End .summary-total -->
                                                </tbody>
                                            </table><!-- End .table table-summary -->

                                            <button type="submit"
                                                class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                                CHECKOUT</button>
                                        </div><!-- End .summary -->

                                        <a href="{{ route('items.index') }}" type="submit"
                                            class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                                SHOPPING</span><i class="icon-refresh"></i></a>
                                                </form>
                                    </aside><!-- End .col-lg-3 -->

                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .cart -->
                </div><!-- End .page-content -->
        </main><!-- End .main -->

       @include('user.Footer')
