<div class="col-md-4 mx-auto pt-5">
    <h3>Kirjaudu</h3>
    <form action="/login/check">
        <div class="col-12">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="user" placeholder="Enter username" maxlength="30">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" name="password" type="password" placeholder="Enter password" maxlength="30">
        </div>
        <div class="row pl-3 pr-3">
            <div class="mr-auto">
                <button class="btn btn-primary">Login</button>
            </div>
            <div class="ml-auto">
                <?= anchor('login/registeration', 'Register') ?>
            </div>
        </div>
</div>
</form>