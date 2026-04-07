<span class="text-center"><?= validation_errors(); ?></span>

<form action="<?= base_url() . 'users/register' ?> " method="post">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center"><?= $title ?></h1>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Zip Code</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password2" id="password2" class="form-control">
            </div>
            <button class="btn btn-primary mt-3" type="submit">Submit</button>
        </div>
    </div>

</form>