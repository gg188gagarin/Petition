<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>
    <div class="row petition_header text-center">
        <div class="col-4">
            Find petition
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                 viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
        <div class="col-4">
            Subscribed petitions
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen"
                 viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
            </svg>
        </div>
        <div class="col-4">
            Add new petition
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
            </svg>
        </div>
    </div>

    <div class="cardWrapper" >
        <?php foreach ($userPetitions as $item) { ?>
            <div class="card petition_card col-md-5" >
                <div class="card-body">
                    <h5 class="card-title"><?= $item['name'] ?></h5>
                    <p class="card-text"><?= $item['description'] ?></p>
                    <a href="<?= route_to('Petition::edit', $item['id']) ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= route_to('Petition::delete', $item['id']) ?>" class="btn btn-danger">Delete</a>
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