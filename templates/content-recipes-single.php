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
          <!-- <li><span class="quantity">2</span><p><span class="unit">Tablespoon</span>&nbsp;<span class="ingredient">Olive Oil</span></p></li>
          <li><span class="quantity">2</span><p><span class="unit">Tablespoon</span>&nbsp;<span class="ingredient">Olive Oil</span></p></li>
          <li><span class="quantity">2</span><p><span class="unit">Tablespoon</span>&nbsp;<span class="ingredient">Olive Oil</span></p></li> -->
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="details-column">
      <?php if($recipe->notes()): ?>
        <div class="author-notes">
          <h2>AUTHOR NOTES</h2>
          <?php echo $recipe->notes(); ?>
          <!-- <p>Such an easy way to make an avocado an entire meal!</p> -->
        </div>
      <?php endif; ?>
        <?php if($recipe->has_instructions()): ?>
          <h2>DIRECTIONS</h2>
          <div class="directions">
          <?php foreach ($recipe->instructions() as $instruction): ?>
              <div class="direction">
                <?= $instruction['description']; ?>
              </div>
              <!-- <p>To 2 cups of cooked white beans (if you're using pre-cooked beans just make sure they're rinsed and patted dry), add 2 tablespoons of olive oil, 2 teaspoons of light-colored vinegar (white wine or champagne), 1 clove of grated or chopped garlic, the juice and zest from half a lemon, a big pinch of salt, and 1/3 cup chopped fresh herbs (any combination of mint, parsley, basil, or tarragon). Stir and taste.</p>
              <p>The beans absorb all kinds of flavor so you’ll probably need to add more of everything. Toast 1 tablespoon pine nuts in the oven or on the stove top. Halve, pit, and peel an avocado. Fill an avocado half with an overflowing scoop of white bean salad. Top with coarse flaky salt, parsley, pine nuts, and additional lemon zest. Drizzle with olive oil. Eat as is or smear on a piece of grilled bread.</p> -->
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