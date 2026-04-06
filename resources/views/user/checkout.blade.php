@include('user.Header')

        <main class="main ">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Checkout<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content  ">
                <form action="{{ route('order') }}" method="POST">
                    @csrf
                    <div class="checkout">
                        <div class="container">
                            <div class="checkout-discount">

                            </div><!-- End .checkout-discount -->

                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="first_name" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="last_name" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->


                                    <label>Country *</label>
                                    <input type="text" name="county" class="form-control" required>

                                    <label>Street address *</label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="House number and Street name" required>
                                    <input type="text" name="street_address" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State *</label>
                                            <input type="text" name="state" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" name="postcode" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input type="tel" name="phone" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Email address *</label>
                                    <input type="email" name="email" class="form-control" required>

                                    <!-- End .custom-checkbox -->




                                </div><!-- End .col-lg-9 -->
                                <aside class="col-lg-3">
                                    <div class="summary">
                                        <h3 class="summary-title">Your Order</h3>
                                        @php
                                        $subtotal = 0;
                                        // default free shipping
                                        @endphp

                                        <table class="table table-summary">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($cart as $id => $product)
                                                @php
                                                $itemTotal = $product['price'] * $product['quantity'];
                                                $subtotal += $itemTotal;
                                                @endphp

                                                <tr>
                                                    <td>
                                                        <a href="#">{{ $product['name'] }}</a>
                                                        × {{ $product['quantity'] }}
                                                    </td>
                                                    <td>RS {{ number_format($itemTotal, 2) }}</td>
                                                </tr>
                                                @endforeach

                                                <!-- Subtotal -->
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>RS {{ number_format($subtotal, 2) }}</td>
                                                </tr>

                                                <!-- Shipping -->
                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <input type="radio" name="shipping" value="0" checked>
                                                        Free Shipping
                                                    </td>
                                                    <td>RS 0</td>
                                                </tr>

                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <input type="radio" name="shipping" value="300">
                                                        Standard Shipping
                                                    </td>
                                                    <td>RS 300</td>
                                                </tr>

                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <input type="radio" name="shipping" value="500">
                                                        Express Shipping
                                                    </td>
                                                    <td>RS 500</td>
                                                </tr>

                                                <!-- Total -->
                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td>RS {{ number_format($subtotal + $shipping, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                </form>






<div class="card mb-3">
    <div class="card-header">
        <input type="radio" id="cod" name="payment_method" value="cash_on_delivery">
        <label for="cod">Cash On Delivery</label>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <input type="radio" id="easypaisa" name="payment_method" value="easypaisa">
        <label for="easypaisa">Pay with Easypaisa</label>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <input type="radio" id="jazzcash" name="payment_method" value="jazzcash">
        <label for="jazzcash">Pay with JazzCash</label>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <input type="radio" id="bank" name="payment_method" value="bank_transfer">
        <label for="bank">Pay with Bank</label>
    </div>
</div>

<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
    <span class="btn-text">Place Order</span>
    <span class="btn-hover-text">Proceed to Checkout</span>
</button>
            </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
    </form>
    </div><!-- End .container -->
    </div><!-- End .checkout -->
    </div><!-- End .page-content -->
    </form>
    </main><!-- End .main -->

    @include('user.Footer')
