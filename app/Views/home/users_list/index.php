<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<script src="/js/user.js"></script>

<div class="row">
    <div class=" col-8">

        <form id="formElemU" action="<?= site_url(uri_string()) ?>"
              class="searchFormU input-group mb-3 mt-0 search_main"
              method="get">

            <div class="input-group mb-2">
            <input type="text" class="form-control query" placeholder="Enter username"
                   aria-label="Example text with button addon"
                   aria-describedby="button-addon1" name="u" value="<?php echo $u; ?>">

            <button  class="btn btn-outline-secondary search " type="submit" id="button-addon1">Find
            </button>
            </div>

            <div class=" col-2" >
                <div>
                    <div class="text-secondary text-opacity-75 mt-1 ">Sort by:</div>
                        <select class="js-sort form-select mt-2" aria-label="Default select " name="sort.lastname">
                            <option value="" <?php if (empty($sort)) echo 'selected' ?>>--</option>
                            <option value="asc" <?php if ($sort == 'asc') echo 'selected' ?>>ASC</option>
                            <option value="desc" <?php if ($sort == 'desc') echo 'selected' ?>>DESC</option>
                        </select>
                </div>
            </div>
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
