<?php use App\Models\PetitionModel; ?>



<div class="menu-item" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >My petition</span></div>
</div>



<?php $array = PetitionModel::countMyPetitions(session()->get('id')); ?>

<?php foreach (PetitionModel::myStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 align-middle me-2">
        <a href="<?= ('/petitions/my/'), $key ?>" class="menu-link text-decoration-none zoom" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50">
                <?php echo $array[$key]; ?>
            </span>
        </a>
    </div>
<?php } ?>



<div class="menu-item mt-3" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >My Subs</span></div>
</div>

<?php $array = PetitionModel::countMySubsPetitions(session()->get('user')['id']); ?>
<?php foreach (PetitionModel::mySubStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 align-middle me-2">
        <a href="<?= ('/petitions/my-subs/'), $key ?>" class="menu-link text-decoration-none zoom" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50">
                <?php echo $array[$key]; ?>
            </span>
        </a>
    </div>
<?php } ?>


<div class="menu-item mt-3" name="leftsidebarContent">
    <div class="menu-content pb-2 text-secondary text-opacity-50" >
        <span class="menu-section  text-uppercase fs-7 " >All petitions</span></div>
</div>



<?php $array = PetitionModel::countAllPetitions(); ?>

<?php foreach (PetitionModel::allStatuses('statuses') as $key => $status) { ?>
    <div class="row pt-1 pb-1 align-middle me-2">
        <a href="<?= ('/petitions/'), $key ?>" class="menu-link text-decoration-none zoom" >
            <span class="namestatusitem " align="left"><?php echo $status['name'] ?></span>
            <span class="float-end text-secondary text-opacity-50">

                <?php echo $array[$key]; ?>

            </span>
        </a>
    </div>
<?php } ?>

