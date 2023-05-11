<!-- TABLE -->
<div class="row justify-content-center">
    <div class="col-9">
        <form action="/user/search_issued_book" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control shadow-sm" name="book_name" placeholder="Search Book">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        @if (count($issued_books) == 0) 
            <div class="alert alert-danger" role="alert">
                Book issue infomation not found or user not issued any book!
            </div>
        @else
            <table class="table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Book Name</th>
                        <th>Issued Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issued_books as $row) 
                        <tr> 
                            <td>{{$row->name}}</td>
                            <td>{{$row->issue_date}}</td>
                            <td> 
                                {{($row->return_date == "" ? "Not return yet" : $row->return_date)}}
                            </td>
                        </tr>
                    @endforeach
            </table>
        @endif
    </div>
</div>