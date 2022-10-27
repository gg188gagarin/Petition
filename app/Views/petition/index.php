<?php

use App\Models\PetitionModel;

?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class=" col-8">

            <form id="formElem" action="<?= site_url(uri_string()) ?>"
                  class="searchForm input-group mb-3 mt-0 search_main"
                  method="get">
                <div class="input-group">
                    <div class="input-group">
                        <input type="text" class="form-control js-query col-3 me-3" name="q"
                               placeholder="Enter some text about petition"
                               aria-describedby="button-addon1" value="">
                        <select class="js-multiple search_main col-4" multiple="multiple" name="mult">
                            <option value="draft">Draft</option>
                            <option value="premodarating">Premodarating</option>
                            <option value="active">Active</option>
                            <option value="unsupported">Unsupported</option>
                            <option value="supported">Supported</option>
                            <option value="inreview">Inreview</option>
                            <option value="declined">Declined</option>
                            <option value="accepted">Accepted</option>
                        </select>
                        <button name="q" class="btn btn-outline-secondary search " type="submit" id="button-addon1">Find
                        </button>
                    </div>
                </div>

                <!--                <div>-->
                <!--                    <h5>Search by status:</h5>-->
                <!---->
                <!--                    <select class="js-multiple search_main col-4" multiple="multiple">-->
                <!--                        <option value="draft">Draft</option>-->
                <!--                        <option value="premodarating">Premodarating</option>-->
                <!--                        <option value="active">Active</option>-->
                <!--                        <option value="unsupported">Unsupported</option>-->
                <!--                        <option value="supported">Supported</option>-->
                <!--                        <option value="inreview">Inreview</option>-->
                <!--                        <option value="declined">Declined</option>-->
                <!--                        <option value="accepted">Accepted</option>-->
                <!--                    </select>-->
                <!--                    <button class="btn btn-outline-secondary js-search " type="submit" >Find by-->
                <!--                        status-->
                <!--                    </button>-->
                <!--                </div>-->


            </form>

            <p class="searchError"></p>
            <div class="js-petition-content">
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