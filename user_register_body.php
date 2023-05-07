<div class="row justify-content-center mt-3">
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-danger-subtle text-danger-emphasis">USER REGISTER FORM</div>
            <div class="card-body">
                <form action="" role="form" method="post">
                    <div class="my-3">
                        <label class="form-label" for="full_name">Full name <sup class="text-danger">(*)</sup>:</label>
                        <input id="full_name" class="form-control shadow-sm" name="full_name" placeholder="Input your full name" required>
                    </div>
                    <div class="my-3">
                        <label class="form-label" for="stu_id">Student ID:</label>
                        <input id="stu_id" class="form-control shadow-sm" name="student_id" placeholder="Input your student id">
                    </div>
                    <div class="my-3">
                        <label class="form-label" for="email">Email <sup class="text-danger">(*)</sup>:</label>
                        <input id="email" class="form-control shadow-sm" name="email" placeholder="Input your email" type="email" required>
                    </div>
                    <div class="my-3">
                        <label class="form-label" for="phone">Phone <sup class="text-danger">(*)</sup>:</label>
                        <input id="phone" class="form-control shadow-sm" name="phone" placeholder="Input your phone" type="number" required>
                    </div>
                    <div class="my-3">
                        <label for="username" class="form-label">Username <sup class="text-danger">(*)</sup>:</label>
                        <input id="username" class="form-control shadow-sm" name="username" placeholder="Input your username" required>
                    </div>
                    <div class="my-3">
                        <label for="pass" class="form-label">Password <sup class="text-danger">(*)</sup>:</label>
                        <input id="pass" class="form-control shadow-sm" name="password" placeholder="Input your password" type="password" required>
                    </div>
                    <button type="submit" name="register" value="btn-register" class="btn btn-danger text-white">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>