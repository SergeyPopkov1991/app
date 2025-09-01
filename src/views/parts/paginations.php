<?php

$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;

$sortEmail = app\controllers\HelpersController::normDir($_GET['sort_email'] ?? null, 'ASC');
$sortName  = app\controllers\HelpersController::normDir($_GET['sort_name']  ?? null, 'ASC');
$sortDate  = app\controllers\HelpersController::normDir($_GET['sort_date']  ?? null, 'DESC');


?>
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++) :
            $rule = false;

            if (isset($_GET['page']) && $i === (int) $_GET['page']) {
                $rule = true;
            } elseif (! isset($_GET['page']) && 1 === $i) {
                $rule = true;
            }

            ?>
            <li class="page-item<?php if ($rule) {
                                    echo ' active';
                                } ?>">
                <a href="<?php echo app\controllers\HelpersController::urlWith(['page' => $i]); ?>" class="page-link"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
