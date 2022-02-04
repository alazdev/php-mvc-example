<?php include(__DIR__.'/layouts/header.php'); ?>

<div class="layout-login-centered-boxed__form card">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
        <a href="<?= BASEURL; ?>/index" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
            <!-- <img class="navbar-brand-icon mr-0 mb-2" src="" width="100%" alt="an image"> -->
            <h1>Reset Password</h1>
        </a>
    </div>
    
    <?php if($data){ if(isset($data['type'])){ ?>
    <div class="alert alert-soft-<?= $data['type']; ?> d-flex" role="alert">
        <div class="text-body"><?= $data['desc']; ?></div>
    </div>
    <?php } }?>

    <form action="<?= BASEURL; ?>reset/reset/<?=$data['email']?>/<?=$data['password']?>" method="POST">
        <input type="hidden" name="email" value="<?=$data['email']?>">
        <div class="form-group">
            <label class="text-label" for="new-password">New Password:</label>
            <div class="input-group input-group-merge">
                <input id="new-password" type="password" required="" name="npw" class="form-control form-control-prepended" placeholder="New Password...">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-key"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="text-label" for="confirm-password">Confirm New Password:</label>
            <div class="input-group input-group-merge">
                <input id="confirm-password" type="password" required="" name="cpw" class="form-control form-control-prepended" placeholder="Confirm New Password">
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
            <button class="btn btn-block btn-primary" type="submit">Update</button>
        </div>
        <div class="form-group text-center">
            <a class="text-body text-underline" href="<?= BASEURL ?>login">Login!</a> 
        </div>
    </form>
</div>
<script>
    function hidePassword() {
        var x = document.getElementById("new-password");
        var y = document.getElementById("confirm-password");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>

<?php include(__DIR__.'/layouts/footer.php'); ?>