<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
    <div class="mt-0 ">
        <h1 class="welcPage_text mb-3">
            Click on 'Choose File' to select a picture of your avatar.
            <p></p>Then click on 'Upload' to upload your image.
        </h1>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <?= esc($error) ?>
                </div>
            <?php endforeach ?>
        <?php } ?>
        <?= form_open_multipart('upload/upload/'. $user_id) ?>
        <input type="file" name="userfile" size="20"/>
        <br/><br/>
        <input type="submit" value="Upload"/>

        </form>

        <a href="<?= base_url('/admin_panel/'.$user_id) ?>">
            <button type="submit" class="btn btn-dark header_btn_color mt-5">
                Back to user profile
            </button>
        </a>
    </div>
<?php $this->endSection() ?>