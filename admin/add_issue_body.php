<script>
    function searchUser() {
        var value = document.getElementsByName("user-info")[0].value;
        if(value == "") {
            document.getElementById("user").innerHTML = "";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("user").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../api/search_user.php?user_info=" + value, true);
        xhttp.send();
    }

    function searchBook() {
        var value = document.getElementsByName("book-info")[0].value;
        if(value == "") {
            document.getElementById("book-info").innerHTML = "";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById("book-info").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../api/search_book.php?book_info=" + value, true);
        xhttp.send();
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
                        <label for="user-input" class="form-label">User Name / ID :</label>
                        <input type="text" class="form-control shadow-sm" name="user-info" id="user-input" placeholder="Input User Name or ID" oninput="searchUser()" required>
                    </div>
                    <div id="user"></div>
                    <div class="my-3">
                        <label for="book" class="form-label">Book name:</label>
                        <input type="text" class="form-control shadow-sm" name="book-info" id="book" placeholder="Input Book Name" oninput="searchBook()" required>
                    </div>
                    <div id="book-info"></div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">Issue Book</button>
                </form>
            </div>
        </div>
    </div>
</div>