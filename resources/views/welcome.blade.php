<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookworm Forest 📚🌿</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #c9ab89, #7fa878); /* beige to soft green */
            font-family: 'Georgia', serif;
            color: #2b1d14 !important; /* force dark brown globally */
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button {
            color: #2b1d14 !important; /* all text in dark brown */
        }
        h1 {
            font-size: 2.3rem;
            font-weight: bold;
            color: #2b1d14 !important; /* heading in dark brown */
        }
        .btn-custom {
            font-size: 1.1rem;
            padding: 10px 22px;
            border-radius: 6px;
            transition: all 0.25s ease-in-out;
            font-weight: 600;
        }
        .btn-register {
            background-color: #b48863; /* deeper beige */
            color: #2b1d14 !important;
            border: none;
        }
        .btn-register:hover {
            background-color: #a06f4e;
            transform: translateY(-2px);
        }
        .btn-login {
            background-color: #6f9e6e; /* warm forest green */
            color: #2b1d14 !important; /* dark brown text */
            border: none;
        }
        .btn-login:hover {
            background-color: #5d865c;
            transform: translateY(-2px);
        }
        .container-box {
            background: #f6f1e8; /* parchment beige */
            border-radius: 10px;
            padding: 35px;
            box-shadow: 0 6px 14px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container-box text-center">
        <h1 class="mb-4">📚✨ Hello, bookworm! 🌿 Welcome to Bookworm Forest 🍃</h1>

        <a href="{{ route('register') }}" class="btn btn-custom btn-register m-2">📝 Register</a>
        <a href="{{ route('login') }}" class="btn btn-custom btn-login m-2">🔑 Login</a>
    </div>
</body>
</html>
