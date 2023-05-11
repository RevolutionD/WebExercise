<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-8">
        <form action="/admin/search_category" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="category_name" placeholder="Search Category">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        @if (count($categories) == 0) 
            <div class="alert alert-danger" role="alert">
                Category not found!
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                @if($row->status == 1)
                                    <div><span class='badge bg-success'>Active</span></div>
                                @else
                                    <div><span class='badge bg-danger'>Inactive</span></div> 
                                @endif
                            </td>
                            <td>{{$row->create_at}}</td>
                            <td>{{$row->update_at}}</td>
                            <td>
                                <a href='add_category{{$row->id}}' class='btn btn-sm bg-info text-white'>Edit</a>
                                <a href='delete_category{{$row->id}}' class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>