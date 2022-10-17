<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-3 ">
                <div class="border-1 border-opacity-10 border-secondary">

                    <div class="">
                        <?php $userAvatarPath = \App\Models\UserModel::user_avatar($user) ?>
                        <?php if ($userAvatarPath) { ?>
                            <img class="mw-10 " style=" width: 5em; border-radius: 2.5em"
                                 src="<?= base_url('uploads/' . $userAvatarPath) ?>">
                        <?php } ?>
                    </div>
                    <div class="dropdown-item  fw-bolder ucfirst text-secondary text-opacity-75 text-uppercase mt-4">
                        <?= $user['firstname'] ?>
                        <?php $isadmin = $user['is_admin'] ?>
                        <?php if ($isadmin === '1') { ?>
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"
                                  style="background: rgba(0,193,37,0.61)">Admin</span>
                        <?php } ?>
                    </div>


                    <div class="dropdown-item fw-bolder text-secondary text-opacity-75 text-uppercase mt-2">
                        <?= $user['lastname'] ?></div>
                    <a class="dropdown-item fw-bolder text-secondary text-opacity-75 mt-2"><?= $user['email'] ?></a>
                    <a class="dropdown-item fw-bolder text-secondary text-opacity-75 mt-2">created_at</a>
                </div>
            </div>

            <div class="col-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Overview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                           type="button" role="tab" aria-controls="profile" aria-selected="false">Petitions
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <?= $this->include('home/users_list/update_user_info'); ?>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?= $this->include('petition/table_petition_user'); ?>
                    </div>
                </div>
                <hr>
            </div>

        </div>
    </div>


<?php $this->endSection() ?>