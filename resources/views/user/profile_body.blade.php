<div class="row justify-content-center">
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-danger-subtle">My Profile</div>
            <div class="card-body">
                <form action="/user/update" method="post">
                    @csrf
                    @if($user->student_id != null) 
                        <p><strong>Student id:</strong> {{$user->student_id}}</p>
                    @endif
                    <p><strong>Register date:</strong> {{$user->create_at}}</p>
                    <p><strong>Last update:</strong> {{$user->update_at}}</p>
                    <div class="my-3">
                        <label for="name" class="form-label">Input Full Name:</label>
                        <input class="form-control shadow-sm" name="full_name" value="{{$user->full_name}}" required>
                    </div>
                    <div class="my-3">
                        <label for="phone" class="form-label">Input Phone Number:</label>
                        <input type="number" class="form-control shadow-sm" name="phone" value="{{$user->phone}}" required>
                    </div>
                    <div class="my-3">
                        <label for="email" class="form-label">Input Email:</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                    </div>
                    <button class="btn btn-danger text-white" type="submit" name="btn_update" value="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>