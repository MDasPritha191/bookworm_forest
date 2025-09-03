<h2>Admin Dashboard</h2>
<a href="{{ route('admin.reports') }}" class="btn btn-primary">View Reports</a>

<h4>All Books</h4>
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
                <button>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<h4>All Users</h4>
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
                <button>Delete</button>
            </form>
            @else
            Current Admin
            @endif
        </td>
    </tr>
    @endforeach
</table>
