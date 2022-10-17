<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class=" col-8">

            <form id="formElem" action="<?= site_url(uri_string()) ?>"
                  class="searchForm input-group mb-3 mt-0 search_main"
                  method="get">
                <input type="text" class="form-control query" placeholder="Enter username"
                       aria-label="Example text with button addon"
                       aria-describedby="button-addon1">
                <button name="q" class="btn btn-outline-secondary search " type="submit" id="button-addon1">Find
                </button>
            </form>


            <p class="searchError"></p>
            <div class="js-user-content">
                <?= $this->include("home/users_list/indexContent"); ?>
            </div>
        </div>

        <div class="col-3 float-end me-5">
            <div class="d-none d-lg-block ">
                <?= $this->include('/petition/sidebars/right_sidebar'); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
