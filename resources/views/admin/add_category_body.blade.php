<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">{{isset($category) && $category != null ? "Update Category Form" : "Add Category Form"}}</div>
            <div class="card-body">
                <form action="/admin/add_category{{isset($id) ? $id : ''}}" method="post" role="form">
                    @csrf
                    <div class="my-3">
                        <label for="category" class="form-label">Category Name:</label>
                        <input type="text" class="form-control shadow-sm" name="category" id="category" placeholder="Enter category name" value="{{isset($category) && $category != null ? "$category->name" : ""}}" required>
                    </div>
                    <div class="my-3">
                        <label for="status" class="form-label">Status:</label> <br>
                        <input type="radio" class="form-check-input" name="status" id="status" value="1" checked> Active <br>
                        <input type="radio" class="form-check-input" name="status" id="status" value="0"> Inactive
                    </div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">{{isset($category) && $category != null ? "Update Category" : "Add Category"}}</button>
                </form>
            </div>
        </div>
    </div>
</div>