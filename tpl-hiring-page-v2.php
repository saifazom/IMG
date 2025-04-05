<?php
/*
* Template Name: Hiring Page v2 Template
*/

get_header();

?>

<div id="hr-form" class="o-panel o-panel--hr-form u-margin-top-230">
   <div class="hr-form">
      <div class="grid-container hr-form__container">
         <div class="hr-form__embed">
            <?php echo get_field('hr_form_embed_code'); ?>
         </div>
      </div>
   </div>
</div><!-- End Form Section -->

<?php get_footer(); ?>
