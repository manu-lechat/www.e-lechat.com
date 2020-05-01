
<?php snippet('header') ?>

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


<!-- intro -->
<section class="intro appear">

  <div class="img_container">
    <img src="<?= $kirby->url('assets'); ?>/images/manu_lechat.jpg" alt="<?php $shuffle_seo($seo_array,5); ?>">
  </div>
  <h2 class="txt_splash">
   Codeur créatif
  </h2>
  <p>
    <span class="piano">Webdesigner freelance depuis plus de 10 ans,</span><br>
    <span class="piano">je mets à profit mes compétences en</span><br>
    design, animation & programmation web<br>
    <span class="piano">pour réaliser des expériences interactives.</span>
  </p>
  <p class="encart">
    <span class="piano">
    Freelance depuis 2008<br>
    Affilié à la maison des Artistes<br>
    </span>
    <span class="min">Nantes / Vannes </span>
  </p>

</section>


<section class="presentation">

  <div class="wrapper">
    <div class="col_left">
      <h2 class="">Réaliser <br>
          un projet web
      </h2>
      <p>
      Mon coeur de métier est <span class="colored">l'intégration Html5</span>
      c'est à dire convertir une maquettes graphique (réalisée dans un logiciel de mise en page) en un site fonctionnel conçu pour s'adapter à différents formats d'ecrans.
    </p>
    <p>webdesigner depuis de nombreuses années, Je peux aussi concevoir le <span class="colored">design graphique</span> des interfaces.
      Sensibilisé au motion-design je réalise également des <span class="colored">infographies vidéo </span>grace au logiciel d'animation After-effect.

    	</p>
      <p>
        Je n'utilise pas de templates préfabriqués.
        Mon métier est de m'adapter à une demande spécifique et de  <span class="colored">réaliser des sites sur-mesure</span>.
      </p>
      <p class="encart">
        conception + design + programmation<br>
        <span class="min">et une bonne dose de gestion de projet.</span>
      </p>
      <p>
        La plupart des projets donnent lieu à des collaborations : photographes, graphistes, développeurs etc...
        Dans la plupart des cas, je travaille en partenariat avec des agences web qui réalisent le design et me confient <span class="colored">l'intégration et l'animation</span> des projets,
        mais je peux aussi constituer une équipe en fonction des projets.
      </p>

      <p class="contact">
         Vous avez un projet en tête ? n'hésitez pas à <a href="mailto:lechat.manu@gmail.Com" class="soulignefx">me contacter</a>
      </p>
    </div>
    <div class="col_right ">
      <article>
        <span class="surtitre">01</span>
        <h2 class="ptititre">conception.</h2>
        <ul>
          <li>Stratégie</li>
          <li>Choix artistiques</li>
          <li>Phase créative</li>
        </ul>
          <p><span class="min">Validation du brief</span></p>
      </article>
      <article>
        <span class="surtitre">02</span>
        <h2 class="ptititre">design.</h2>
        <ul>
          <li>Création des maquettes graphiques</li>
          <li>Mise en page responsive</li>
          <li>Storyboards et animation</li>
        </ul>
          <p><span class="min">Validation du design graphique</span></p>
      </article>
      <article>
        <span class="surtitre">03</span>
        <h2 class="ptititre">programmation.</h2>
        <ul>
          <li>Mise en page des templates en css</li>
          <li>Programmation des fonctionalités</li>
          <li>Programmation du back-office</li>
        </ul>
        <p><span class="min">Mise en ligne</span></p>
      </article>
    </div>

  </div>
</section>


<section class="realisations">
  <div class="realisations_header">
    <div class="wrapper">
      <div class="realisations_header_left">
      <h2 class="">Portfolio</h2>

      </div>

    </div>
  </div>
  <br class="clear:both">
  <div class="wrapper">

      <?php $idAnchor = 0; ?>
      <?php foreach($pages->template('projects') as $projects_item): ?>

        <span  id="anchor<?php echo $idAnchor ?>" class="anchor"></span>
        <?php $idAnchor++; ?>

        <div class="projects_item active_on_scroll">
          <div class="entete_projects_item">
              <h2 class="">
                <?php echo $projects_item->title() ?>
              </h2>
              <p class="min">
                <?php echo $projects_item->text()->kirbytext(); ?>
              </p>
          </div>
        <div class="swiper-container swiper_realisations" ><!-- swiper-container -->

        <div class="swiper-wrapper"><!-- swiper-wrapper -->
          <?php foreach($projects_item->children() as $project ): ?>

            <div class="swiper-slide slide_realisations">  <!-- slide -->
            <div class="ref_screen <?php echo $project->category() ?>" >
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
                <?php  $asVideo = false;  ?>
                <?php foreach($project->videos() as $video): ?>
                <?php $asVideo = true;  ?>
                <div class="video_container"  >
                  <video autoplay muted playsinline loop  class="ref_video" data-is_video="nop" data-target_video=<?=$video->url() ?>>
                  </video>
                </div>


                <?php endforeach  ?>
              </div>
            </div>
            <div class="ref_txt  <?php echo $project->category() ?>">
                <article class="txt_wrapper">
                  <p class="date txt_color"  data-swiper-parallax="-50"><?php echo $project->annee() ?></p>
                  <h2 class="ptititre"  data-swiper-parallax="-10">
                  <?php echo $project->subtitle() ?><br>
                  </h2>
                  <p class="description" data-swiper-parallax="-15">
                  <?php echo $project->description()->kirbytextRaw() ?>
                  </p>
                  <?php if ($project->urlsite()!=""): ?>
                    <a href="<?php echo $project->urlsite() ?>"  data-swiper-parallax="-20" target="_blank" class="soulignefx min  url sounded">voir le site</a>
                  <?php endif; ?>
                </article>

                <div class="tags encart" data-swiper-parallax="-30">
                  <ul>
                    <?php foreach( $project->tags()->split() as $tag ): ?>
                    <a href="<?php echo $project->url() ?>" class="nolink">
                      <li  class="tag"><?= $tag ?></li>
                    </a>
                    <?php endforeach ?>
                  </ul>
                </div>
            </div>
          </div><!-- /slide -->

          <?php endforeach ?>
        </div>  <!-- /swiper-wrapper -->

        <div class="next_prev_container">
          <div class="bt_prev sounded"> prev</div>
          <div class=" pagination swiper-pagination"></div>
          <div class="bt_next sounded"> next <span class="clignotte">▸</span> </div>
        </div>

        </div>  <!-- swiper-container -->
      </div>  <!-- /project item -->
      <?php endforeach ?>


  </div>
