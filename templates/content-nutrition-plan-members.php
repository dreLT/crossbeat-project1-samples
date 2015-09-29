<?php

$mainPromo = get_tiu_hero('nutrition-plan-members-main');

if (is_array($mainPromo) && count($mainPromo) == 1){
	$mainPromo = $mainPromo[0];
}
;?>

<?php
if(!empty($mainPromo)):
?>

<div id="shop-nutrition-plan-member-wrapper">
	<!-- <div class="nutrition-plan-hero" style="background-image:url(<?= $mainPromo->tiles[0]->image ?>);"> -->
	<div class="nutrition-plan-member-hero" style="background-image:url(<?= $mainPromo->tiles[0]->image ?>);">
		<div class="hero-content">
			<img id="logo-alt" class="logo" src="/wp-content/themes/toneitup/src/images/tiu-logo-white.png">
			<span>Nutrition Plan</span>
			<p class="tagline"><?= $mainPromo->tiles[0]->title ?></p>
			<!-- <a class="cta video btn-action"><img src="/wp-content/themes/toneitup/src/images/button-play.png" class="play-icon"><span>WATCH VIDEO</span></a>
			<a class="cta join btn-action"><span>JOIN NOW</span></a> -->
		</div>
	</div>
	<div class="nutrition-plan-pdf-container">
		<!-- <iframe src="http://localhost:8888/web/viewer.html" width="92%" height="600"></iframe> -->
		<iframe class="pdf-viewer" src="<?= get_template_directory_uri() . '/pdf/web/viewer.html'; ?>"></iframe>
	</div>
</div>

<?php endif; ?>