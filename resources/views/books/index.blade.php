<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shelf - Dinushka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/books">📚 My BookShelf</a>

            <div class="d-flex align-items-center">
                <span class="text-white me-3">Hi, {{ Auth::user()->name }}!</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary fw-bold">My Books Shelf 📚</h1>
            <a href="/books/create" class="btn btn-success shadow-sm">+ Add New Book</a>
        </div>
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBooks as $book)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $book->id }}</td>
                                <td class="fw-semibold">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>

                                <td class="text-center">
                                    <a href="/books/{{ $book->id }}/edit" class="btn btn-sm btn-outline-info me-2">
                                        Edit
                                    </a>
                                    <form action="/books/{{ $book->id }}/delete" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are You Sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($allBooks->isEmpty())
                    <div class="py-5 text-center text-muted">
                        <p>No any book found yet. Click "Add New Book" to start! 🚀</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const alert = document.querySelector('.alert');

            if (alert) {

                setTimeout(function() {

                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 10000);
            }
        });
    </script>


</body>

</html>
