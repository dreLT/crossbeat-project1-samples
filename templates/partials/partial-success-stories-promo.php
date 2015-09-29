<?php
$sort = (!empty(get_query_var('sort'))?get_query_var('sort'):'date');
$direction = 'desc';
if($sort=='name')
	$direction = 'asc';

$currentFilter = get_query_var('filter');
query_posts( array( 'post_type' => 'testimonials', 'showposts' => 8, 'category_name' => get_query_var('filter'), 'orderby' => $sort, 'order' => $direction));

;?>

<section class="success-stories">
	<heading>HEAR OUR SUCCESS STORIES</heading>
	<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariaturirure dolor in reprehenderit in voluptate velit.</p>
	<div class="background" style="background-image: url('/wp-content/themes/toneitup/src/images/testimonial-background.png');">
		<div class="text-container">
			<div class="background-name">MEET<br> AMANDA</div>
			<p class="background-quote">"The best part about the Tone It Up Nutrition Plan was that by the 3rd day I felt different (thinner, less bloated, more energy)"</p>
			<a class="background-cta">HEAR HER SUCCESS STORY</a>
		</div>
	</div>
	<ul class="people-list">
		<?php 
			$count = 0;
			while (have_posts() && $count < 9) : the_post(); $count++;
		?>
		<li class="person">
			<a class="person-image" style="background-image: url('/wp-content/themes/toneitup/src/images/g-meet-thumb-small.png');"></a>
			<a class="person-name">KARA</a>
		</li>
		<?php endwhile; ?>
	</ul>
</section>