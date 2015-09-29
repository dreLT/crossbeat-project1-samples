<?php 

$mainHero = get_tiu_hero('members-main-hero');
if (is_array($mainHero) && count($mainHero) == 1){
	$mainHero = $mainHero[0];
}

$dealsCarousel = get_tiu_hero('members-deals-carousel');
if (is_array($dealsCarousel) && count($dealsCarousel) == 1){
	$dealsCarousel = $dealsCarousel[0];
}

;?>

<div id="members-wrapper">
	<section class="nutrition-point1">
		<div class="point-hero" style="background-image:url(<?= $mainHero->tiles[0]->image; ?>);">
			<!-- <img class="hero-image" src="/wp-content/themes/toneitup/src/images/nutrition-plan-point1.png"> -->
			<div class="hero-content">
				<div class="tagline">
					<p><span>ON SALE</span><br><span><?= $mainHero->tiles[0]->header ?></span><span>%</span> <span>OFF</span><span><?= $mainHero->tiles[0]->title ?></span></p>
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

	<section class="card-carousel" id="deals">
		<heading>DEALS<img class="search-icon" src="/wp-content/themes/toneitup/src/images/g-discover-search.png"></heading>
		<!-- <div class="view-dropdown">
			<span>VIEW:</span>
			<span>ALL</span>
			<img src="/wp-content/themes/toneitup/src/images/caret-drop-up.png">
		</div> -->
		<?php require(locate_template('templates/partials/partial-sort-dropdown-blog.php')); ?>
		
		<div data-slides-num="3" data-space-between="30" class="tiu-carousel shop-carousel-small small1 swiper-container" id="shop-home-small-carousel1">
			<div class="swiper-wrapper">

				<?php foreach($dealsCarousel->tiles as $tile): ?>	
				<a href="<?php echo $tile->link; ?>" class="card card1 swiper-slide">
					<div class="card-image" style="background-image: url(<?php echo $tile->image; ?>)"></div>
					<div class="card-info-container">
						<h1 class="title"><?php echo $tile->title; ?></h1>
						<span class="price"><?php echo $tile->footer; ?></span>
					</div>
					<div class="sale-tag">SALE</div>
				</a>
				<?php endforeach; ?>

			</div>
			<div class="navigation">
				<span class="left-arrow swiper-button-prev" id="shop-home-small-carousel1-prev"></span>
				
					<div class="swiper-pagination" id="shop-home-small-carousel1-pagination"></div>

				<span class="right-arrow swiper-button-next" id="shop-home-small-carousel1-next"></span>
			</div>
		</div>
	</section>

	<?php if($post->post_content != "") : ?>
	<section class="faqs" id="faq">
		<header>FAQ</header>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</section>
	<?php endif; ?>
		<!-- <ul>
			<li class="faq-item">
				<div class="question-container">
					<p><span>Q:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
				<div class="answer-container">
					<p><span>A:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
			</li>
			<li class="faq-item">
				<div class="question-container">
					<p><span>Q:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
				<div class="answer-container">
					<p><span>A:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
			</li>
			<li class="faq-item">
				<div class="question-container">
					<p><span>Q:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
				<div class="answer-container">
					<p><span>A:</span>Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolor sit met Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet lorem ipsum dolo.</p>
				</div>
			</li>
		</ul> -->

	<?php get_template_part('templates/partials/partial','nutrition-plan-promo'); ?>

</div>