<?php $this->getPart('parts/banner', $data); ?>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 mb-5 mb-lg-0 mx-auto">
                <h2 class="pb-3"><a href="/app/add" class="boxed-btn btn btn-info">Добавить новую запись</a></h2>
            </div>
        </div>
        <form method="GET" class="row mb-5">
            <div class="col-3 mb-5 mb-lg-0 mx-auto">
                <select name="sort_date" class="form-select p-1" aria-label="Сортировка по дате">
                    <option value="">Сортировка по дате</option>
                    <option value="desc" <?= isset($_GET['sort_date']) && $_GET['sort_date'] === 'desc' ? 'selected' : '' ?>>DESC</option>
                    <option value="asc" <?= isset($_GET['sort_date']) && $_GET['sort_date'] === 'asc' ? 'selected' : '' ?>>ASC</option>
                </select>
            </div>
            <div class="col-3 mb-5 mb-lg-0 mx-auto">
                <select name="sort_name" class="form-select p-1" aria-label="Сортировка по имени">
                    <option value="">Сортировка по имени</option>
                    <option value="desc" <?= isset($_GET['sort_name']) && $_GET['sort_name'] === 'desc' ? 'selected' : '' ?>>DESC</option>
                    <option value="asc" <?= isset($_GET['sort_name']) && $_GET['sort_name'] === 'asc' ? 'selected' : '' ?>>ASC</option>
                </select>
            </div>
            <div class="col-3 mb-5 mb-lg-0 mx-auto">
                <select name="sort_email" class="form-select p-1" aria-label="Сортировка по e-mail">
                    <option value="">Сортировка по e-mail</option>
                    <option value="desc" <?= isset($_GET['sort_email']) && $_GET['sort_email'] === 'desc' ? 'selected' : '' ?>>DESC</option>
                    <option value="asc" <?= isset($_GET['sort_email']) && $_GET['sort_email'] === 'asc' ? 'selected' : '' ?>>ASC</option>
                </select>
            </div>

            <div class="col-3 mb-5 mb-lg-0">
                <button type="submit" class="btn btn-primary w-100">Применить</button>
            </div>
        </form>
        <div class="row">
            <div class="col-12 mb-5 mb-lg-0 mx-auto">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">Автор</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Отрывок</th>
                            <th scope="col">Ссылка</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php
                            foreach ( $data['posts'] as $row) {                       
                                $this->getPart('parts/article', $row );
                            }
                        ?>
                    </tbody>
                </table>

                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Previous">
                                <i class="ti-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Next">
                                <i class="ti-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>