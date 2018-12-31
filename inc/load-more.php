<?php

/**
 * Package db-experiments/inc
 */

function db_experiments_load_more_ajax_handler () {
  $args = json_decode( stripslashes($_POST['query']), true );
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  query_posts( $args );

  if (have_posts()): the_post();
    while (have_posts):

      the_title( '<h3>', '</h3>' );

    endwhile;
  endif;
}