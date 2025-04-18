<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
    return;
    }
?>
 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
    <div class="comments__header">
        <h3 id="comments" class="comments__counter"><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h3>
        <a class="comments__round-btn u-button u-button--white" href="#comment">Leave a Comment</a>
    </div><!--/ Heading -->
     
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
     
    <ol class="commentlist">
        <?php 
            wp_list_comments( 
                // "callback=pressfore_modify_comment_output"
                array(
                    'avatar_size' => 110
                ) 
            ); 
        ?>
    </ol>
     
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
<?php else : // this is displayed if there are no comments so far ?>
 
    <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->
 
    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>
    <?php endif; ?>
<?php endif; ?>
 
<?php if ('open' == $post->comment_status) : ?>
    <div id="respond">
        <h3 class="comment-reply-title"><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h3>
        <p class="details">Thanks for choosing to leave a comment. Please keep in mind that all comments are moderated, and your email address will not be published.</p>
     
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>
     
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>

            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
         
                <?php if ( $user_ID ) : ?>
                 
                    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
                <?php else : ?>
                    <div class="form-field-wrap">
                        <div class="form-field__left">
                            <p>
                                <label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label>
                                <input type="text" name="author" id="author" placeholder="Your Name" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                            </p>
                        </div>
                         
                        <div class="form-field__right">
                            <p>
                                <label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label>
                                <input type="text" name="email" id="email" placeholder="Email Address" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
             
                <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" placeholder="Your Comment"></textarea></p>
                 
                <p>
                    <button name="submit" type="submit" id="submit" class="submit" tabindex="5" value="Submit">Submit</button>
                    <?php comment_id_fields(); ?>
                </p>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; // If registration required and not logged in ?>
    </div>
<?php endif; // if you delete this the sky will fall on your head ?>