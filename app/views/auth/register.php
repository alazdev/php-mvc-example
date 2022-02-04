<?php include(__DIR__.'/layouts/header.php'); ?>


<div class="layout-login-centered-boxed__form card">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
        <a href="<?= BASEURL; ?>/index" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
            <!-- <img class="navbar-brand-icon mr-0 mb-2" src="" width="100%" alt="an image"> -->
            <h1>Sign Up</h1>
        </a>
        <p class="m-0">Welcome to <?= APP_NAME ?></p>
    </div>
    
    <?php if($data){ ?>
    <div class="alert alert-soft-<?= $data['type']; ?> d-flex" role="alert">
        <div class="text-body"><?= $data['desc']; ?></div>
    </div>
    <?php } ?>
    
    <form action="<?= BASEURL ?>register" method="POST">
        <div class="form-group">
            <label class="text-label" for="name">Name:</label>
            <div class="input-group input-group-merge">
                <input id="name" name="name" type="text" required="" class="form-control form-control-prepended" placeholder="John Doe">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-user"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="text-label" for="email">Email:</label>
            <div class="input-group input-group-merge">
                <input id="email" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="john@doe.com">
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
                <input id="password" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Masukkan Password">
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
        <div class="form-group text-center">
            <button class="btn btn-primary mb-2" type="submit">Sign Up</button><br>
            <a class="text-body text-underline" href="<?= BASEURL ?>login">Have an account? Login</a>
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