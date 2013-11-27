<section role="important">
  <div class="row" id="hometop">
    <div class="col-md-12" id="introhome">
      <h2>Associazione Italiana Supporto e Traduzione Mozilla</h2>
      <p>Siamo un'associazione senza fini di lucro che si dedica alla traduzione italiana, al supporto e alla promozione 
      dei prodotti della <a href="http://www.mozilla.org/">Mozilla Foundation</a> e derivati.</p>
      <p>In questo sito è raccolto il nostro lavoro: software, traduzioni, articoli e guide.</p>
      <p>Vi raccomandiamo di consultare i <a href="http://forum.mozillaitalia.org/">nostri forum</a>, per chiedere informazioni 
      o segnalare problemi su tutto ciò che pubblichiamo e, ovviamente, anche per offrire aiuto.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?php
        $sticky = get_option('sticky_posts');
        rsort($sticky);
        $sticky = array_slice( $sticky, 0, 5);
        query_posts(array( 'post__in' => $sticky, 'caller_get_posts' => 1));
        
        $titoli = array();
        $link = array();
        $immagini = array();
        
        if (have_posts()) :
            while (have_posts()) : 
                the_post();
                $titoli[] = get_the_title();
                $sommari[] = get_the_excerpt();
                $link[] = get_permalink();
                $immagini[] = get_the_post_thumbnail($post_id, 'full', array('class' => ''));
            endwhile;
        endif;    

        $numerostickypost = count($titoli);
        if ($numerostickypost>0) {
          echo '<div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
          ';
          for ($i=0; $i < count($titoli); $i++) {
            if ($i==0) {
              echo '  <li data-target="#myCarousel" data-slide-to="' . $i . '" class="active"></li>
              ';  
            } else {
              echo '  <li data-target="#myCarousel" data-slide-to="' . $i . '"></li>';  
            }        
          }
          echo '
          </ol>
          <div class="carousel-inner">
          ';
          for ($i=0; $i < count($titoli); $i++) {
            if ($i==0) {
              echo '  <div class="item active">';
            } else {
              echo '<div class="item">';
            }

            echo '
              ' . $immagini[$i] . '
              <div class="carousel-caption">
                <h4>' . $titoli[$i] . '</h4>
                <p>' . $sommari[$i] . '</p>
              </div>
            </div>';
          }
          echo '                  
          </div>
          <a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a>
        </div>
        ';      
        }    
      ?>
    </div>
    <div class="download-button col-md-4">
      <h2>Download</h2>
      <a href="//affiliates.mozilla.org/link/banner/27550"><img src="//affiliates.mozilla.org/media/uploads/banners/f5eeeddc214ed8ef15e48bc80e1f53b0da4f0574.png" alt="Download: Fast, Fun, Awesome" /></a>
      <a href="//affiliates.mozilla.org/link/banner/46920"><img src="//affiliates.mozilla.org/media/uploads/banners/a47240839834560ba213f2ed7df82697d6bc7766.png" alt="Download Aurora" /></a>
      <a href="//affiliates.mozilla.org/link/banner/46917"><img src="//affiliates.mozilla.org/media/uploads/banners/11780af1fc7070bf3173ae707cf83cc2bad6216d.png" alt="Thunderbird" /></a>
      <a href="//affiliates.mozilla.org/link/banner/46918"><img src="//affiliates.mozilla.org/media/uploads/banners/a923c2ca8aaa6e720053fcc0ac4a51f520d0cabc.png" alt="Android" /></a>
      <a href="//affiliates.mozilla.org/link/banner/46919"><img src="//affiliates.mozilla.org/media/uploads/banners/21667af8d37e6766384104cdd8f96ee479e56221.png" alt="Firefox OS" /></a>
    </div>
  </div>
</section>