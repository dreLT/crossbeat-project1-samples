<?php
$nutritionPlanTop = get_tiu_hero('nutrition-plan-page-top');
$bodyFirst = get_tiu_hero('nutrition-plan-page-body-1');
$bodySecond = get_tiu_hero('nutrition-plan-page-body-2');
$testimonials = get_tiu_hero('nutrition-plan-testimonials');

if (is_array($nutritionPlanTop) && count($nutritionPlanTop) == 1){
	$nutritionPlanTop = $nutritionPlanTop[0];
}
if (is_array($bodyFirst) && count($bodyFirst) == 1){
	$bodyFirst = $bodyFirst[0];
}
if (is_array($bodySecond) && count($bodySecond) == 1){
	$bodySecond = $bodySecond[0];
}
if (is_array($testimonials) && count($testimonials) == 1){
	$testimonials = $testimonials[0];
}

$currentFilter = get_query_var('filter');
query_posts( array( 'post_type' => 'success-stories', 'showposts' => 8, 'orderby' => 'date', 'order' => 'desc'));

;?>

<div id="shop-nutrition-plan-wrapper">
	<div class="nutrition-plan-hero" style="background-image:url(<?= $nutritionPlanTop->tiles[0]->image ?>)">
		<div class="hero-content">
			<img id="logo-alt" class="logo" src="/wp-content/themes/toneitup/src/images/tiu-logo-white.png">
			<span><?= $nutritionPlanTop->tiles[0]->header ?></span>
			<!-- <p class="tagline">Increase your metabolism,<br> and achieve your Dream Body!</p> -->
			<p class="tagline"><?= $nutritionPlanTop->tiles[0]->title ?></p>
			<a class="cta video btn-action"><span><img src="/wp-content/themes/toneitup/src/images/button-play.png" class="play-icon">WATCH VIDEO</span></a>
			<a href="<?= $nutritionPlanTop->tiles[0]->link ?>" class="cta join btn-action"><span><?= $nutritionPlanTop->tiles[0]->footer ?></span></a>
		</div>
	</div>
	<section class="nutrition-point1">
		<h2>WHAT'S INSIDE OF <?= $bodyFirst->tiles[0]->title ?></h2>
		<p><?= $bodyFirst->tiles[0]->header ?></p>
		<div class="point-hero" style="background-image:url(<?= $bodyFirst->tiles[0]->image ?>)">
			<!-- <img class="hero-image" src="/wp-content/themes/toneitup/src/images/nutrition-plan-point1.png"> -->
			<div class="hero-content">
				<div class="tagline">
					<p><span>WHAT'S<br> INSIDE</span><br><span>of</span><br><span><?= $bodyFirst->tiles[0]->title ?></span></p>
				</div>
				<div class="more-info-container more-info1">
					<img id="logo-alt" class="logo" src="/wp-content/themes/toneitup/src/images/button-more-info.png">
					<div class="info-container">
						<p>LOREM IPSUM DOLOR AMIT</p>
						<p>Duis aute irure dolor in reprehenderit in voluptate sunt in culpa qui officia deserunt</p>
					</div>
				</div>
				<div class="more-info-container more-info2">
					<img id="logo-alt" class="logo" src="/wp-content/themes/toneitup/src/images/button-more-info.png">
					<div class="info-container">
						<p>LOREM IPSUM DOLOR AMIT</p>
						<p>Duis aute irure dolor in reprehenderit in voluptate sunt in culpa qui officia deserunt</p>
					</div>
				</div>
				<div class="more-info-container more-info3">
					<img id="logo-alt" class="logo" src="/wp-content/themes/toneitup/src/images/button-more-info.png">
					<div class="info-container">
						<p>LOREM IPSUM DOLOR AMIT</p>
						<p>Duis aute irure dolor in reprehenderit in voluptate sunt in culpa qui officia deserunt</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="nutrition-point2">
		<h2>TAILORED FOR YOUR NEEDS</h2>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariaturirure dolor in reprehenderit in voluptate velit.</p>
		<div class="point-hero" style="background-image:url(<?= $bodySecond->tiles[0]->image ?>)">
			<!-- <img class="hero-image" src="/wp-content/themes/toneitup/src/images/nutrition-plan-point2.png"> -->
			<div class="tagline">
				<span><?= $bodySecond->tiles[0]->header ?></span><br>
				<span><?= $bodySecond->tiles[0]->title ?></span>
				<p><?= $bodySecond->tiles[0]->footer ?></p>
				<a href="<?= $bodySecond->tiles[0]->link ?>" class="cta btn-action">JOIN NOW</a>
			</div>
		</div>
	</section>
	
	<section class="success-stories">
		<h2>HEAR OUR SUCCESS STORIES</h2>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariaturirure dolor in reprehenderit in voluptate velit.</p>
		<div class="background" style="background-image: url('<?= $testimonials->tiles[0]->image ?>');">
			<div class="text-container">
				<div class="background-name">MEET AMANDA</div>
				<p class="background-quote">The best part about the Tone It Up Nutrition Plan was that by the third day I felt thinner, less bloated, more energy.</p>
				<a href="<?= $testimonials->tiles[0]->link ?>" class="background-cta">HEAR HER SUCCESS STORY</a>
			</div>
		</div>
		<ul class="people-list">
			<?php 
				$count = 0;
				while (have_posts() && $count < 9) : the_post(); $count++;
			?>
			<li class="person">
				<?php
					$post_thumbnail_id = get_post_thumbnail_id();
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
				<a href="<?php the_permalink(); ?>" class="person-image" style="background-image:url(<?php echo (!empty($post_thumbnail_url)?$post_thumbnail_url:first_image(get_the_content())['url']); ?>);"></a>
				<a href="<?php the_permalink(); ?>" class="person-name"><?php the_title(); ?></a>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	
	<div id="nutrition-plan-video-modal">
		<div class="video-container">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/NYRwgS5_2Lg" frameborder="0" allowfullscreen></iframe>
			<img class="close-button" src="<?= get_template_directory_uri() . '/assets/images/icon-x-white.png'; ?>">
		</div>
	</div>
</div>