<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
<?= $this->include('layouts/petition_header'); ?>

    <div class="cardWrapper" >
        <?php foreach ($subuserPetitions as $item) { ?>
            <div class="card petition_card col-md-5" style="margin-top: 0.5em">
                <div class="card-body">
                    <h5 class="card-title"><?= $item['name'] ?></h5>
                    <p class="card-text"><?= substr($item['description'], 0, 120) ?></p>
                    <a href="<?= route_to('Petition::details', $item['id']) ?>" class="btn btn-primary">Open</a>
                </div>
            </div>
        <?php } ?>
    </div>


<?php if ($pager) { ?>
    <nav>
        <div class="d-flex justify-content-center">
            <ul class="pagination" >
                <li class="page-item page-link" >
                    <?php
                    echo $pager->links();
                    ?>
                </li>
            </ul>
        </div>
    </nav>
<?php } ?>

<?php $this->endSection() ?>