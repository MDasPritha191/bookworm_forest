<!DOCTYPE html>
<html>
<head>
    <title>Quotes - {{ $book->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f9eb, #d7f3a8); /* soft yellowish-green gradient */
            font-family: 'Georgia', serif;
            color: #2b3a2b; /* dark green text */
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #3b5d3b; /* earthy green */
            margin-bottom: 2rem;
        }
        .alert-success {
            background-color: #c8e6c9;
            color: #2b4d2b;
            border: none;
        }
        .card {
            background-color: #e6f2d1; /* soft light green */
            border: 1px solid #b6d7a8;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            padding: 12px 16px;
            font-size: 1rem;
        }
        .card strong {
            color: #2b4d2b;
        }
        .container {
            background: transparent; /* make container transparent */
        }
        textarea.form-control {
            border-radius: 8px;
            border: 1px solid #b6d7a8;
            background-color: #f0f9e6;
            color: #2b3a2b;
            padding: 10px;
            font-size: 1rem;
        }
        textarea.form-control:focus {
            border-color: #7fa878;
            box-shadow: 0 0 6px rgba(127,168,120,0.3);
        }
        .btn-post {
            background-color: #7fa878; /* leafy green button */
            color: #f6f1e8; /* cream text */
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.25s ease-in-out;
        }
        .btn-post:hover {
            background-color: #6f9e6e;
            transform: translateY(-2px);
        }
        form {
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2> 📒🖊️📑Quotes for {{ $book->name }}📑🖊️📒</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($book->quotes as $quote)
        <div class="card">
            <strong>{{ $quote->member->name ?? 'Unknown' }}:</strong> "{{ $quote->quote }}"
        </div>
    @endforeach

    <form action="{{ route('book.quotes.store', $book->id) }}" method="POST">
        @csrf
        <textarea name="quote" class="form-control" rows="2" placeholder="Add a quote" required></textarea>
        <button type="submit" class="btn btn-post mt-2">🌱 Post Quote</button>
    </form>
</div>

</body>
</html>
