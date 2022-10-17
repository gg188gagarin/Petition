<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
?>
<?php $pager->setSurroundCount(2) ?>
<nav aria-label="Page navigation">
    <ul class="pagination" id="js-pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="me-1">
                <a class="page-link js-pagination-page text-white bg-primary bg-opacity-50 border-0 rounded-circle"
                   href="<?= $pager->getFirst() ?>"
                   aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li>
            <li class="me-1">
                <a class="page-link js-pagination-page text-white bg-primary bg-opacity-75 border-0 rounded-circle"
                   href="<?= $pager->getPrevious() ?>"
                   aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?>>
                <a href="<?= $link['uri'] ?>" class="page-link js-pagination-page  rounded-circle  ">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="ms-1">
                <a class="page-link js-pagination-page text-white bg-primary bg-opacity-75 border-0 rounded-circle"
                   href="<?= $pager->getnext() ?>"
                   aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>
            <li class="ms-1">
                <a class="page-link js-pagination-page text-white bg-primary bg-opacity-50 border-0 rounded-circle"
                   href="<?= $pager->getLast() ?>"
                   aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>