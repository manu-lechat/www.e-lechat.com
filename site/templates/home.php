<?php snippet('header') ?>
<div id="barba-wrapper">
  <div class="barba-container ">

    <main class="home_screen">

<!-- zone three.js -->
<div class="canvas_container" id="canvas_container">
    <div id="three_container" class="zone_three"></div>
</div>

<header class="header">
  <a class="contact" href="tel:O661927909" target="_blank">06 61 92 79 09</a>
  <a class="contact" href="mailto:contact@e-lechat.com" target="_blank">contact@e-lechat.com</a>
</header>

<!-- intro -->
<section class="intro" id="intro">

  <div class="img_container">
    <img src="<?= $kirby->url('assets'); ?>/images/manu_lechat.jpg" alt="<?php echo $site->title().", ".$page->title() ?>">
  </div>
  <h3 class="surtitre ">Manu Lechat</h3>
  <h2 class="txt_splash">
   Codeur créatif
  </h2>
  <div class="accroche">
    <p class="light">Integrateur et webdesigner</p>
    <p class="light">je mets à profit mes compétences en</p>
    <p class="light">webdesign, animation & programmation</p>
    <p class="light">pour créer des projets interactifs.</p>
  </div>
  <p class="encart">
    <span class="">
    Freelance depuis 2008<br>
    Affilié à la maison des Artistes<br>
    </span>
    <span class="light">Nantes / Vannes </span>
  </p>

</section>

<div class="scrollDown"></div>

<?php
$seo_array  = array();
$seo_words = $site->title();
foreach( $site->seo_tags()->split() as $tag ):
  $seo_words.=" - ".$tag;
  array_push ( $seo_array, $tag);
endforeach;

$shuffle_seo =  function($array, $nb){
  shuffle($array);
  for($i = 1; $i < $nb; ++$i) {
      if($i < count($array)){
        print_r($array[$i].", ");
      }
    }
};

$vireBadCars = function($chaineBad){

 $str=$chaineBad;
 $str=str_replace("'", "-", $str);
 $str=str_replace(" ", "-", $str);
 $str=str_replace("%20", "-", $str);
 $str=str_replace("�", "o", $str);
 $str=str_replace("�", "e", $str);
 $str=str_replace("�", "e", $str);
 $str=str_replace("�", "a", $str);
 print_r($str);
};
?>




<!-- présentation -->
<section class="presentation zone_texte">
  <div class="wrapper">
    <div class="text_wrapper">
      <h2 class="titre">Réaliser<br>un projet web</h2>
      <p>
      Mon cœur de métier est <span class="bold">l'intégration Html5</span>.<br>
      Le plus ouvent en partenariat avec une agence de communication qui réalise le webdesign en amont,
      je prends le relais pour convertir la maquette graphique en un site fonctionnel.
        Mon métier est de m'adapter à une demande spécifique et de  <span class="bold">réaliser des sites sur-mesure</span> ... au pixel près.
      </p>



      <p>
        Webdesigner depuis de nombreuses années,
        Je peux aussi concevoir le <span class="bold">design graphique</span> des interfaces.
        J'ai beaucoup utilisé Flash à mes début,
        ce qui m'a permis de développer un gout certain pour <span class="bold">l'animation</span>
        que je mets à profit aujourd'hui dans les interfaces en Html5/Css3 ou dans le <span class="bold">motion-design</span> pour réaliser des infographies vidéo sous After-effect.
    	</p>


      <p class="encart">
       <span class="bold">Vous avez un projet en similaire : </span>
       <br>
       N'hésitez pas à
       <a href="mailto:contact@e-lechat.com" class="soulignefx">me contacter</a>
      </p>
    </div>

    <div class="col_right">
      <article><span class="surtitre">01</span>
        <h2 class="ptititre">conception.</h2>
        <ul>
          <li>Stratégie </li>
          <li>Choix artistiques</li>
          <li>Phase créative</li>
        </ul>
        </article>
        <article>
          <span class="surtitre">02</span>
          <h2 class="ptititre">design.</h2>
          <ul>
            <li>Création des maquettes graphiques </li>
            <li>Mise en page responsive</li>
            <li>Storyboards et animation</li>
          </ul>
        </article>
        <article>
          <span class="surtitre">03</span>
          <h2 class="ptititre">programmation.</h2>
          <ul>
            <li>Mise en page des templates en css </li>
            <li>Programmation des fonctionalités</li>
            <li>Programmation du back-office</li>
          </ul>
        </article>
      </div>

  </div>
</section>


