<?php
/*
* Template Name: Hiring Page Template 
*/

get_header();

?>

<div id="hr-video" class="o-panel o-panel--hirihrng-video u-margin-top-230">
   <div class="hr-video">
      <div class="grid-container hr-video__container">
         <h2 class="hr-video__title"><?php echo get_field('hr_video_title'); ?></h2>

         <div class="hr-video__embed">
            <?php echo get_field('hr_video_embed_code'); ?>
         </div>
      </div>
   </div>
</div><!-- End Video Section -->

<div id="hr-form" class="o-panel o-panel--hr-form">
   <div class="hr-form">
      <div class="grid-container hr-form__container">
         <div class="hr-form__embed">
            <?php echo get_field('hr_form_embed_code'); ?>
         </div>
      </div>
   </div>
</div><!-- End Form Section -->

<?php get_footer(); ?>
