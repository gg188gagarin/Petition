<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
    <form action="<?= base_url('/login') ?>" method="post">
        <div class="form-group"  style="padding-top: 1em">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter your email"
                <?php if (!empty($data)) { ?>
                    value="<?= $data['email'] ?>"
                <?php } else { ?>
                   value="<?= old('email') ?>">
            <?php } ?>
        </div>
        <div class="form-group"  style="padding-top: 1em">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group"  style="padding-top: 1em">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
            <a href="<?= base_url('/register') ?>" style="padding-left: 17.5em">Have no account, create new one</a>
        </div>

        <?php if (!empty($errors)) { ?>
            <br>
            <div class="alert alert-danger">
                <?php foreach ($errors as $field => $error) { ?>
                    <p><?= $error ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </form>
<?php if (! empty(session()->getFlashdata('fail'))) { ?>
    <br>
    <a href="<?= base_url('/login/forgot') ?>">Forgot password?</a>
    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
<?php } ?>
<?php $this->endSection() ?>