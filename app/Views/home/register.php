<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
    <div class="row">
        <div>

            <form action="<?= base_url('/register'); ?>" method="post">
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter your name"
                        <?php if (!empty($data)) { ?>
                            value="<?= $data['firstname'] ?>"
                        <?php } ?>>
                </div>
                <div class="form-group">
                    <label style="padding-top: 1em">Lastname</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter your surname"
                        <?php if (!empty($data)) { ?>
                            value="<?= $data['lastname'] ?>"
                        <?php } ?>>
                </div>
                <div class="form-group" style="padding-top: 1em">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email"
                        <?php if (!empty($data)) { ?>
                            value="<?= $data['email'] ?>"
                        <?php } ?>>
                </div>
                <div class="form-group" style="padding-top: 1em">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group" style="padding-top: 1em">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="conf_password"
                           placeholder="Confirm your password">
                </div>
                <div class="form-group" style="padding-top: 1em; ">
                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                    <a href="<?= base_url('login') ?>" style="padding-left: 17.5em">I already have account, login now</a>
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
        </div>
    </div>
<?php $this->endSection() ?>