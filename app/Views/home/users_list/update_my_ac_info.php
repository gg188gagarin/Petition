<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>

<div class="row">
    <div>
        <h1 class="bright_text"> Welcome to PERSONAL-page</h1>
        <?php $route_to = base_url('/home/update'); ?>
        <?php if (!empty($user)) {
            $route_to = route_to('Home::update/$1', $user['id']);
        } ?>

            <?= $this->include('home/users_list/update_user_info'); ?>
            <br>
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $field => $error) { ?>
                        <p><?= $error ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
    </div>
</div>
<?php $this->endSection() ?>
