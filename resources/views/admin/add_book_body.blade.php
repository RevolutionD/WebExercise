<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">
                {{isset($book) && $book != null ? "Update Book Form" : "Add Book Form"}}
            </div>
            <div class="card-body">
                <form action="/admin/add_book{{isset($id) ? $id : ''}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="name" class="form-label">Book Name:</label>
                        <input type="text" class="form-control shadow-sm" name="book_name" id="book" placeholder="Enter book name" value="{{isset($book) && $book != null ? "$book->name" : ""}}" required>
                    </div>
                    <div>
                        <label for="category" class="form-label">Category Name:</label>
                        <select name="category_id" id="category" class="form-select shadow-sm my-3" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category) 
                                <option value="{{$category->id}}" {{isset($book) && $book != null && $category->id == $book->category_id ? "selected" : ""}}>
                                    {{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="author" class="form-label">Author Name:</label>
                        <select name="author_id" id="author" class="form-select shadow-sm my-3" required>
                            <option value="">-- Select Author --</option>
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}" {{isset($book) && $book != null && $author->id == $book->author_id ? "selected" : ""}}>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control shadow-sm" name="quantity" id="quantity" placeholder="Enter quantity" value="{{isset($book) && $book != null ? "$book->quantity" : ""}}" required>
                    </div>

                    <div class="my-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control shadow-sm" name="price" id="price" placeholder="Enter price" value="{{isset($book) && $book != null ? "$book->price" : ""}}" required>
                    </div>

                    <div class="my-3">
                        <label for="image">Choose Image:</label>
                        <input type="file" name="image" id="image" class="form-control shadow-sm" {{isset($book) && $book != null ? '' : 'required'}}>
                    </div>

                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">
                        {{isset($book) && $book != null ? "Update Book" : "Add Book"}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>