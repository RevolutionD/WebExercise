<script>
    function searchUser(username) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("user-info").innerHTML = this.responseText;
            }
        };
        xhr.open("POST", "../api/search-user.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username=" + username);
        console.log(username);
    }
</script>
<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">Issue New Book Form</div>
            <div class="card-body">
                <form action="" method="post" role="form">
                    <div class="my-3">
                        <label for="user" class="form-label" oninput="searchUser(this.value)">User Name / ID :</label>
                        <input type="text" class="form-control shadow-sm" name="user-info" id="user" placeholder="Input User Name or ID" required>
                    </div>
                    <div class="my-3">
                        <label for="book" class="form-label">Book title:</label>
                        <input type="text" class="form-control shadow-sm" name="book-info" id="book" placeholder="Input Book Title" required>
                    </div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">Issue Book</button>
                </form>
            </div>
        </div>
    </div>
</div>