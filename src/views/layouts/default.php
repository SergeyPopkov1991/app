<?php $this->getPart('parts/header'); ?>

<main>
    <?php if (!empty($__content_file) && file_exists($__content_file)) {
        include $__content_file;
    } ?>
</main>

<?php $this->getPart('parts/footer'); ?>
