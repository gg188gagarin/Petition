<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>

<?php if ((!empty($petition))) { ?>

<form action="<?= route_to('Petition::update', $petition['id']) ?>" method="post">
    <?php } else { ?>
    <form action="<?= base_url('petition/create') ?>" method="post">
        <?php } ?>
        <div class="form-group">
            <h1 class="bright_text"> Welcome to petition creation page</h1>
            <label for="name" class="bright_text">Petition name</label>
            <input type="text" id="name" class="form-control input_color" name="name" placeholder="Enter petition name"
                <?php if (!empty($petition)) { ?>
                   value="<?= $petition['name'] ?>"
            <?php } elseif (!empty($_REQUEST['name'])) { ?>
                value="<?= $_REQUEST['name'] ?>"
            <?php } ?>>
        </div>
        <div class="form-group">
            <label for="description" class="bright_text">Description</label>
            <?php if (!empty($petition)) { ?>
                <textarea class="form-control input_color form_group_creat_petition_description" id="description"
                          name="description" rows="3"><?= $petition['description'] ?>
                </textarea>
            <?php } elseif (!empty($_REQUEST['description'])) { ?>
                <textarea class="form-control input_color form_group_creat_petition_description" id="description"
                          name="description" rows="3"><?= $_REQUEST['description'] ?>
                </textarea>
            <?php } else { ?>
                <textarea class="form-control input_color form_group_creat_petition_description" id="description"
                          name="description" rows="3">
                </textarea>
            <?php } ?>
        </div>
        <div class="form-group pt-4">
            <?php if ((!empty($petition)) || (!empty($_REQUEST['name']))) { ?>
                <button class="btn btn-outline-dark" type="submit">Update</button>
            <?php } else { ?>
                <button class="btn btn-outline-dark" type="submit">Create</button>
            <?php } ?>
        </div>
        <br>

        <div class="alert" style="max-width: 10em">
            <?php if (!empty($validation)) {
                foreach ($validation->getErrors() as $field => $error) {
                    echo "<p  class='text-danger' >" . $error . "</p>";
                };
            } ?>
        </div>
    </form>


    <?php if (!empty(session()->getFlashdata('fail'))) { ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php } ?>
    <?php $this->endSection() ?>
