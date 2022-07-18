<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
<h1 style="color: #86b7fe">Hi, <?= $user['firstname']; ?>! <a href="<?= base_url('petition/create') ?>" style="color: #f6d7da">Here</a> you can create petition. And
    <a href="<?= base_url('dashboard/petitions') ?>" style="color: #f6d7da">here</a> you can see your petitions with its statuses.</h1>
<?php $this->endSection() ?>

