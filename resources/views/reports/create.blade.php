<!DOCTYPE html>
<html>
<head>
    <title>Report Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7eb; /* soft neutral background to highlight green */
            font-family: "Georgia", serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .report-card {
            background-color: #f0f4e0; /* soft muted green for the card */
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 450px;
        }

        h2 {
            color: #556b2f; /* sad/rotten leaf green */
            text-align: center;
            margin-bottom: 2rem;
        }

        label {
            color: #6b8e23; /* darker muted green */
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #556b2f;
            border-radius: 12px;
            padding: 10px;
            margin-bottom: 1.5rem; /* more spacing between boxes */
            color: #3b4d2b;
            background-color: #fdfdf0;
        }

        .form-control:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 6px rgba(107,142,35,0.3);
        }

        .btn-submit {
            background-color: #6b8e23;
            color: #fdfaf0;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem; /* space between buttons */
        }

        .btn-submit:hover {
            background-color: #556b2f;
        }

        .btn-cancel {
            background-color: #c2d6a3;
            color: #3b4d2b;
            border-radius: 12px;
            width: 100%;
            padding: 12px;
            font-weight: 500;
        }

        .btn-cancel:hover {
            background-color: #a3b18a;
        }

        .footer-note {
            text-align: center;
            margin-top: 1.5rem;
            color: #556b2f;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="report-card">
    <h2>😔🍃 Report Book: {{ $book->name }} 🍂😞</h2>

    <form action="{{ route('reports.store', $book->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reason">💚 Reason for reporting</label>
            <textarea name="reason" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn-submit">😢 Send Report</button>
        <a href="{{ route('home') }}" class="btn-cancel">🌱 Cancel</a>
    </form>

    <p class="footer-note">
        🌿 We’re sorry you had to report something 😔. We’ll look into it carefully 🍂
    </p>
</div>

</body>
</html>

