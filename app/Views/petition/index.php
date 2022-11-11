<?php

use App\Models\PetitionModel;

?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <script src="/js/petition.js"></script>

    <div class="row">
        <div class=" col-8">

            <form id="formElem" action="<?= site_url(uri_string()) ?>"
                  class="searchForm input-group mb-3 mt-0 search_main"
                  method="get">

                <div class="input-group mb-3">

                    <input type="text" class="form-control js-query col-3 " name="q"
                           placeholder="Enter some text about petition"
                           aria-describedby="button-addon1" value="<?php echo $q; ?>">

                    <button name="q" class="btn btn-outline-secondary search " type="submit" id="button-addon1">Find
                    </button>

                </div>


                <div class="input-group ">
                    <div class="col-5    me-4">
                        <div class="text-secondary text-opacity-75 ">Filtered by:</div>
                        <select class="js-multiple search_main  form-select" multiple="multiple" name="mult[]"
                                aria-label="multiple select" style="height: 110%">
                            <option value="draft" <?php if (in_array('draft', $mult)) echo 'selected'; ?>>Draft
                            </option>
                            <option value="premodarating" <?php if (in_array('premodarating', $mult)) echo 'selected'; ?>>
                                Premodarating
                            </option>
                            <option value="active" <?php if (in_array('active', $mult)) echo 'selected'; ?>>Active
                            </option>
                            <option value="unsupported" <?php if (in_array('unsupported', $mult)) echo 'selected'; ?>>
                                Unsupported
                            </option>
                            <option value="supported" <?php if (in_array('supported', $mult)) echo 'selected'; ?>>
                                Supported
                            </option>
                            <option value="inreview" <?php if (in_array('inreview', $mult)) echo 'selected'; ?>>
                                Inreview
                            </option>
                            <option value="declined" <?php if (in_array('declined', $mult)) echo 'selected'; ?>>
                                Declined
                            </option>
                            <option value="accepted" <?php if (in_array('accepted', $mult)) echo 'selected'; ?>>
                                Accepted
                            </option>
                        </select>
                    </div>

                    <div class="col-4 ms-2">
                        <div class="text-secondary text-opacity-75 ">Sort by:</div>
                        <select class="js-sort form-select " aria-label="Default select" name="sort.name"
                                style="width: 90%">
                            <option value="" <?php if (empty($sort)) echo 'selected' ?>>--</option>
                            <option value="asc" <?php if ($sort == 'asc') echo 'selected' ?>>ASC</option>
                            <option value="desc" <?php if ($sort == 'desc') echo 'selected' ?>>DESC</option>
                        </select>

                    </div>

                </div>


            </form>
            <p class="searchError"></p>
            <div id="nav" class="js-petition-content">
                <?= $this->include("petition/indexContent"); ?>
            </div>
        </div>

        <div class="col-3 float-end me-5">
            <div class="d-none d-lg-block ">
                <?= $this->include('/petition/sidebars/right_sidebar'); ?>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>