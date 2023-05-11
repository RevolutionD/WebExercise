<!-- CONTENT -->
<!-- List issue book -->
<div class="row justify-content-center">
    <div class="col-9">
        <form action="/admin/search_issue" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="issue_name" placeholder="Search issue">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        @if (count($issues) == 0) 
            <div class="alert alert-danger" role="alert">
                issues not found!
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Book Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{$row->book_name}}</td>
                            <td>{{$row->issue_date}}</td>
                            <td>{{$row->due_date}}</td>
                            <td>
                                @if($row->return_date != "")
                                    {{$row->return_date}}
                                @elseif(date('Y-m-d', strtotime(date('Y-m-d'))) > date('Y-m-d', strtotime($row->due_date)))
                                    <span class="badge bg-danger">Late</span>
                                @else
                                    <span class="badge bg-warning">Not return</span>
                                @endif
                            <td>
                                @if($row->return_date == "")
                                    <a href='list_issue.php?return_id=$row->id' class='btn btn-sm btn-success'>Return</a>
                                @endif
                            </td>

                        </tr> 
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>