<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">
                {{isset($author) && $author != null ? "Update Author Form" : "Add Author Form"}}
            </div>
            <div class="card-body">
                <form action="/admin/add_author{{isset($id) ? $id : ''}}" method="post" role="form">
                    @csrf
                    <div class="my-3">
                        <label for="author" class="form-label">Author Name:</label>
                        <input type="text" class="form-control shadow-sm" name="author" id="author" placeholder="Enter author name" value="{{isset($author) && $author != null ? $author->name : ''}}" required>
                    </div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">
                        {{isset($author) && $author != null ? "Update Author" : "Add Author"}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>