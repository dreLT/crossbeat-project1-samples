<?php
// echo(do_shortcode('[tiu-hero slug="community" layout="grid"]'));
$type = get_post_type($post);
if($type == 'recipe')
  $type = 'recipes';

$body = apply_filters( 'the_content', get_the_content()) ;

$recipe = new WPURP_Recipe( get_post() );

$firstImage = first_image($body);
?>
<div class="article-single">
  <section class="header">
    <div class="hero" style="background-image:url(<?php echo $firstImage['url']; ?>);"></div>
    <div class="title-wrapper">
      <div class="title-box">
        <h1><?php the_title(); ?></h1>
        <div class="byline">
          BY <span class="author"><?php the_author(); ?></span> <?php the_time('F j, Y'); ?> IN <span class="category"><?= $type; ?></span>
        </div>
        <?php require('partials/social-controls.php'); ?> 
      </div>
    </div>
  </section>
  <section class="body clearfix">
   <?php if($recipe->has_ingredients()): ?>
    <div class="ingredients-column">
      <h2>INGREDIENTS</h2>
      <ul class="ingredient-list">
        <?php if($recipe->has_ingredients()): ?>
          <?php foreach ($recipe->ingredients() as $ingredient): 
            // var_dump($ingredient);
            // var_dump($recipe->instructions());
            ?>
          <li><span class="quantity"><?= $ingredient['amount']; ?></span><p><span class="unit"><?= $ingredient['unit']; ?></span> <span class="ingredient"><?= $ingredient['ingredient']; ?></span></p></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="details-column">
      <?php if($recipe->notes()): ?>
        <div class="author-notes">
          <h2>AUTHOR NOTES</h2>
          <?php echo $recipe->notes(); ?>
        </div>
      <?php endif; ?>
        <?php if($recipe->has_instructions()): ?>
          <h2>DIRECTIONS</h2>
          <div class="directions">
          <?php foreach ($recipe->instructions() as $instruction): ?>
              <div class="direction">
                <?= $instruction['description']; ?>
              </div>
          <?php endforeach; ?>
          </div>
          <div class="tags">
            <h2>TAGS</h2>
            <p>Snacks  M3  Avocado  White Bean  Vegetarian</p>
          </div>
      <?php endif; ?>
    </div>
  <?php else: echo str_replace($firstImage['tag'], '', $body); ?>
  <?php endif; ?>
  </section>
  <?php
  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
  ?>
</div>