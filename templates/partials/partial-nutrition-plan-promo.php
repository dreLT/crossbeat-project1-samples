<?php

$nutritionPlan = get_tiu_hero('nutrition-plan-global');

if (is_array($nutritionPlan) && count($nutritionPlan) == 1){
	$nutritionPlan = $nutritionPlan[0];
}

if(!empty($nutritionPlan)):

?>
<div class="row nutrition">
	<span class="hero">
		<img src="<?= $nutritionPlan->tiles[0]->image ?>">
	</span>
	<div class="cta-wrapper"> 
        <div class="logo"><img src="<?= get_template_directory_uri() . '/assets/images/g-header-logo.png'; ?>"></div>
        <h1><?= $nutritionPlan->tiles[0]->header ?></h1>
        <p><?= $nutritionPlan->tiles[0]->title ?></p>
        <a href="<?= $nutritionPlan->tiles[0]->link ?>" class="btn-action"><?= $nutritionPlan->tiles[0]->footer ?></a>
    </div>   
</div>
<?php endif;