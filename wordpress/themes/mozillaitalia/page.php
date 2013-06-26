<?php 
  get_template_part('templates/header', 'header');
?>
<div class="row-fluid">
  <div class="span8">
    <section role="main">
      <?php
        if (have_posts()) {
          while (have_posts()) : 
            the_post();
            if (is_page('contatti')) {
              get_template_part('templates/contatti', 'page');
            } elseif (is_page('domanda-adesione')) {
              get_template_part('templates/adesione', 'page');
            } else {
              get_template_part('templates/page', 'page');
            }
          endwhile; 
      ?>
      <?php
        } else {
      ?>
          <header class="entry-header">
            <h1 class="entry-title">Nessun post disponibile</h1>
          </header>
      <?php
        }
      ?>
    </section>
  </div>
    <?php 
    	get_template_part('templates/sidebar', 'sidebar'); 
    ?>
  </div> <!-- class="row-fluid" -->
  <?php
  	get_template_part('templates/footer', 'footer'); 
  ?>