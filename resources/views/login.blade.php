<!DOCTYPE html>
<html>
<head>
    <title>Login - Bookworm Forest 🌿📚</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #dff0d8, #a8d5a2); /* soft warm green gradient */
            font-family: 'Georgia', serif;
            color: #3b5d3b; /* readable green font */
        }
        .card {
            background-color: #e6f3e6; /* light green card */
            border: 2px solid #9bc9a3;
            border-radius: 12px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 6px 14px rgba(0,0,0,0.15);
            color: #3b5d3b; /* card text in green */
        }
        h2 {
            font-weight: bold;
            color: #4d7c4d; /* slightly darker green for heading */
        }
        label {
            font-weight: 600;
            color: #3b5d3b; /* green labels */
        }
        .form-control {
            border: 1px solid #9bc9a3;
            border-radius: 6px;
            background-color: #f6fff6; /* pale green inputs */
            color: #3b5d3b; /* input text in green */
        }
        .form-control:focus {
            border-color: #6f9e6e;
            box-shadow: 0 0 6px rgba(111,158,110,0.4);
        }
        .btn-login {
            background-color: #6f9e6e; /* leafy green button */
            color: #f6f1e8; /* cream text */
            font-weight: 600;
            border-radius: 6px;
            padding: 10px 22px;
            border: none;
            transition: all 0.25s ease-in-out;
        }
        .btn-login:hover {
            background-color: #5d865c;
            transform: translateY(-2px);
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border: none;
            border-radius: 6px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 text-center">
        <h2 class="mb-4">🌿 
            OH! it's been SOO LONG 🥹 Let's restart the adventure of books 📚</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3 text-start">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-login w-100">🔑 Login</button>
        </form>
    </div>
</body>
</html>

