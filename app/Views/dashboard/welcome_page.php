<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>

<h1 class="welcPage_text text-secondary">
    Hi, <?php $user['firstname']; ?>!
    <a href="<?php  route_to('Home::update', $user['id']) ?>"
       class="herestyle m-4 text-decoration-none text-dark fw-bold">PERSONAL-page</a></h1>
<h1 class="welcPage_text text-secondary">
    <a href="<?php base_url('petition/create') ?>" class="herestyle text-decoration-none text-dark fw-bold">Here</a>
    you can create petition
</h1>
<h1 class="welcPage_text text-secondary">
    <a href="<?php base_url('/petitions/my') ?>" class="herestyle text-decoration-none text-dark fw-bold">Here</a>
    you can see the petitions you created.</h1>
</h1>

<?php $isadmin = session()->get('user')['is_admin'] ?>
<?php if ($isadmin === '1') { ?>


    <h1 class="welcPage_text text-secondary">
        <a href="<?php base_url('/petitions') ?>" class="herestyle text-decoration-none text-dark fw-bold">Here</a>
        you can see all petitions.</h1>
    </h1>
<?php }  ?>




