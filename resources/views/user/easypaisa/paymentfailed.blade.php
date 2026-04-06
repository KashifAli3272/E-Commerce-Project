<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
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
            color: #dc3545;
            margin-bottom: 15px;
        }
        .payment-card p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="payment-card">
        <h2>Payment Failed ❌</h2>
        <p>Oops! Something went wrong with your payment.</p>
        <p>Please try again or contact support if the problem persists.</p>
        <a href="{{ route('checkout.index') }}" class="btn btn-danger btn-lg btn-home">Retry Payment</a>
        <a href="{{ route('items.index') }}" class="btn btn-secondary btn-lg btn-home">Go Home</a>
    </div>

</body>
</html>
