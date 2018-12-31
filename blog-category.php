<?php
/**
 * Template Name: шаблон категории
 * Template Post Type: page
 */
get_header();

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

            <?php 
                $posts = get_posts("category=" . $category_this_page . "&orderby=date&numberposts=6");
                $current_number_post = 1; 
            ?>

            <?php if ($posts): ?>
                <section class="blog-articles blog-articles--all-blog">
                    <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                        <a href="<?php echo(get_permalink()) ?>"
                           class="blog-article blog-article--<?php echo($i + 1) ?>">
                            <div class="blog-article__wrapper">
                                <p><?php echo get_the_category()[0]->cat_name ?></p>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_the_date('j F Y'); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <button id="true_loadmore">Загрузить ещё</button>
        </section> <!-- .wrapper -->
    </div> <!-- .blog -->

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
</main> <!-- main -->


<?php get_footer(); ?>