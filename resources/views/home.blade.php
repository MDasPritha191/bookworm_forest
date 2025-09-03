<!DOCTYPE html>
<html>
<head>
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">My Laravel App</a>
            <a class="btn btn-outline-light" href="/">Back</a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center mb-4">All Books</h2>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <form method="GET" action="{{ route('home') }}" class="row">
                    <div class="col-md-4">
                        <select name="genre" class="form-select">
                            <option value="">All Genres</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                                    {{ $genre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control"
                               placeholder="Search by title or author..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @if($books->isEmpty())
                <p class="text-center text-muted">No books found.</p>
            @else
                @foreach($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                                <p><strong>Rating:</strong> {{ $book->rating }}/5</p>

                                {{-- Displays the comment and quote directly from the books table --}}
                                @if($book->comment)
                                    <p class="card-text"><small><strong>Comment:</strong> {{ $book->comment }}</small></p>
                                @endif
                                @if($book->quote)
                                    <p class="card-text"><small><strong>Quote:</strong> <em>"{{ $book->quote }}"</em></small></p>
                                @endif
                            </div>
                           <div class="card-footer d-flex justify-content-between align-items-center">
    <small class="text-muted">Posted by {{ $book->member->name ?? 'Unknown' }}</small>
    <div>
        <a href="{{ route('book.comments', $book->id) }}" class="btn btn-sm btn-primary">Comments</a>
        <a href="{{ route('book.quotes', $book->id) }}" class="btn btn-sm btn-secondary">Quotes</a>
        <a href="{{ route('reports.create', $book->id) }}" class="btn btn-sm btn-danger">Report</a>
        </div>
    </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>