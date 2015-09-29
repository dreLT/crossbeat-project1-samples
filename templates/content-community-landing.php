<?php
$args = array(
		'meta_query'	=> array(
							array(
							'key' => 'cb_tags'
								)
							),
		'count_total' 	=> true,
		'filter' 		=> array(
							'user_id' => 0,
							'action' => 'activity_update'
							)
	);
$activities = bp_activity_get($args);

$args = array(
		'post_type' => 'forum',
		'order' => 'DESC',
		'orderby' => 'date'
	);
$forumQuery = new WP_Query($args);
$discussionCount = 0;
foreach($forumQuery->posts as $forum){
	$discussionCount = $discussionCount + bbp_get_forum_topic_count($forum->ID);
}

$mainHero = get_tiu_hero('community-landing-main-hero');
$carouselFirst = get_tiu_hero('community-landing-carousel-1');
$carouselSecond = get_tiu_hero('community-landing-carousel-2');
// $eventPromoHome = get_tiu_hero('featured-event-homepage');


if (is_array($mainHero) && count($mainHero) == 1){
	$mainHero = $mainHero[0];
}
if (is_array($carouselFirst) && count($carouselFirst) == 1){
	$carouselFirst = $carouselFirst[0];
}
if (is_array($carouselSecond) && count($carouselSecond) == 1){
	$carouselSecond = $carouselSecond[0];
}
// if (is_array($eventPromoHome) && count($eventPromoHome) == 1){
// 	$eventPromoHome = $eventPromoHome[0];
// }

//query_posts( array( 'post_type' => array('blog','recipe','workouts','lifestyle'), 'showposts' => 30, 'orderby' => 'date', 'order' => 'desc'));
?>
<div id="community-landing-wrapper">
	<section class="header">
		<div class="hero" style="background-image:url(<?= $mainHero->tiles[0]->image ?>);">
			<div class="title-container">
				<img src="/wp-content/themes/toneitup/src/images/tiu-logo@2x.png">
				<h1>Community</h1>
				<p><?= $mainHero->tiles[0]->title ?></p>
				<!-- <a href="<?= $mainHero->tiles[0]->link ?>" class="btn-action learn-more-button"><?= $mainHero->tiles[0]->footer ?></a> -->
			</div>
			<div class="stats">
				<div class="stat"><span class="number"><?= bp_core_get_total_member_count(); ?></span><br>MEMBERS</div>
				<div class="stat"><span class="number"><?= groups_get_total_group_count(); ?></span><br>GROUPS</div>
				<div class="stat"><span class="number"><?= EM_Events::count(); ?></span><!-- <span class="k">K</span> --><br>EVENTS</div>
				<div class="stat"><span class="number"><?= $activities['total']; ?></span><br>CHECK-INS</div>
				<div class="stat"><span class="number"><?= $discussionCount; ?></span><!-- <span class="k">K</span> --><br>DISCUSSIONS</div>
			</div>
		</div>
	</section>
	<h3>UPCOMING MEETUPS NEAR YOU 10014<a class="view-all">VIEW ALL 32 MEETUPS</a></h3>
	<img class="meetups-map" src="<?= get_template_directory_uri() . '/assets/images/meetups-map.png'; ?>">
	<div data-slides-num="2" class="swiper-container tiu-carousel" id="community-landing-carousel-1">
		<div class="swiper-wrapper">
			<?php foreach ($carouselFirst->tiles as $tile): ?>
			<a href="<?php echo $tile->link ?>" class="swiper-slide" style="background-image:url(<?php echo $tile->image ?>);">
				<div class="meetup-info">
					<h4><?php echo $tile->header ?></h4>
				</div>
				<div class="meetup-time-location">
					<?php echo $tile->title ?><br>
					<?php echo $tile->footer ?>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
		<div class="navigation">
		    <div class="swiper-button-prev" id="community-landing-carousel-1-prev"></div>
		    <div class="swiper-pagination pagination" id="community-landing-carousel-1-pagination"></div>
		    <div class="swiper-button-next" id="community-landing-carousel-1-next"></div>
		</div>
	</div>
	<div class="popular-groups">
		<h3>POPULAR GROUPS</h3>
		<div data-slides-num="3" class="swiper-container tiu-carousel" id="community-landing-carousel-2">
			<div class="swiper-wrapper">
				<?php foreach ($carouselSecond->tiles as $tile): ?>
				<a href="<?php echo $tile->link ?>" class="swiper-slide" style="background-image:url(<?php echo $tile->image ?>);">
					<div class="meetup-info">
						<h4><?php echo $tile->title ?></h4>
					</div>
					<div class="member-count"><?php echo $tile->footer ?></div>
				</a>
				<?php endforeach; ?>
			</div>
			<div class="navigation">
			    <div class="swiper-button-prev" id="community-landing-carousel-2-prev"></div>
			    <div class="swiper-pagination pagination" id="community-landing-carousel-2-pagination"></div>
			    <div class="swiper-button-next" id="community-landing-carousel-2-next"></div>
			</div>
		</div>
	</div>
	<div class="discover-groups-container">
		<h3>DISCOVER GROUPS</h3>
		<ul class="discover-groups-nav">
			<li class="group-category active">ALL</li>
			<li class="group-category active">EXERCISE</li>
			<li class="group-category active">NUTRITION</li>
			<li class="group-category active">SUPPORT</li>
			<li class="group-category active">LOCATIONS<a><img class="down-arrow" src="/wp-content/themes/toneitup/assets/images/g-discover-search.png"></a></li>
			<?php require(locate_template('templates/partials/partial-sort-dropdown-groups.php')); ?>
			<!-- <div class="sort-filter">
				<img class="down-arrow" src="/wp-content/themes/toneitup/assets/images/caret-drop-up.png">
			</div> -->
		</ul>
		<ul class="results-list results-list-groups">
			<li class="result-item">
				<a class="thumbnail-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-upcoming-1.jpg'; ?>"></a>
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
				<a class="thumbnail-image" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/g-meet-upcoming-1.jpg'; ?>"></a>
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
</div>

