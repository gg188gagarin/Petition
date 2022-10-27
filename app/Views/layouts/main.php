<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link href="<?= base_url("/css/main.css") ?>" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--    <script src="/js/script.js"></script>-->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/js/base.js"></script>
    <script src="/js/petition.js"></script>
</head>
<body class="bg-light bg-opacity-10">
<?php if (!empty(session()->get('user'))) { ?>
    <?= $this->include('layouts/header'); ?>
    <main>
        <section class="container-sm mt-4">
            <div class="row">
                <div class="col-2 d-none d-lg-block border-end " style="border-color: rgba(239,242,245,0.48)">
                    <div>
                        <?= $this->include('/petition/sidebars/left_sidebar'); ?>
                    </div>
                </div>
                <div class="col-10">
                    <div class="col container me-3">
                        <?php $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php } else { ?>
    <div>
        <?php $this->renderSection('login') ?>
        <?php $this->renderSection('content') ?>
    </div>
<?php } ?>

</body>
</html>

