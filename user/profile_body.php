<div class="row justify-content-center">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header bg-danger-subtle">My Profile</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <?php if($result->student_id != null) echo "<p><strong>Student id:</strong> $result->student_id</p>"; ?>
                                <p><strong>Register date:</strong> <?php echo "$result->create_at"?></p>
                                <p><strong>Last update:</strong> <?php echo "$result->update_at"?></p>
                                <div class="my-3">
                                    <label for="name" class="form-label">Input Full Name:</label>
                                    <input class="form-control shadow-sm" name="full_name" value="<?php echo "$result->full_name"?>" required>
                                </div>
                                <div class="my-3">
                                    <label for="phone" class="form-label">Input Phone Number:</label>
                                    <input type="number" class="form-control shadow-sm" name="phone" value="<?php echo "$result->phone"?>" required>
                                </div>
                                <div class="my-3">
                                    <label for="email" class="form-label">Input Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo "$result->email"?>" disabled>
                                </div>
                                <button class="btn btn-danger text-white" type="submit" name="btn_update" value="update">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>