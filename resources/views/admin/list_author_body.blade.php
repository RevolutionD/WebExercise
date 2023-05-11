<!-- CONTENT -->
<div class="row justify-content-center">
    
    <div class="col-8">
        <form action="/admin/search_author" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="author_name" placeholder="Search Author">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        @if (count($authors) == 0) 
            <div class="alert alert-danger" role="alert">
                Author not found!
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Author Name</th>
                        <th>Creation Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->create_at}}</td>
                            <td>{{$row->update_at}}</td>
                            <td>
                                <a href='add_author{{$row->id}}' class='btn btn-sm bg-info text-white'>Edit</a>
                                <a href='delete_author{{$row->id}}' class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>