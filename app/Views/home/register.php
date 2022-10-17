<?php $this->extend('layouts/main') ?>
<?php $this->section('login') ?>

    <section class="vh-100 " style="background-color: #508bfc;background-image: url('/img/png/pngegg (5).png');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong rounded-5 bg-opacity-50 bg-white">
                        <div class="card-body p-5 text-center ">

                            <form  action="<?= base_url('/register'); ?>" method="post">
                                <div class="form-group">
                                    <h2 align="left">Firstname</h2>
                                    <input type="text" class="form-control input_color bg-opacity-50 bg-white" name="firstname"
                                           placeholder="Enter your name"
                                        <?php if (!empty($data)) { ?>
                                            value="<?= $data['firstname'] ?>"
                                        <?php } ?>>
                                </div>
                                <div class="form-group mt-2 ">
                                    <h2 align="left" >Lastname</h2>
                                    <input type="text" class="form-control input_color bg-opacity-50 bg-white" name="lastname"
                                           placeholder="Enter your surname"
                                        <?php if (!empty($data)) { ?>
                                            value="<?= $data['lastname'] ?>"
                                        <?php } ?>>
                                </div>
                                <div class="form-group mt-2">
                                    <h2 align="left">Email</h2>
                                    <input type="text" class="form-control input_color bg-opacity-50 bg-white" name="email"
                                           placeholder="Enter your email"
                                        <?php if (!empty($data)) { ?>
                                            value="<?= $data['email'] ?>"
                                        <?php } ?>>
                                </div>
                                <div class="form-group mt-2" >
                                    <h2 align="left">Password</h2>
                                    <input type="password" class="form-control input_color bg-opacity-50 bg-white" name="password"
                                           placeholder="Enter your password">
                                </div>
                                <div class="form-group mt-2">
                                    <h2 align="left">Confirm Password</h2>
                                    <input type="password" class="form-control input_color bg-opacity-50 bg-white" name="conf_password"
                                           placeholder="Confirm your password">
                                </div>
                                <div align="left" class="form-group mt-3" >
                                    <div class="row">
                                        <div class="text-center">
                                            <button class="btn btn-primary col-6" type="submit">Register</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a align="center" class="bright_text text-decoration-none"
                                           href="<?= base_url('/login') ?>">I already have
                                            account, login now</a></div>
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
                </div>
            </div>
        </div>
    </section>
<?php $this->endSection() ?>