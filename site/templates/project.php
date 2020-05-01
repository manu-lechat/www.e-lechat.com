<?php snippet('header') ?>
<div id="barba-wrapper">
  <div class="barba-container ">

<main class="project_screen">

  <section class="zone_texte entete">
    <div class="wrapper">
      <div class="text_wrapper">
        <h2 class="surtitre">
          <?php echo $page->parent()->title() ?>
        </h2>
        <h1>
          <?php echo $page->objectif() ?><br>
        </h1>
        <div class="tags">
          <ul>
            <?php foreach( $page->tags()->split() as $tag ): ?>
              <li  class="tag"><?= $tag ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
      <div class="text_wrapper">
        <h2 class="surtitre">
          <?php echo $page->subtitle() ?>
        </h2>
        <h3 class="ptititre">Contexte</h3>
        <p>
        <?php echo $page->contexte()->kirbytextRaw() ?>
        </p>
        <h3 class="ptititre">Réalisation</h3>
        <p>
        <?php echo $page->realisation()->kirbytextRaw() ?>
        </p>
        <?php if($page->urlsite() != ""): ?>
          <a class="urlsite" target="_blank" href="<?= $page->urlsite() ?>">
            visiter le site
          </a>
        <?php endif ?>
      </div>
    </div>

  </section>
  <div class="screens_wrapper">
    <div class=" wrapper">

      <!-- images -->
      <?php  $imgId = 0;?>
      <?php foreach( $page->images_projet()->yaml() as $image ): ?>
        <?php  $imgId++;?>
        <?php if( $image = $page->image($image) ): ?>
          <div class="img_wrapper  img_wrapper_<?php echo $imgId;?>">
            <img src="<?= $image->url() ?>"   alt="<?php $image->alt();?> " >
          </div>
        <?php endif ?>
      <?php endforeach ?>

      <!-- video -->
      <?php foreach($page->videos() as $video): ?>
      <div class="img_wrapper"  >
        <video autoplay muted playsinline loop>
            <source src="<?=$video->url() ?>" type="video/mp4">
        </video>
      </div>
      <?php endforeach  ?>
  	</div>
</div>
  <section class="zone_texte bottom_contact_link">
      <div class="wrapper">
      	<h2>Ok !</h2>
        <br>
        <p class="encart">
         <span class="bold">Vous avez un projet en similaire : </span>
         <br>
         N'hésitez pas à
         <a href="mailto:contact@e-lechat.com" class="soulignefx">me contacter</a>
        </p>
      </div>
    </section>


<div class="projet_next">
  <div class="wrapper">
    <?php if($next = $page->next()): ?>
    <a href="<?= $next->url() ?>">
      <h2>next page</h2><br>
      <h2 class="ptititre"><?= $next->subtitle() ?></h2>
    </a>
    <?php elseif($next = $page->parent()->next()): ?>
      <?php if($next = $page->parent()->next()->children()->first()): ?>
      <a class="" href="<?= $next->url() ?>">
        <h2>next page</h2><br>
        <h2 class="ptititre"><?= $next->subtitle() ?></h2>
      </a>
      <?php else: ?>
        <a class="" href="<?= $site->url() ?>">
          <h2>next page</h2><br>
          <h2 class="ptititre">Retour à l'accueil</h2>
        </a>
      <?php endif ?>
    <?php else: ?>
      <a class="" href="<?= $site->url() ?>">
        <h2>next page</h2><br>
        <h2 class="ptititre">Retour à l'accueil</h2>
      </a>
    <?php endif ?>
  </div>
</div>

</main>
</div>
</div>
<?php snippet('footer') ?>
