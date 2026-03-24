<h1>My Books Shelf</h1>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
    </tr>
    @foreach ($allBooks as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
        </tr>
    @endforeach
</table>

@if ($allBooks->isEmpty())
    <p>No Any book found yet</p>
@endif
