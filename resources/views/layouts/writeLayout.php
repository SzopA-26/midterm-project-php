<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $this->asset('/css/public.css') ?>">
    <link rel="stylesheet" href="<?= $this->asset('/css/bootstrap-4.4.1/bootstrap.min.css') ?>">

    <script src="<?= $this->asset('/js/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= $this->asset('/js/bootstrap-4.4.1/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= $this->asset('/js/public.js') ?>"></script>
    <script src="<?= $this->asset('/js/write.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>


</head>
<body>

    <?= $this->insert('layouts/bar/loginbar', ['tab' => $tab]) ?>

    <div class="container">
        <?= $this->section('content') ?>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->

</body>
</html>


