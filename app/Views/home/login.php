<?php $this->extend('layouts/main') ?>
<?php $this->section('login') ?>

    <section class="vh-100 " style="background-color: #508bfc;background-image: url('/img/png/pngegg (5).png');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <form class="col-12 col-md-8 col-lg-6 col-xl-5" action="<?= base_url('/login') ?>" method="post">
                    <div class="card shadow-2-strong bg-opacity-50 bg-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center semiopacity">

                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" placeholder="Enter your email" id="typeEmailX-2"
                                       class="form-control form-control-lg bg-opacity-50 bg-white"
                                    <?php if (!empty($data)) { ?>
                                        value="<?= $data['email'] ?>"
                                    <?php } else { ?>
                                        value="<?= old('email') ?>"
                                    <?php } ?>>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg
                                                                    bg-opacity-50 bg-white"
                                       name="password" placeholder="Enter your password"/>
                            </div>

                            <div class="row">
                                <div class="text-center">
                                    <button class="btn btn-primary col-6 " type="submit">Login</button>
                                </div>
                            </div>

                            <hr class="my-4">
                            <a href="<?= base_url('/register') ?>" class="bright_text text-decoration-none">Have no account,
                                create new one</a>
                            <?php if (!empty($errors)) { ?>
                                <br>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $field => $error) { ?>
                                        <p><?= $error ?></p>

                                    <?php } ?>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $this->endSection() ?>