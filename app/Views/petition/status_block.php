<div class="menu-item mt-3" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >My Subs</span></div>
</div>

<?php foreach ($statuses as $key => $status) { ?>
    <div class="row pt-1 pb-1 namestatus align-middle me-2">
        <a href="<?= ('/petitions/my-subs/'), $key ?>" class="menu-link text-decoration-none" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50"><?= (\App\Models\PetitionModel::countPetitionStatus($key, session()->get('id'))) ?></span>
        </a>
    </div>
<?php } ?>
