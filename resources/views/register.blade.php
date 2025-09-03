<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Bookworm Forest 🌿📚</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e7d3b1; /* soft warm beige */
            font-family: 'Georgia', serif;
        }
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #2b1d14; /* dark brown */
        }
        .form-container {
            background: #d9b99b; /* light brown form container */
            border: 2px solid #c79a7c; /* slightly darker brown border */
            border-radius: 12px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 6px 14px rgba(0,0,0,0.15);
            color: #2b1d14; /* dark brown text */
        }
        .form-label {
            font-weight: 600;
            color: #2b1d14; /* dark brown */
        }
        .form-control {
            border: 1px solid #c79a7c;
            border-radius: 6px;
            background-color: #f0e0d6; /* very light brown */
            color: #2b1d14; /* dark brown text */
        }
        .form-control:focus {
            border-color: #a67854;
            box-shadow: 0 0 6px rgba(166,120,84,0.4);
        }
        .btn-register {
            background-color: #b48863; /* warm brown button */
            color: #2b1d14; /* dark brown text */
            font-weight: 600;
            border-radius: 6px;
            padding: 10px 22px;
            border: none;
            transition: all 0.25s ease-in-out;
        }
        .btn-register:hover {
            background-color: #a06f4e;
            transform: translateY(-2px);
        }
        .small-text {
            font-size: 0.9rem;
            color: #2b1d14; /* dark brown */
        }
        a {
            color: #2b1d14;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="form-container text-center">
        <h2 class="mb-4">🌿NEW in this forest?Let's find a place for you home!!📚</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="name" class="form-label">👤 Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>

            <div class="mb-3 text-start">
                <label for="email" class="form-label">📧 Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">🔒 Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">🔑 Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-register w-100 mt-3">🌱 Register</button>

            <p class="mt-3 small-text">
                Already have your HOME, your SAFEPLACE? <a href="{{ route('login') }}">find your HOME here</a>
            </p>
        </form>
    </div>
</body>
</html>
