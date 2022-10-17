<div class=" border-1">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Petition name</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php use App\Models\BaseModel; ?>
        <?php foreach ($petitions as $item) { ?>
            <tr class="zoom">
                <th class="align-middle" scope="row"><?= $item['id'] ?></th>
                <td class="align-middle"><?= $item['name'] ?></td>
                <td class="align-middle"><?= BaseModel::formatDate($item['updated_at']); ?></td>
                <td class="align-middle"><?= ucwords(strtolower($item['status'])) ?></td>
                <td class="align-middle">
                    <a href="<?= route_to('Petition::details', $item['id']) ?>"
                       class="btn border-1 btn-outline-secondary ">Open</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
