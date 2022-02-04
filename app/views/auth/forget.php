<?php include(__DIR__.'/layouts/header.php'); ?>

<div class="layout-login-centered-boxed__form card">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
        <a href="<?= BASEURL ?>" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
            <!-- <img class="navbar-brand-icon mr-0 mb-2" src="" width="100%" alt="an image"> -->
            <h1>Forget Password</h1>
        </a>
    </div>
    
    <?php if($data){ ?>
    <div class="alert alert-soft-<?= $data['type']; ?> d-flex" role="alert">
        <div class="text-body"><?= $data['desc']; ?></div>
    </div>
    <?php } ?>

    <form action="<?= BASEURL; ?>forget" method="POST">
        <div class="form-group">
            <label class="text-label" for="email">Email:</label>
            <div class="input-group input-group-merge">
                <input id="email" type="email" required="" name="email" class="form-control form-control-prepended" placeholder="john@doe.com">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Reset</button>
        </div>
        <div class="form-group text-center">
            <a class="text-body text-underline" href="<?= BASEURL ?>login">Login!</a> &nbsp;
            <a class="text-body text-underline" href="<?= BASEURL ?>register">Sign Up!</a>
        </div>
    </form>
</div>

<?php include(__DIR__.'/layouts/footer.php'); ?>