</section>



<section class="apropos">
  <div class="wrapper">
    <h2>A propos</h2>
    <div class="col_untiers">
    <article>
      <span class="surtitre">_</span>
      <h3 class="ptititre">Code</h3>
      <p>
        Je code avec les langages natifs du web : Html5 css3 et Javascript pour la mise en page, et php pour l'interface de mise à jour.
        Pour ce faire je n’utilise jamais de template existant, je crée un code css sur-mesure, optimal sans rien de trop,
        <a href="<?= $kirby->url('assets'); ?>/css/main.css" target="_blank" class="">
        Voici la feuille de style de mon site par exemple.
      </a>

        Moins de code, moins de plugins, moins de wordpress pour un site au final plus light et plus simple à maintenir dans la durée. #greenIT
      </p>
    </article>
    <article>
      <span class="surtitre">_</span>
      <h3 class="ptititre">Suivi de projet</h3>
      <p>
        Cette démarche est indispensable pour produire un message synthétique, graphique et efficace.
        si besoin est, je peux jouer le rôle de chef de projet et définir avec vous objectifs de communication, choix graphiques, choix de prestataires complémentaires. Suivi de projet
      </p>
    </article>
    <article>
      <span class="surtitre">_</span>
      <h3 class="ptititre">Coworking</h3>
      <p>
        J’ai travaillé dans 6 espaces de travail partagés, de quoi construire des amitiés avec un grand nombre de créatifs talentueux dans de nombreuses spécialités : illustration, photographie, rédactionnel, graphisme etc...
      </p>
    </article>

    </div>
    <div class="col_untiers ">
      <article>
        <span class="surtitre">_</span>
        <h3 class="ptititre">Minimal design</h3>
        <p>
         En matière de web-design, le minimalisme est primordial et les animations et micro-interactions font désormais partie integrante du webdesign.
         Faire simple demande du travail et un certain savoir faire. Je peux vous aider à y voir plus clair.
        </p>
      </article>
      <article>
        <span class="surtitre">_</span>
        <h3 class="ptititre">Tarifs</h3>
        <p>
          Je base mes devis sur un montant / jour de 400€. pour des cas spécifiques comme des sites portfolio,
          je peux pratiquer un tarif adapté ( correspondant à une journée de taf environ ).
        </p>
      </article>
      <article>
        <span class="surtitre">_</span>
        <h3 class="ptititre">Animation</h3>
        <p>
          j’ai beaucoup pratiqué Flash dans une autre vie, un outil qui m'a permis d'apprendre à conjuger programmation et animation.
          Aujourd'hui j’utilise au maximum les possibilité «natives» du css qui permet des animations hyper fluides
          sur tous types d’appareils.
        </p>
      </article>
    </div>
    <div class="col_untiers ">

          <article>
            <span class="surtitre">_</span>
            <h3 class="ptititre">Interface de mise à jour.</h3>
            <p>
              Bien sur, le propriétaire des sites que je réalise a la main sur son contenu.
              Je travaille depuis quelques temps avec le cms Kirby qui me permet de créer au cas par cas une interface de mise à jour sur-mesure
              et surtout d’ajuster l’ergonomie de l’interface pour en rendre l'usage hyper simple et intuitif.

            </p>
            <img src="assets/images/interface-3.jpg" alt="<?php $shuffle_seo($seo_array,5); ?>">
            <p>
              pour en savoir plus :
              <a href="https://getkirby.com/" target="_blank" class="soulignefx">getkirby.com</a>
            </p>
          </article>
          <article>
            <span class="surtitre">_</span>
            <h3 class="ptititre">Référencement</h3>
            <p>
            Ce n’est pas magique et ça se travaille au niveau du code source. Je connais les éléments clés d'un bon référencement naturel.
          </p>
          </article>
    </div>
  </div>
</section>


<section class="merci">

  <div class="wrapper">

  	<div class="intro_container">
  		<h2>
  			Merci !<br>
  		</h2>

  	</div>
    <p class="encart">
      Vous avez une idée en tête ?<br>
      <span class="min">Mon mail :  </span><a href="mailto:lechat.manu@gmail.com" class="soulignefx" target="_blank">lechat.manu@gmail.com</a>
    </p>
  </div>
</section>


<?php snippet('footer') ?>
