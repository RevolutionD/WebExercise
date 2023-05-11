<script type="text/javascript">

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
        xhttp.open("GET", "/admin/search_user" + value, true);
        xhttp.send();
    }

    function searchBook() {
        var value = document.getElementsByName("book-info")[0].value;
        if(value == "") {
            document.getElementById("books").innerHTML = "";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById("books").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "/admin/search_book" + value, true);
        xhttp.send();
    }
</script>
<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header bg-info-subtle">Issue New Book Form</div>
            <div class="card-body">
                <form action="/admin/add_issue" method="post" role="form">
                    @csrf
                    <div class="my-3">
                        <label for="user-input" class="form-label">User Name / ID :</label>
                        <input type="text" class="form-control shadow-sm" name="user-info" id="user-input" placeholder="Input User Name or ID" oninput="searchUser()" required>
                    </div>
                    <div id="user"></div>
                    <div class="my-3">
                        <label for="book" class="form-label">Book name:</label>
                        <input type="text" class="form-control shadow-sm" name="book-info" id="book" placeholder="Input Book Name" oninput="searchBook()" required>
                    </div>
                    <div id="books"></div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">Issue Book</button>
                </form>
            </div>
        </div>
    </div>
</div>