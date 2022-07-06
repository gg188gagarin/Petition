<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom ">
    <a href="/" class="d-flex align-items-center  text-dark text-decoration-none "  style="padding-left: 5em">
        <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEU0lEQVRoge2aTWhcVRTHf2ZqpMYktCb2Q2P8gFSJC40ijSAFQVftQsmi1YUWtAWhq0I3RnQlaKu4UXTh18KNWEXTTVWwoC1YabpQsBUrpO1CW20xtiaOycTF+T/m5eXe9858VKY4fzjMnTnnnvM/9953v97ApcdB4Kv/IE5d6AR6nLYLEg965bspuFuSh0+AP4A1Dn/eRNYA0/KdhyC/joDhNkkeyliPjDkIejEGdMt3Hgr5lYBNWKtMq1yK2G7BWvmAg+CTkiIckM8tjfBbCxyiOgwSOSRdFj3ALDAHrHKQLMIq+Zol/OzVxK+WHgGYkLPtBSQHJHnYLl8TOTa18uNN4I2CwABPKPhnBXbPA88V2HwuX4874nr5LZoVniae9UrswSyrHEIfcFLS14Cfkrhk+bnQD8wA4zk2+7GW3Jr5fS3wPjbmk/E8q9+yY3qr9Ptz4oyLS7+T+yKMAvPAP8D6iM02kdgX0K0D9mAP8ZzK6wJ2++QjNqWuF4d5caoLuxXkBOHZpE9BZrFVOYQJ4NOIrhtr6TnguoD+GuC4OLzkZh3AlcA3cvRuxCaZ/x+N6DcBGyO6x1T3y4j+PemP0ISty23ABTncHNDvkG5vpH6J+ISxV3V3BHSbpbtAeEjWheRZOA8MZnQ3ABXgItBVg88u1anIRxqDirUAPFUH31x8LMdvBXTJqhvae52SZDFGdXXO4m3pPqqLaQFWAu8ADwZ0OxX4tYAutvt9Xb/vDOgeUqzYunLJ0Au8AtwZ0MUSuQt4mfhsVxOucNj0YlPjPHYGqaQ+PUgWxeVO+w7FTD5LwBnFjGKZw/F3LN30VYBfsK3HaeAYNkUeYenz8AjhHhmgut24HbgeuBFYzdJz0hRwk4NrLpKh8Ru2eGW30lk5hi2kIwFfI9Idd/iZUUzXCdMztBIniW3S5auxFhzAWnREkt4BHASeUfkF4L6UbhqYlPyA9eRJrKfTQzcb341hESizuIU8WAZsAF6lug5UJAvAOek24BvWZDiUxW3YU/Eo4a6uFV3As6n648DVdfgJcTnqqZi0XrJK15tIlkgz6ndR7eXCoZYN3EqJpL8vSiR0HXRZop1Iq6GdSKuhnUiroZ1Iq6GdSKuhnUirwXu4ATvMzGCHm4vAn9idbbP5dGPb9U78FxbBPX32aJm39z8PnAV+BX6WfI9dQkxF/A0C9wB3ALcAN2Ov3vqBFZE4C1RHT+KvI1V29cge4IGUfTd2uX2tAq8AhoD7M/VOYLeTCXYDDwO35sT6C/gdu+FP9/gXRSQ9PZKH5VhCg1jrDmEXb/cSfylzFjiMHVd/xHpxSgnMOGIGeyRm2MiJLgkyCryIXa6dUXmUxieY4AkxhOyZvVF00ry/ZdR0Zp+k+PKsSD4Ergr47gQ+aIL/SU/Ww8DXwN8NBjuMvanql2yk+varXimLm+teq1EMYTNWjMxPsrks0APsAr7FbhfPqbwL/9+j/p/4F2XijRBrF0bKAAAAAElFTkSuQmCC"> Petitions
    </a>

    <?php if (!empty(session()->get('user'))) { ?>
        <div class="col-md-3 text-end" style="padding-right: 10em">
            <span style="padding-right: 1em"><?= $_SESSION["user"]["email"] ?></span>
            <a href="<?= base_url('logout') ?>">
                <button type="submit" class="btn btn-danger">Log out</button>
            </a>
        </div>

    <?php } else { ?>
        <div class="col-md-3 text-end" style="padding-right: 10em">
            <a href="<?= base_url('login') ?>">
                <button type="submit" class="btn btn-outline-primary me-2">Login</button>
            </a>
            <a href="<?= base_url('register') ?>">
                <button type="submit" class="btn btn-primary">Sign-up</button>
            </a>
        </div>
    <?php } ?>

</header>
