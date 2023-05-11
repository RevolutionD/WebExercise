<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-9">
        <form action="/admin/search_book" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="book_name" placeholder="Search Book">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-10">
        @if (count($books) == 0) 
        <div class="alert alert-danger" role="alert">
            Books not found!
        </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td><img src="{{asset('storage/images/'.$row->image)}}" width='100px' height='100px'></td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->author_name}}</td>
                            <td>
                                {{$row->quantity ? $row->quantity : 'Out of stock'}}
                            </td>
                            <td>{{$row->price}}</td>
                            <td>
                                <a href='add_book{{$row->id}}' class='btn btn-sm btn-info text-white'>Edit</a>
                                <a href='delete_book{{$row->id}}' class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>