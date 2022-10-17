<div class="card-body collapse show" id="top5petition">
    <?php $topPetition = \App\Models\PetitionModel::topPetitions() ?>

    <?php foreach ($topPetition as $item) { ?>
        <p class="card-text fw-bolder text-secondary text-opacity-75 "><?= $item['name'] ?></p>
        <p class="card-text text-secondary text-opacity-75 text-truncate d-block "><?= $item['description'] ?></p>
        <a href="<?= route_to('Petition::details', $item['id']) ?>"
           class="btn btn-outline-secondary text-opacity-75 zoomH">Open</a>
        <hr>
    <?php } ?>

</div>


