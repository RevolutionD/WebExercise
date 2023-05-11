<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-9">
        <form action="/admin/search_issue_history{{$user_id}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="book_name" placeholder="Search User Issued History">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-9">
        @if (count($issued_books) == 0) 
            <div class="alert alert-danger" role="alert">
                User not issued any book.
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Book Name</th>
                        <th>Issued Date</th>
                        <th>Due Date</th>
                        <th>Returned Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issued_books as $row) 
                        <tr> 
                            <td>{{$row->id}}</td>
                            <td>{{$row->student_id}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{$row->name}}</td>
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
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>