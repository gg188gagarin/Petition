<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
<?php if ($step == 1) { ?>
    <form action="<?= base_url('/login/forgot') ?>" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter your email"
                <?php if (!empty($email)) { ?>
                    value="<?= $email ?>"
                <?php } ?>>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Receive security code</button>
        </div>
        <br>
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $field => $error) { ?>
                    <p><?= $error ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </form>
    <?php if (!empty(session()->getFlashdata('fail'))) { ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php } ?>
<?php } elseif ($step == 2) { ?>
    <form action="<?= base_url('/login/forgot/check') ?>" method="post">
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" name="security_code" placeholder="Enter received security code"
                <?php if (!empty($email)) { ?>
                    value="<?= $email ?>"
                <?php } ?>>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Send security code</button>
        </div>
        <br>
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $field => $error) { ?>
                    <p><?= $error ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </form>
    <?php if (!empty(session()->getFlashdata('fail'))) { ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php } ?>

<?php } ?>
<?php $this->endSection() ?>
