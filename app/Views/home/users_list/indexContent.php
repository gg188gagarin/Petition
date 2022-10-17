<?php foreach ($users as $item) { ?>
    <div class="card petition_card col-md-12 zoom  border-0">
        <div class="card-body">
            <p><span class="fw-bold">Author:</span>
                <span> <?= $item['firstname'] ?> <?= $item['lastname'] ?>
                    <?php if ($item['is_admin'] === '1') { ?>
                        <span class="badge badge-light-success fw-bold fw-bolder ucfirst
                         text-white text-opacity-75"
                              style="background: rgba(0,193,37,0.61)">Admin</span>
                    <?php } ?>
                </span>
            </p>
            <p><span class="fw-bold">Email:</span>
                <span> <?= $item['email'] ?></span></p>

            <p><span class="fw-bold">Number of petitions:</span>
                <span> из новой таблици с общим подсчетом</span></p>

            <a href="<?= '/admin_panel/', $item['id'] ?>"
               class="btn text-white bg-primary bg-opacity-50 border-0">Open</a>
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

