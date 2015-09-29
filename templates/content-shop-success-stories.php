<?php

$mainHero = get_tiu_hero('recipes-main-hero');
if (is_array($mainHero) && count($mainHero) == 1){
	$mainHero = $mainHero[0];
}

$carousel = get_tiu_hero('recipes-landing-carousel');
if (is_array($carousel) && count($carousel) == 1){
	$carousel = $carousel[0];
}

$sort = (!empty(get_query_var('sort'))?get_query_var('sort'):'date');
$direction = 'desc';
if($sort=='name')
	$direction = 'asc';

$currentFilter = get_query_var('filter');
query_posts( array( 'post_type' => 'success-stories', 'showposts' => 30, 'category_name' => get_query_var('filter'), 'orderby' => $sort, 'order' => $direction));

function setActive($filterItem,$currentFilter){
	return ($filterItem==$currentFilter?'class="active"':'');
}
?>

<div id="shop-success-stories-wrapper">
	
	<section class="success-stories-hero">
		<heading>SEE OUR SUCCESS STORIES</heading>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariaturirure dolor in reprehenderit in voluptate velit.</p>
		<div class="stories-grid">
			<?php 

					while (have_posts()) : the_post();  ?>
			<?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
				$post_thumbnail_id = get_post_thumbnail_id();
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			?>

			<a href="<?php the_permalink(); ?>" class="grid-item" style="background-image:url(<?php echo (!empty($post_thumbnail_url)?$post_thumbnail_url:first_image(get_the_content())['url']); ?>);">
					<!-- <img src="/wp-content/themes/toneitup/src/images/success-story-pic3.png"> -->
				<div class="grid-item-overlay">
					<div class="overlay-text-container">
						<h2><?php the_title(); ?></h2>
						<span>San Francisco, CA</span><br>
						<span>Joined in 2013</span>
					</div>
				</div>
			</a>
			<?php endwhile; ?>
		</div>
	</section>
	
	<?php get_template_part('templates/partials/partial','nutrition-plan-promo'); ?>

</div>