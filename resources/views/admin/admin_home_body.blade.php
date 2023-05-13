<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-between mt-5">
            <a class="col-3 border border-info-subtle rounded text-center text-info-emphasis py-3 text-decoration-none" href="list_book">
                <i class="fa fa-book fa-5x"></i>
                <h3>{{$books}}</h3>
                <p>Books</p>
            </a>
            <a class="col-3 border border-success rounded text-center text-success py-3 text-decoration-none" href="list_issue">
                <i class="fa fa-recycle fa-5x"></i>
                <h3>{{$books_not_return}}</h3>
                <p>Book not returned</p>
            </a>
            <a class="col-3 border border-primary-subtle rounded text-center text-primary-emphasis py-3 text-decoration-none" href="list_user">
                <i class="fa fa-users fa-5x"></i>
                <h3>{{$users}}</h3>
                <p>User</p>
            </a>
        </div>

        <div class="row justify-content-around mt-5">
            <a class="col-3 border border-success rounded text-center text-success py-3 text-decoration-none" href="list_author">
                <i class="fa fa-user fa-5x"></i>
                <h3>{{$authors}}</h3>
                <p>Authors</p>
            </a>
            <a class="col-3 border border-danger-subtle rounded text-center text-danger-emphasis py-3 text-decoration-none" href="list_category">
                <i class="fa fa-list-alt fa-5x"></i>
                <h3>{{$categories}}</h3>
                <p>Categories</p>
            </a>
        </div>
    </div>
</div>