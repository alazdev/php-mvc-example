<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting...</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- App CSS -->
    <link type="text/css" href="<?= ASSET ?>css/app.css" rel="stylesheet">
    <link type="text/css" href="<?= ASSET ?>css/app.rtl.css" rel="stylesheet">

    <!-- Sweetalert2 -->
    <script src="<?= ASSET ?>js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= ASSET ?>css/sweetalert2.min.css">
    <style>
        html, body {
            height: 99%;
        }
        body {
            display: flex; /* establish flex container */
            justify-content: center; /* center flex items horizontally, in this case */
            align-items: center; /* center flex items vertically, in this case */
        }
    </style>
</head>
<body>

    <h5><a href="<?= BASEURL ?>">redirected...</a></h5>
    
    <script>
        <?php if (isset($data['type'])) { ?>
        Swal.fire({
            title: '<?=$data['title']?>',
            text: '<?=$data['desc']?>',
            icon: '<?=$data['type']?>',
            confirmButtonText: 'Ok'
        }).then((result) => {
            location.href = '<?= BASEURL . $data['url'] ?>';
        })
        <?php } ?>
    </script>
    
    <!-- jQuery -->
    <script src="<?= ASSET ?>vendor/jquery.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?= ASSET ?>vendor/dom-factory.js"></script>

    <!-- Bootstrap -->
    <script src="<?= ASSET ?>vendor/popper.min.js"></script>
    <script src="<?= ASSET ?>vendor/bootstrap.min.js"></script>

    <!-- App -->
    <script src="<?= ASSET ?>js/app.js"></script>
</body>
</html>