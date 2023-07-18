<?php $this->extend('layouts/main') ?>
<?= $this->section('content'); ?>
    <div class="row">
        <div class="col-11">
            <h5 class="card-text fw-bolder">Actual status:  <span
                        class="badge badge-light-success fw-bold fs-8 bg-success bg-opacity-50">
                        <?= ucwords(strtolower($petition['status'])) ?></span>
            </h5>


            <h3 class="text-uppercase"><?= $petition['name'] ?></h3>
            <h6 class="mb-4 ">Author: <?= $petition['firstname'] ?> <?= $petition['lastname'] ?></h6>
            <div class="lead"><?= $petition['description'] ?></div>
        </div>
    </div>

    <div class="col-6">
        <table class="table table-striped mt-3 ">
            <thead>
            <tr>
                <th scope="col">Subscribers</th>
                <!--            <th scope="col">Updated_at</th>-->
            </tr>
            </thead>
            <tbody>
            <?php use App\Models\BaseModel; ?> 
            <?php foreach ($users as $item) { ?>
                <tr class="">
                    <td class="align-middle"><?= $item['firstname']  ?> <?= $item['firstname']  ?></td>
                    <!--                <td class="align-middle">--><?//= BaseModel::formatDate($item['updated_at']); ?><!--</td>-->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>











<?php if ($petition['status'] == \App\Models\PetitionModel::STATUS_ACTIVE) { ?>
    <?php if ($petition['user_id'] != session()->get('user')['id']) { ?>

        <?php $user = session()->get('user') ?>
        <p class="card-text mt-3"><?php echo count($users); ?> subscribes</p>
        <a href="<?= route_to('Petition::subscribe', $petition['id']) ?>" class="btn btn-success">Subscribe</a>
    <?php } ?>
<?php } ?>
    <div class="mt-5">
<?php if (\App\Models\UserModel::isAdmin()) { ?>
    <?php if ($petition['status'] == \App\Models\PetitionModel::STATUS_PREMODERATING) { ?>
        <a href="<?= route_to('Petition::setStatus', $petition['id'], \App\Models\PetitionModel::STATUS_ACTIVE) ?>"
           class="btn btn-success">Accept</a>
        <a href="<?= route_to('Petition::setStatus', $petition['id'], \App\Models\PetitionModel::STATUS_DRAFT) ?>"
           class="btn btn-danger">Deny</a>
    <?php } ?>
    </div>
    <?php if ($petition['status'] == \App\Models\PetitionModel::STATUS_INREVIEW) { ?>


        <form action="<?= ('/petitions/comment') ?>" method="post">
            <div class="form-group">
                <label>Comment petition
                    <input class="form-control mb-3" type="text" name="answer"
                           value="<?= $petition['answer'] ?>">
                    <input type="hidden" name="id" value="<?php echo $petition['id'] ?>">
                    <input type="hidden" value="<?php ?>">
                </label>
            </div>
            <button value="<?php echo \App\Models\PetitionModel::STATUS_ACCEPTED ?>" class="btn btn-outline-success mt"
                    type="submit"
                    name="status">Accepted
            </button>
            <button value="<?php echo \App\Models\PetitionModel::STATUS_DECLINED ?>" class="btn btn-outline-danger"
                    type="submit"
                    name="status">Declined
            </button>

        </form>
    <?php } ?>
<?php } ?>

<?php $this->endSection() ?>