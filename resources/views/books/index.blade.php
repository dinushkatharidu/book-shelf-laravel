<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shelf - Dinushka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-primary fw-bold">My Books Shelf 📚</h1>
                    <a href="/books/create" class="btn btn-success shadow-sm">+ Add New Book</a>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4">Title</th>
                                    <th>Author</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allBooks as $book)
                                    <tr>
                                        <td class="ps-4 fw-semibold">{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-info">Edit</button>
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($allBooks->isEmpty())
                            <div class="py-5 text-center text-muted">
                                <p class="mb-0">No any book found yet. Click "Add New Book" to start! 🚀</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
