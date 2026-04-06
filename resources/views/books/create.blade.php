<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book - Book Shelf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white p-3">
                        <h4 class="mb-0">Add New Book 📖</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="/books" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                    placeholder="Enter book title">
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Author</label>
                                <input type="text" name="author" value="{{ old('author') }}" class="form-control"
                                    placeholder="Enter author name">
                                @error('author')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">Category</label>
                                <select name="category_id" id="category_id"
                                    class="form-select shadow-sm @error('category_id') is-invalid @enderror">
                                    <option value="" selected disabled>-- Select a Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Briefly describe the book"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Book Cover</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success fw-bold">Save Book</button>
                                <a href="/books" class="btn btn-outline-secondary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
