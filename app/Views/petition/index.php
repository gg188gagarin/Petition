<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class=" col-8">

            <form id="formElem" action="<?= site_url(uri_string()) ?>"
                  class="searchForm input-group mb-3 mt-0 search_main"
                  method="get">
                <input type="text" class="form-control query" placeholder="Enter some text about petition"
                       aria-label="Example text with button addon"
                       aria-describedby="button-addon1">

                <button name="q" class="btn btn-outline-secondary search " type="submit" id="button-addon1">Find
                </button>
            </form>
            <div>
                <h5>Search by status:</h5>
                <select class="js-multiple search_main col-3" name="states[]" multiple="multiple">
                    <option value="draft">Draft</option>
                    <option value="premodarating">Premodarating</option>
                    <option value="active">Active</option>
                    <option value="unsupported">Unsupported</option>
                    <option value="supported">Supported</option>
                    <option value="inreview">Inreview</option>
                    <option value="declined">Declined</option>
                    <option value="accepted">Accepted</option>
                </select>
                <button name="q" class="btn btn-outline-secondary js-search " type="submit" value="status">Find by
                    status
                </button>
            </div>

            <p class="searchError"></p>
            <div class="js-petition-content">
                <?= $this->include("petition/indexContent"); ?>
            </div>
        </div>

        <div class="col-3 float-end me-5">
            <div class="d-none d-lg-block ">
                <?= $this->include('/petition/right_sidebar'); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>