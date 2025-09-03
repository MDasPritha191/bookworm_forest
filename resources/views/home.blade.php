<!DOCTYPE html>
<html>
<head>
    <title>All Books - Bookworm Forest 🌿📚</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(160deg, #dff0d8 10%, #a8d5a2 90%); /* soft warm green gradient */
            font-family: 'Georgia', serif;
            color: #3b5d3b; /* dark green text */
        }
        .navbar {
            background-color: #6f9e6e; /* leafy green navbar */
        }
        .navbar .navbar-brand, .navbar .btn-outline-light {
            color: #f6f1e8; /* cream text */
        }
        .navbar .btn-outline-light:hover {
            background-color: #5d865c;
            color: #f6f1e8;
        }
        h2 {
            font-weight: bold;
            color: #4d7c4d; /* moss green heading */
        }
        .form-select, .form-control {
            border: 1px solid #9bc9a3;
            border-radius: 6px;
            background-color: #f6fff6; /* very light green */
            color: #3b5d3b; /* dark green text */
        }
        .form-select:focus, .form-control:focus {
            border-color: #6f9e6e;
            box-shadow: 0 0 6px rgba(111,158,110,0.4);
        }
        .btn-primary {
            background-color: #6f9e6e; /* leafy green */
            color: #f6f1e8; /* cream text */
            border: none;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #5d865c;
        }
        .btn-secondary {
            background-color: #9bc9a3; /* soft green */
            color: #3b5d3b;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #85b07f;
        }
        .btn-danger {
            background-color: #5d865c; /* darker green */
            color: #f6f1e8;
            border: none;
        }
        .btn-danger:hover {
            background-color: #4a6f4b;
        }
        .card {
            background-color: #e1f0e1; /* pale green card */
            border: 2px solid #9bc9a3;
            border-radius: 12px;
            color: #3b5d3b;
        }
        .card-footer {
            background-color: #e1f0e1;
            border-top: 1px solid #9bc9a3;
        }
        .text-muted {
            color: #4d7c4d !important; /* muted dark green */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Bookworm Forest 🌿📚</a>
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
