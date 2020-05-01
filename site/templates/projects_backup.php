
<?php snippet('header') ?>

<a href="<?= $site->url(); ?>" class="bouton_portfolio">Voir mon porfolio</a>


<main class="project">

   <section class="realisations">

     <div class="wrapper">

         <?php  $projects_item = $page;  ?>


           <div class="projects_item active_on_scroll">
             <div class="entete_projects_item">
                 <h1 class="">
                   <?php echo $projects_item->title() ?>
                 </h1>
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
                       <img src="<?= $image->thumb(['width' => 720])->url() ?>"   alt="<?= $image->alt() ?>"  class="img_<?php echo $imgId;?>">
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


           </div>  <!-- swiper-container -->
         </div>  <!-- /project item -->

         <center>
         <a href="<?= $site->url(); ?>" class="bouton_rounded">Voir mon porfolio</a>
         </center>

     </div>
   </section>

</main>
       <?php snippet('footer') ?>
