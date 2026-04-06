<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow border-0">
                <div class="card-header bg-info text-white">
                    <h4>Edit Book 📝</h4>
                </div>
                <div class="card-body">
                    <form action="/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" value="{{ $book->title }}" class="form-control"
                                required>
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Author</label>
                            <input type="text" name="author" value="{{ $book->author }}" class="form-control"
                                required>
                            @error('author')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Book Cover</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-bold">Update Book</button>
                        <a href="/books" class="btn btn-link w-100 mt-2 text-decoration-none">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
