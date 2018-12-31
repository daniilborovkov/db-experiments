<?php
/**
 * Created by PhpStorm.
 * User: Ilche
 * Date: 27.12.2018
 * Time: 19:16
 */
/*
    Template Name: шаблон категории
    Template Post Type: page

*/
get_header();
// Получим ID категории

// Теперь, получим УРЛ категории

$category_this_page = get_queried_object()->term_id

?>
    <main class="main main--blog">
        <div class="blog">
            <section class="wrapper">
                <section class="blog__main-title-wrapper">
                    <h1 class="service-decryption__title">новости и статьи</h1>
                    <p class="service-decryption__subtitle">интересно о иностранных языках</p>
                </section>

                <?php get_template_part('template-parts/nav-category'); ?>


                <?php $posts = get_posts("category=" . $category_this_page . "&orderby=date&numberposts=12");
                $current_number_post = 1; ?>
                <?php if ($posts) : ?>
                    <?php for ($Y = 0;
                               $Y <= 1;
                               $Y++) { ?>
                    <?php if ($Y == 0) : ?>
                    <section class="blog-articles blog-articles--all-blog">
                        <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                            <?php if ($current_number_post < 7 && $i < 7) : ?>
                                <a href="<?php echo(get_permalink()) ?>"
                                   class="blog-article blog-article--<?php echo($current_number_post) ?>">
                                    <div class="blog-article__wrapper">
                                        <p><?php echo get_the_category()[0]->cat_name ?></p>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo get_the_date('j F Y'); ?></p>
                                    </div>
                                </a>
                                <?php $current_number_post++ ?>
                            <?php else : $current_number_post = 1; endif; ?>
                        <?php endforeach; ?>
                    </section>
                <?php else : ?>
                    <section class="blog-articles blog-articles--all-blog-2">
                        <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                            <?php if ($current_number_post < 7 & $i >= 6) : ?>
                                <a href="<?php echo(get_permalink()) ?>"
                                   class="blog-article blog-article--<?php echo($current_number_post) ?>">
                                    <div class="blog-article__wrapper">
                                        <p><?php echo get_the_category()[0]->cat_name ?></p>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo get_the_date('j F Y'); ?></p>
                                    </div>
                                </a>
                                <?php $current_number_post++ ?>

                            <?php else : $current_number_post = 1; endif; ?>
                        <?php endforeach; ?>
                    </section>
                <? endif; ?>
                <?php } ?>
                <?php if ($wp_query->max_num_pages > 1) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <div id="true_loadmore">Загрузить ещё</div>
                <?php endif; ?>
                <?php endif; ?>
            </section>
        </div>


        <!--<section class="blog-articles blog-articles--all-blog">
            <a href="" class="blog-article blog-article--1">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--2">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--3">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--4">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--5">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--6">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
        </section>
        <section class="blog-articles blog-articles--all-blog-2">
            <a href="" class="blog-article blog-article--1">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article  blog-article--2">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--3">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--4">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--5">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
            <a href="" class="blog-article blog-article--6">
                <div class="blog-article__wrapper">
                    <p>Лексика</p>
                    <h3>Заголовок статьи в две строки</h3>
                    <p>20 октября 2018</p>
                </div>
            </a>
        </section>
        <a href="#" class="blog__next">Загрузить еще >></a>
    </section>-->

        <!--        </div>
        -->
        <section class="dispatch">
            <div class="wrapper">
                <div class="dispatch__container">
                    <div class="dispatch__text">
                        <h3>ИНТЕРЕСНО?</h3>
                        <p>ПОДПИСЫВАЙТЕСЬ НА РАССЫЛКУ
                            <span> SHO SCHOOL</span>
                        </p>
                    </div>

                    <form class="dispatch__form" method='post' action='mail.php' enctype='multipart/form-data'
                          autocomplete='off'>
                        <input type="text" value="Подписка на рассылку" name="Что интересует:"
                               class="popup__name-services">
                        <div class="form-item">
                            <input type="email" class="input" id="email-dispatch" name="mail" required>
                            <label for="email-dispatch" class="label">Ваш email</label>
                        </div>
                        <input type="submit" value="ОТПРАВИТЬ" class="button dispatch__button">
                    </form>
                </div>
            </div>
        </section>
    </main>


<?php get_footer() ?>