<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $data['subject'] }}</title>
</head>
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
<body style="font-family:Arial, sans-serif; line-height:1.6; background:#f5f5f5; padding:20px;">

<div style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">

    <h2>Hello {{ $user->name ?? 'User' }},</h2>

    <p>{{ $data['message'] }}</p>

    <p>Best regards,<br>
    {{ config('app.name') }} Team</p>




                <div class="card-footer text-center text-muted">
                    {{ date('D/M/Y') }} | {{ config('app.name') }}
                </div>
</div>
</body>
</html>
