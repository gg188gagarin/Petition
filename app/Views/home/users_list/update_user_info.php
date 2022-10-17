<?php if ((!empty($user))) { ?>
<form action="<?= route_to('Home::update') ?>" method="post">
    <?php }

    use App\Models\UserModel; ?>
    <div class="row">
        <div class="col-6 mt-4">
            <div class="form-group ">
                <label for="firstname" class="bright_text fw-bold">Firstname</label>
                <input type="hidden" value="<?= $user['id'] ?>" name="id" id="id">
                <input type="text" id="firstname" class="form-control input_color" name="firstname"
                       placeholder="Enter petition firstname"
                    <?php if (!empty($user)) { ?>
                        value="<?= $user['firstname'] ?>"
                    <?php } elseif (!empty($_REQUEST['firstname'])) { ?>
                        value="<?= $_REQUEST['firstname'] ?>"
                    <?php } ?> >
            </div>

            <div class="form-group mt-2">
                <label for="lastname" class="bright_text fw-bold">Lastname</label>
                <input type="text" id="lastname" class="form-control input_color " name="lastname"
                       placeholder="Enter petition lastname"

                    <?php if (!empty($user)) { ?>
                       value="<?= $user['lastname'] ?>">
                <?php } elseif (!empty($_REQUEST['lastname'])) { ?>
                    value="<?= $_REQUEST['lastname'] ?>">
                <?php } ?>
            </div>

            <div class="form-group mt-2">
                <label for="email" class="bright_text fw-bold">Email</label>
                <input type="text" id="email" class="form-control input_color" name="email"
                       placeholder="Enter petition email"
                    <?php if (!empty($user)) { ?>
                       value="<?= $user['email'] ?>">
                <?php } elseif (!empty($_REQUEST['email'])) { ?>
                    value="<?= $_REQUEST['email'] ?>">
                <?php } ?>
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-dark col-3" type="submit">Update</button>
            </div>
        </div>


        <div class="col-6 mt-4 " align="center">
            <?php $userAvatarPath = \App\Models\UserModel::user_avatar($user) ?>
            <?php if (!empty($userAvatarPath)) { ?>
                <img class="h-50 rounded-circle bg-white" src="<?= base_url('uploads/' . $userAvatarPath) ?>">
            <?php } else { ?>
                <div style="max-width: 5em"
                     class="text-center text-uppercase align-middle rounded-circle bg-opacity-50 bg-success
                     text-decoration-none fw-bolder text-white ">
                    <?php echo $firstLetter = UserModel::initials($user); ?>
                </div>
            <?php } ?>


            <p class="mt-4 zoomH"><a href="<?= base_url('upload/upload/' . $user['id']) ?>"
                               class="bright_text text-decoration-none  text-secondary text-opacity-50 ms-5 "
                >Update profile-photo</a></p>
        </div>

    </div>

</form>