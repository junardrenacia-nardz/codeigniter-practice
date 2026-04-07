<span class="text-center"><?= validation_errors(); ?></span>

<form action="<?= base_url() . 'users/login' ?> " method="post">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center"><?= $title ?></h1>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button class="btn btn-primary mt-3" type="submit">Submit</button>
        </div>
    </div>

</form>