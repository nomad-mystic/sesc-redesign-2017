<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 1/26/2016
 * Time: 5:33 PM
 *
 * @package WooFramework
 * @subpackage Template
 */

include_once('../../../wp-includes/query.php');
include_once('../../../wp-includes/functions.php');
global $woo_options, $wp_query;

//$page_href = 'pageHref';
//var_dump($page_href);

function pageCreation()
{
//     get_header();
     $category_name = $_GET['pageHref'];
//     $testing_text = '<p>Testing Paragraph</p>';
//     $category_name = $page_href;
     $output = [];
     // WP_Query arguments
     $args = array(
          'post_type'              => array('resources_post'),
          'category_name'          => $category_name,
          'order'                  => 'ASC',
          'orderby'                => 'title',
          'posts_per_page'         =>  '-1'
     );
     // The Query
     $query = new WP_Query($args);
     // The Loop
     if ($query->have_posts()) {
          while ($query->have_posts()) {
               $query->the_post();
               $individual_post = '';
               $individual_post .= '<div class="entry-content">';
               $individual_post .= the_content();
               $individual_post .= '</div>';
               array_push($output, $individual_post);
          }
     }
     return $output;
}

$testing_text = pageCreation();

echo json_encode($testing_text);