<?php

global $query_string;

$query_args = explode("&", $query_string);
$performSearch = !empty(get_query_var('s'));

$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

if($performSearch){
	$search = new WP_Query($search_query);
	$total_results = $wp_query->found_posts;

	//var_dump($search);
	$posts = $search->get_posts();
}

?>
<div id="search-page">
	<div class="search-form-container">
		<?php get_search_form(); ?>
	</div>
	<?php if($performSearch): ?>
	<div class="search-results-container">
		<h2>We found <?= $total_results; ?> results for “<?= $search->query['s']; ?>”</h2>
		<ul class="search-results-nav">
			<li class="active">ALL RESULTS<span>21</span></li>
			<li class="active">MEMBERS<span>1</span></li>
			<li class="active">GROUPS<span>18</span></li>
			<li class="active">RECIPES<span>2</span></li>
			<li class="inactive">DISCUSSIONS</li>
			<li class="inactive">MEETUPS</li>
		</ul>
		<div class="results-container">
			<h3>MEMBERS<span>1</span></h3>
			<ul class="results-list results-list-members">
				<li class="result-item">
					<span class="user-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></span>
					<div class="result-info">
						<h4>Joan Stone</h4>
						<span class="city">NEW YORK, NY</span><br>
						<span class="member-status">PRO MEMBER SINCE 2013</span>
						<a class="friend-button btn-action">FRIENDS</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="results-container">
			<h3>GROUPS<span>18</span></h3>
			<ul class="results-list results-list-groups">
				<li class="result-item">
					<span class="thumbnail-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-upcoming-1.jpg'; ?>"></span>
					<div class="result-info">
						<h4 class="group-name">Expecting Mamas</h4>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<div class="group-member-names">
							<a class="group-member-name">KARA</a>,
							<a class="group-member-name">RACHEL</a>,
							<span>AND 1608 OTHERS ARE IN THIS GROUP</span>
						</div>
						<a class="join-button btn-action">JOIN GROUP</a>
					</div>
				</li>
				<li class="result-item">
					<span class="thumbnail-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-upcoming-1.jpg'; ?>"></span>
					<div class="result-info">
						<h4 class="group-name">Expecting Mamas</h4>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<a class="group-member-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-thumb-small.png'; ?>"></a>
						<div class="group-member-names">
							<a class="group-member-name">KARA</a>,
							<a class="group-member-name">RACHEL</a>,
							<span>AND 1608 OTHERS ARE IN THIS GROUP</span>
						</div>
						<a class="join-button btn-action">JOIN GROUP</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="results-container">
			<h3>RESULTS<span><?= $total_results; ?></span></h3>
			<ul class="results-list results-list-recipes">
				<?php 
				foreach($posts as $post): 
				$image = first_image($post->post_content)['url'];
				$authorName = get_the_author_meta( 'user_nicename' , $post->post_author );
				?>
				<li class="result-item">
					<a href="<?php echo get_permalink($post->ID); ?>">
					<span class="thumbnail-image" style="background-image: url(<?= $image; ?>"></span>
					<div class="result-info">
						<h4 class="recipe-title"><?= get_the_title($post->ID); ?></h4>
						<span class="author"><span class="by">BY</span><?= $authorName; ?></span>
						<?php require(get_template_directory().'/templates/partials/social-controls.php'); ?>
					</div>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		
	</div>
	<?php endif; ?>
</div>