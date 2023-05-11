<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-9">
        <form action="/admin/search_user" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="user_name" placeholder="Search User">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-10">
        @if (count($users) == 0) 
            <div class="alert alert-danger" role="alert">
                User not found!
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Account</th>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Create Date</th>
                        <th>Last Update</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->student_id}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->create_at}}</td>
                            <td>{{$row->update_at}}</td>
                            <td>
                            @if ($row->status == 1)
                                <div><span class='badge bg-success'>Active</span></div>
                            @else
                                <div><span class='badge bg-danger'>Blocked</span></div>
                            @endif 
                            </td>
                            <td>
                                @if($row->status == 1)
                                    <a href='list_user.php?id=$row->id' class='btn btn-sm btn-danger'>Inactive</a>
                                @else
                                    <a href='list_user.php?id=$row->id' class='btn btn-sm btn-success'>Active</a>
                                @endif                                                                        
                                <a href='user_issue_history{{$row->id}}' class='btn btn-sm btn-success'>Details</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>