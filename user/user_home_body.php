<div class="row justify-content-center">
    <div class="col-9">
        <div class="row justify-content-between mt-5">
            <div class="col-3 border border-info-subtle rounded text-center text-info-emphasis py-3">
                <i class="fa fa-book fa-5x"></i>
                <h3><?php echo $books->total_books; ?></h3>
                <p>Books</p>
            </div>
            <div class="col-3 border border-success rounded text-center text-success py-3">
                <i class="fa fa-recycle fa-5x"></i>
                <h3><?php echo $issues->total_not_return; ?></h3>
                <p>Book not returned</p>
            </div>
            <div class="col-3 border border-info-subtle rounded text-center text-info-emphasis py-3">
                <i class="fa fa-book fa-5x"></i>
                <h3><?php echo $issued->total_issued; ?></h3>
                <p>Book issued</p>
            </div>
        </div>

    </div>
</div>