<?php use App\Framework\Utilities\Session; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $this->asset('/css/public.css') ?>">
    <link rel="stylesheet" href="<?= $this->asset('/css/bootstrap-4.4.1/bootstrap.min.css') ?>">

    <script src="<?= $this->asset('/js/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= $this->asset('/js/bootstrap-4.4.1/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= $this->asset('/js/public.js') ?>"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

    <?php 
        $auth = Session::read('Auth');
        if ($auth) {
            if ($auth['role'] == 'admin') {
                $this->insert('layouts/bar/adminbar' ,['tab' => $tab]);
            } else {
                $this->insert('layouts/bar/loginbar' ,['tab' => $tab]);
            }
        } else {
            $this->insert('layouts/bar/menubar' ,['tab' => $tab]);
        }
    ?>



    <div class="container">
        <?= $this->section('content') ?>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->

</body>
</html>