<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Notification Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f6fa; padding:40px;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
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

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">{{ config('app.name') }} - Send Email</h4>
                </div>

                <div class="card-body">

                    <h5 class="card-title text-center">
                        Hello User,
                    </h5>

                    <p class="text-center text-muted">
                        Fill out the form below to send a notification email to the user.
                    </p>

                    <!-- Email Form -->
                    <form action="{{ route('sendemail') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter email subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Enter your message" required></textarea>
                        </div>

                        <div class="d-grid text-center mt-4">
                            <button type="submit" class="btn btn-success">Send Email</button>
                        </div>
                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    {{ date('D/M/Y') }} | {{ config('app.name') }}. All rights reserved.
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
