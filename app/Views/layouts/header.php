<header>
    <div class="navbar shadow-sm">
        <div class="container-sm">
            <div class="row py-3 flex-grow-1">
                <div class="col zoomH">
                    <a href="<?= base_url('/home') ?>" class="navbar-brand align-items-center text-dark ">
                        <svg width="20" height="20" fill="none" stroke="currentColor"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true"
                             class="me-2" viewBox="0 0 24 24">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                            <circle cx="12" cy="13" r="4"></circle>
                        </svg>
                        <strong>Petitions</strong>
                    </a>
                </div>
                <div class="col-7 d-none d-md-block">
                    <ul class="nav ">
                        <li class="nav-item pe-3">
                            <a href="<?= base_url('/petitions/') ?>" class="btn  border-0 btn-outline-secondary  zoomH"
                               aria-current="page">All</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a href="<?= base_url('/petitions/my/') ?>"
                               class="btn  border-0 btn-outline-secondary  zoomH">My
                                petitions</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a href="<?= base_url('/petitions/my-subs/') ?>"
                               class="btn  border-0 btn-outline-secondary  zoomH">My Subs</a>
                        </li>
                    </ul>
                </div>


                <div class="col-3 " align="right">
                    <ul class="nav list-group-horizontal mb-0 pb-0 mt-0 pt-0">
                        <?php if (!empty(session()->get('user'))) { ?>
                            <li class="list-group-item border-0 mb-0 pb-0 mt-0 pt-0 bg-opacity-0 pe-1">
                                <div class="dropdown dropstart">
                                    <div class="btn  dropdown-toggle btn btn-outline-secondary
                                     fw-bolder border-0 text-uppercase"
                                         type="button"
                                         id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if (!empty(session()->get('avatar'))) { ?>
                                            <img src="<?= base_url(session()->get('avatar')) ?>" alt="user" width="32"
                                                 height="32" class="rounded-circle">
                                        <?php } else { ?>
                                            <?= session()->get('user')['firstname']['0'] ?>. <?= session()->get('user')['lastname'] ?>
                                        <?php } ?>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu bg-white shadow-lg border-0 "
                                        aria-labelledby="dropdownMenuButton2">
                                        <li>
                                            <?php if (!empty(session()->get('avatar'))) { ?>
                                                <div class="symbol symbol-50px me-5 dropdown-item">
                                                    <img class="mw-10" style=" width: 5em; border-radius: 2.5em"
                                                         src="<?= base_url(session()->get('avatar')) ?>">
                                                </div>
                                            <?php } ?>
                                        </li>

                                        <li>
                                            <div class="dropdown-item  fw-bolder ucfirst ">
                                                <?= session()->get('user')['firstname'] ?>
                                                <?php $isadmin = session()->get('user')['is_admin'] ?>
                                                <?php if ($isadmin === '1') { ?>
                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"
                                                          style="background: rgba(0,193,37,0.61)">Admin</span>
                                                <?php } ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-item fw-bolder">
                                                <?= session()->get('user')['lastname'] ?></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item fw-bolder"><?= session()->get('user')['email'] ?></a>
                                        </li>

                                        <li>
                                            <a href="<?= route_to('Home::update', session()->get('user')['id']) ?>"
                                               class="dropdown-item">My profile</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= ('/petitions/my/') ?>">My</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= ('/petitions/my-subs/') ?>">My Subs</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= ('/petitions/') ?>">All</a>
                                        </li>
                                        <?php if ($isadmin === '1') { ?>
                                            <li>
                                                <a href="<?= route_to('Home::all', session()->get('user')['id']) ?>"
                                                   class="dropdown-item">Users</a></li>
                                        <?php } ?>
                                        <li><a class="dropdown-item text-dark fw-bolder"
                                               href="<?= base_url('/logout') ?>">Sign Out</a></li>
                                    </ul>

                                </div>
                            </li>
                        <?php } ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>