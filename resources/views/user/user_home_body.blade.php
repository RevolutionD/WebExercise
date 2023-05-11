<div class="row justify-content-center">
    <div class="col-9">
        <div class="row justify-content-between mt-5">
            <div class="col-3 border border-info-subtle rounded text-center py-3">
                <a href="list_book" class="text-decoration-none text-info-emphasis">
                    <i class="fa fa-book fa-5x"></i>
                    <h3>{{$books}}</h3>
                    <p>Books</p>
                </a>
            </div>
            <div class="col-3 border border-success rounded text-center py-3">
                <a href="issued_book" class="text-decoration-none text-success">
                    <i class="fa fa-recycle fa-5x"></i>
                    <h3>{{$total_not_returns}}</h3>
                    <p>Book not returned</p>
                </a>
            </div>
            <div class="col-3 border border-info-subtle rounded text-center py-3">
                <a href="issued_book" class="text-decoration-none text-info-emphasis">
                    <i class="fa fa-book fa-5x"></i>
                    <h3>{{$total_issued_books}}</h3>
                    <p>Book issued</p>
                </a>
            </div>
        </div>

    </div>
</div>