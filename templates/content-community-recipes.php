<?php
$sort = (!empty(get_query_var('sort'))?get_query_var('sort'):'date');
$direction = 'desc';
if($sort=='name')
	$direction = 'asc';

$queryArgs = array( 'post_type' => 'recipe', 'showposts' => 9, 'category_name' => 'community', 'orderby' => $sort, 'order' => $direction);

if($sort=='popular'){
	$queryArgs = array( 'post_type' => 'recipe', 'showposts' => 9, 'post__in' => cb_get_popular('recipe',9,0,$currentFilter), 'orderby'=>'post__in');	
}

query_posts($queryArgs);

?>
<div id="recipes-landing">
	<section class="recipes-grid">
	<div class="container">
		<div class="row submission-link">
			<a href="/create-recipe"><h3>Submit your recipe</h3></a>
		</div>
		<div class="grid-row clearfix row">
			<?php 
					while (have_posts()) : the_post(); ?>
			<a href="<?php echo get_permalink(); ?>" class="col-md-4 col-sm-6">
			<div class="column">
				<div class="image" style="background-image:url(<?php echo first_image($post->post_content)['url']; ?>);">
					
				</div>
				<div class="info">
					<h3><?php the_title(); ?></h3>
					<!-- <div class="type">VIDEO</div> -->
					<?php require('partials/social-controls.php'); ?>
				</div>
			</div>
			</a>
			<?php endwhile; ?>
		</div>
	</div>
	</section>
</div>