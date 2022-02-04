<?php include(__DIR__.'/layouts/header.php'); ?>

<div class="layout-login-centered-boxed__form card">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
        <a href="<?= BASEURL ?>" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
            <!-- <img class="navbar-brand-icon mr-0 mb-2" src="" width="100%" alt="an image"> -->
            <h1>Login</h1>
        </a>
        <p class="m-0">Welcome to <?= APP_NAME ?></p>
    </div>
    
    <?php if($data){ ?>
    <div class="alert alert-soft-<?= $data['type']; ?> d-flex" role="alert">
        <div class="text-body"><?= $data['desc']; ?></div>
    </div>
    <?php } ?>
    <form action="<?= BASEURL ?>login" method="POST">
        <div class="form-group">
            <label class="text-label" for="email">Email:</label>
            <div class="input-group input-group-merge">
                <input id="email" type="email" required="" name="email" class="form-control form-control-prepended" placeholder="john@doe.com" value="<?= isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '' ?>">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="text-label" for="password">Password:</label>
            <div class="input-group input-group-merge">
                <input id="password" type="password" name="password" required="" class="form-control form-control-prepended" placeholder="Password..." value="<?= isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : '' ?>">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-key"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" onclick="hidePassword()" id="hide" checked>
                <label class="custom-control-label" for="hide">Hide password</label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
        </div>
        <div class="form-group text-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember" checked="" id="remember" <?= isset($_COOKIE['user_email']) ? 'checked' : '' ?>>
                <label class="custom-control-label" for="remember">Remember me</label>
            </div>
        </div>
        <div class="form-group text-center">
            <a href="<?= BASEURL ?>forget">Forget password?</a> <br>
            don't have an account? <a class="text-body text-underline" href="<?= BASEURL ?>register">Sign up</a>
        </div>
    </form>
</div>
<script>
    function hidePassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php include(__DIR__.'/layouts/footer.php'); ?>