<!DOCTYPE html>
<html>
<head>
    <title>Quotes - {{ $book->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2>Quotes for {{ $book->name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($book->quotes as $quote)
        <div class="card mb-2">
            <div class="card-body">
                <strong>{{ $quote->member->name ?? 'Unknown' }}:</strong> "{{ $quote->quote }}"
            </div>
        </div>
    @endforeach

    <form action="{{ route('book.quotes.store', $book->id) }}" method="POST" class="mt-3">
        @csrf
        <textarea name="quote" class="form-control" rows="2" placeholder="Add a quote" required></textarea>
        <button type="submit" class="btn btn-secondary mt-2">Post Quote</button>
    </form>
</div>

</body>
</html>