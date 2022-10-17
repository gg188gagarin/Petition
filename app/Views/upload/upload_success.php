<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
<div class="mt-5">
<h3>Your file was successfully uploaded!</h3>


<?php if ($savedImage) {?>
<img class="m-5" src="<?= base_url('uploads/' . $savedImage['img_path'])?>">
<?php }?>
<p class="">
    <a href="<?= base_url('/upload/upload/'. $user_id) ?>">
        <button type="submit" class="btn btn-dark header_btn_color mt-5">
            Upload Another File!
        </button>
    </a>
    <?php $isadmin = session()->get('user')['is_admin'] ?>
    <?php if ($isadmin === '1') { ?>
    <a href="<?= base_url('/admin_panel/'.$user_id) ?>" class="p-5">
        <?php } else {?>
        <a href="<?= route_to('Home::update', session()->get('user')['id']) ?>" class="p-5">
        <?php } ?>
        <button type="submit" class="btn btn-primary header_btn_color mt-5">
            Back to user profile
        </button>
    </a>
</p>
</div>
<?php $this->endSection() ?>