<section class="realisations">
  <div class="realisations_header">
      <h2 class="">Portfolio</h2>
  </div>

      <?php $idAnchor = 0; ?>
      <?php foreach($pages->template('projects') as $projects_item): ?>
        <span  id="anchor<?php echo $idAnchor ?>" class="anchor"></span>
        <?php $idAnchor++; ?>

        <div class="projects_item">
          <div class="entete_projects_item active_on_scroll">
              <h2><?php echo $projects_item->title() ?></h2>
              <p><?php echo $projects_item->text()->kirbytext(); ?></p>
          </div>

          <?php foreach($projects_item->children() as $project ): ?>
            <?php if($project->toggleHome() == "true" ): ?>
            <div class="project_item active_on_scroll">
              <div class="screen">
                <div class="img_container">
                  <?php  $imgId = 0;?>
                  <?php foreach( $project->images_projet()->yaml() as $image ): ?>
                    <?php  $imgId++;?>
                    <?php if( $image = $project->image($image) ): ?>
                    <img src="<?= $image->thumb(['width' => 720])->url() ?>"   alt="<?php $shuffle_seo($seo_array,5); ?>"  class="img_<?php echo $imgId;?>">
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
                <!-- video -->
                <?php /* foreach($project->videos() as $video): ?>
                <div class="video_container"  >
                  <video autoplay muted playsinline loop  class="ref_video" data-is_video="nop" data-target_video=<?=$video->url() ?>>
                  </video>
                </div>
                <?php endforeach */ ?>
              </div>

              <div class="ref_txt  active_on_scroll <?php echo $project->category() ?>">
                <h2 class="ptititre">
                <?php echo $project->subtitle() ?><br>
                </h2>
                <p class="description">
                <?php echo $project->objectif()->kirbytextRaw() ?>
                </p>
                <a class="detail" href="<?php echo $project->url() ?>">En savoir plus</a>
              </div>

          </div><!-- /project_item -->
          <?php endif ?>
          <?php endforeach ?>

      </div>  <!-- /projects_item-->
      <?php endforeach ?>
</section>



<section class="apropos zone_white">
  <div class="wrapper">
    <h2 class="titre">A propos</h2>
    <div class="col_untiers">
    <article>
      <h3 class="ptititre">Code</h3>
      <p>
        Je code avec les langages natifs du web : Html5 css3 et Javascript pour la mise en page, et php pour l'interface de mise à jour.
        je crée un code css sur-mesure, optimal sans rien de trop.
      <br>
  </p>
    </article>

    <article>
      <h3 class="ptititre">Coworking</h3>
      <p>
        Je travaille depuis plus de 10 ans dans des espaces de coworkings,
        de quoi construire des amitiés avec un grand nombre de créatifs talentueux
        dans de nombreuses spécialités : webdesign, illustration, photographie, rédactionnel, graphisme etc...
      </p>
    </article>

    </div>
    <div class="col_untiers ">

      <article>
        <h3 class="ptititre">Tarifs</h3>
        <p>
          Je base mes devis en estimant au plus juste le temps de réalisation
          sur une base d'environ 400€/jours.
        </p>
      </article>
      <article>
        <h3 class="ptititre">Animation</h3>
        <p>
          j’ai beaucoup pratiqué Flash dans une autre vie, ce m'a appris à conjuger programmation et animation.
          Aujourd'hui j’utilise au maximum les possibilité «natives» du css qui permet
          des animations fluides sur tous types d’appareils avec un minimum de code.
        </p>
      </article>
    </div>
    <div class="col_untiers ">

          <article>
            <h3 class="ptititre">Cms</h3>
            <p>
              Bien sur, le propriétaire d'un site doit pouvoir en mettre à jour le contenu, pour ce faire
              j'ai adopté depuis quelques temps le cms Kirby qui offre
              un usage parfaitement intuitif.

            </p>
            <p>
              pour en savoir plus :
              <a href="https://getkirby.com/" target="_blank" class="soulignefx">getkirby.com</a>
            </p>
            <img src="assets/images/interface-3.jpg" alt="<?php $shuffle_seo($seo_array,5); ?>">

          </article>
    </div>
  </div>
</section>


    <section class="zone_texte">
      <div class="wrapper">
      	<h2>Merci !</h2>
        <br>
        <p class="encart">
         <span class="bold">Vous avez un projet en similaire : </span>
         <br>
         N'hésitez pas à
         <a href="mailto:contact@e-lechat.com" class="soulignefx">me contacter</a>
        </p>
      </div>
    </section>

    </main>
  </div>
</div>
<?php snippet('footer') ?>
