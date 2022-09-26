<?php foreach ($petitions as $item) { ?>
    <div class="card petition_card col-md-12   border-0">
        <div class="card-body">
<p>            <h4 class="fw-bold"><?= $item['name'] ?>
            </h4>
            <span class="badge badge-light-success fw-bold fs-8 bg-success bg-opacity-50">
<!--                                                               style="background: rgba(0,193,37,0.61)">-->
            <?= ucwords(strtolower($item['status'])) ?></span></p>
            <span class="fw-bold">Author:</span><span> <?= $item['firstname'] ?> <?= $item['lastname'] ?></span>
<!--            <span class=" ms-4 fw-bold">Status:</span><span class="">--><?//= ucwords(strtolower($item['status'])) ?><!--</span>-->
            <p class="card-text text-secondary"><?= substr($item['description'], 0, 200) ?></p>
            <a href="<?= route_to('Petition::details', $item['id']) ?>" class="btn text-white bg-primary bg-opacity-50 border-0">Open</a>
            <?php if ($item['user_id'] == session()->get('user')['id']) { ?>
                <?php if ($item['status'] == \App\Models\PetitionModel::STATUS_DRAFT) { ?>
                    <a href="<?= route_to('Petition::edit', $item['id']) ?>" class="btn text-white bg-primary bg-opacity-50 border-0">Edit</a>
                    <a href="<?= route_to('Petition::setStatus', $item['id'], \App\Models\PetitionModel::STATUS_PREMODERATING) ?>"
                       class="btn bg-success bg-opacity-50">Send to moderating</a>
                    <a href="<?= route_to('Petition::delete', $item['id']) ?>" class="btn text-white bg-danger bg-opacity-50 border-0  float-end">Delete</a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
<hr>
<?php } ?>
<?php if ($pager) { ?>
    <nav>
        <div class="d-flex justify-content-center pages">
            <li class="page-item page-link border-0">
                <?= $pager->links() ?>
            </li>
        </div>
    </nav>
<?php } ?>

