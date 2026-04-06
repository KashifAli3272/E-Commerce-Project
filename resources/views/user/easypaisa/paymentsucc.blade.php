<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-card {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-align: center;
            background-color: #fff;
        }
        .payment-card h2 {
            font-size: 2rem;
            color: #28a745;
            margin-bottom: 15px;
        }
        .payment-card p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .btn-home {
            margin-top: 20px;
        }
        .checkmark {
            font-size: 4rem;
            margin-bottom: 15px;
            color: #28a745;
        }
    </style>
</head>
<body>

    <div class="payment-card">
        <div class="checkmark">✅</div>
        <h2>Payment Successful</h2>
        <p>Your order has been placed successfully.</p>
        <p>Thank you for shopping with us! You will receive a confirmation email shortly.</p>
        <a href="{{ route('items.index') }}" class="btn btn-success btn-lg btn-home">Go to Home</a>
       <!-- <a href="#" class="btn btn-primary btn-lg btn-home">View Orders</a> -->
    </div>

</body>
</html>
