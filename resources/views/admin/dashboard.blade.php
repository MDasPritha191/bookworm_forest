<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #76afac; /* soft minty green background */
            font-family: "Georgia", serif;
            color: #1b3d3d; /* deep sea green text */
            padding: 30px;
        }

        h2, h4 {
            color: #20665d; /* stronger sea green headings */
            margin-bottom: 20px;
        }

        a.btn-primary {
            background-color: #3ba98e; /* medium seagreen button */
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 30px;
        }

        a.btn-primary:hover {
            background-color: #167272; /* darker seagreen */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        th {
            background-color: #66cdaa; /* seagreen header */
            color: #103333;
            font-weight: bold;
            padding: 12px;
            text-align: center;
        }

        td {
            background-color: #f0fdfc; /* very light mint row */
            color: #1b3d3d;
            padding: 12px;
            text-align: center;
        }

        tr:nth-child(even) td {
            background-color: #d9f5f3; /* alternate soft aqua row */
        }

        tr:hover td {
            background-color: #c0ebe6; /* gentle hover seafoam */
        }

        button {
            background-color: #3cb371; /* medium seagreen */
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
            font-weight: 500;
        }

        button:hover {
            background-color: #2e858b;
        }

        form {
            display: inline; /* keeps delete button inline */
        }
    </style>
</head>
<body>

<h2>🌊 Admin Dashboard 🌿</h2>
<a href="{{ route('admin.reports') }}" class="btn btn-primary">📑 View Reports</a>

<h4>📚 All Books</h4>
<table>
    <tr>
        <th>Title</th><th>Author</th><th>Posted By</th><th>Action</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->name }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->member->name ?? 'Unknown' }}</td>
        <td>
            <form action="{{ route('admin.deleteBook', $book->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>🗑 Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<h4>👤 All Users</h4>
<table>
    <tr>
        <th>Name</th><th>Email</th><th>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->id != session('member_id'))
            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>🗑 Delete</button>
            </form>
            @else
            🌟 Current Admin
            @endif
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
