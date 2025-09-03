<!DOCTYPE html>
<html>
<head>
    <title>🍃 Edit Profile | Bookworm Forest 📚</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f0e6; /* soft beige */
            color: #3e2f1c; /* dark brown text */
            font-family: "Georgia", serif;
        }
        .card {
            background-color: #fdfaf5; /* very light beige */
            border-radius: 20px;
            border: 2px solid #d6c9b6; /* soft warm border */
        }
        h2 {
            color: #3e2f1c;
            font-weight: bold;
        }
        label {
            color: #3e2f1c;
            font-weight: 500;
        }
        .form-control {
            border-radius: 12px;
            border: 1px solid #c8b89d;
        }
        .btn-primary {
            background-color: #8b6f47; /* warm brown */
            border: none;
            border-radius: 12px;
        }
        .btn-primary:hover {
            background-color: #6d5435;
        }
        .btn-secondary {
            background-color: #a3b18a; /* soft warm green */
            border: none;
            border-radius: 12px;
        }
        .btn-secondary:hover {
            background-color: #7c8f65;
        }
        .alert-success {
            background-color: #e3f2e1;
            color: #2f4f2f;
            border-radius: 10px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 420px;">
        <h2 class="text-center mb-4">🌿 Edit Profile 🌸</h2>

        @if(session('success'))
            <div class="alert alert-success">✨ {{ session('success') }} ✨</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="mb-3">
                <label>👤 Name</label>
                <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
            </div>
            <div class="mb-3">
                <label>📧 Email</label>
                <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
            </div>
            <div class="mb-3">
                <label>🔑 New Password (leave blank to keep current)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label>✅ Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">🌼 Update Profile</button>
        </form>
        <a href="{{ route('profile') }}" class="btn btn-secondary w-100 mt-2">🍂 Cancel</a>
    </div>

</body>
</html>
