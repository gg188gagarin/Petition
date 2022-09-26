<?php use App\Models\PetitionModel; ?>



<div class="menu-item" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >My petition</span></div>
</div>




<?php foreach (PetitionModel::myStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 namestatus align-middle me-2">
        <a href="<?= ('/petitions/my/'), $key ?>" class="menu-link text-decoration-none" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50"><?= (PetitionModel::countPetitionStatus($key, session()->get('id'))) ?></span>
        </a>
    </div>
<?php } ?>



<div class="menu-item mt-3" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >My Subs</span></div>
</div>

<?php foreach (PetitionModel::mySubStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 namestatus align-middle me-2">
        <a href="<?= ('/petitions/my-subs/'), $key ?>" class="menu-link text-decoration-none" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50"><?= (PetitionModel::countPetitionStatus($key, session()->get('id'))) ?></span>
        </a>
    </div>
<?php } ?>


<div class="menu-item mt-3" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >All petitions</span></div>
</div>


<?php foreach (PetitionModel::allStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 namestatus align-middle me-2">
        <a href="<?= ('/petitions/'), $key ?>" class="menu-link text-decoration-none" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50"><?= (PetitionModel::countPetitionStatus($key, session()->get('id'))) ?></span>
        </a>
    </div>
<?php } ?>




<style>
    .namestatus:hover {
        background-color: rgba(142, 179, 252, 0.42);
        border-radius: 0.3em;
    }
    .namestatusitem:hover {
        color: rgba(0, 0, 0, 0.73);
    }
    .namestatusitem {
        color: rgba(115,113,124,0.83)
    }

</style>