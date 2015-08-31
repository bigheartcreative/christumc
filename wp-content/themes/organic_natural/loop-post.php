<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

<h1 class="headline"><?php the_title(); ?></h1>

<?php 
/* CUMC remove ?>

<div class="post-author">
	<p class="align-left"><i class="icon-time"></i> &nbsp;<?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> <?php _e("by", 'organicthemes'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
	<p class="align-right"><i class="icon-comment"></i> &nbsp;<a class="scroll" href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
</div>

/* END CUMC remove */ ?>

<?php if (has_post_format('gallery')) { ?>

	<?php get_template_part( 'content/gallery', 'slider' ); ?>
	
<?php } else { ?>

	<?php if(of_get_option('display_feature_post') == '1') { ?>
		<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
			<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
		<?php } else { ?>
			<?php if ( has_post_thumbnail()) { ?>
				<div class="feature-img"><?php the_post_thumbnail( 'featured-large' ); ?></div>
			<?php } ?>
		<?php } ?>
	<?php } ?>

<?php } ?>

<?php the_content(); ?>

<?php wp_link_pages(array(
	'before' => '<p class="page-links"><span class="link-label">' . __('Pages:', 'organicthemes') . '</span>',
	'after' => '</p>',
	'link_before' => '<span>',
	'link_after' => '</span>',
	'next_or_number' => 'next_and_number',
	'nextpagelink' => __('Next', 'organicthemes'),
	'previouspagelink' => __('Previous', 'organicthemes'),
	'pagelink' => '%',
	'echo' => 1 )
); ?>

<?php if(of_get_option('display_social_post') == '1') { ?>
<div class="social radius-full">
	<div class="like-btn">
		<div class="fb-like" href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
	</div>
	<div class="tweet-btn">
		<a href="http://twitter.com/share" class="twitter-share-button"
		data-url="<?php the_permalink(); ?>"
		data-via="<?php echo of_get_option('twitter_user'); ?>"
		data-text="<?php the_title(); ?>"
		data-related=""
		data-count="horizontal"><?php _e("Tweet", 'organicthemes'); ?></a>
	</div>
	<div class="plus-btn">
		<g:plusone size="medium" annotation="bubble" href="<?php the_permalink(); ?>"></g:plusone>
	</div>
</div>
<?php } ?>

<!-- BEGIN .post-meta -->
<div class="post-meta radius-full">
	<p><i class="icon-reorder"></i> &nbsp;<?php _e("Category:", 'organicthemes'); ?> <?php the_category(', '); ?> <?php $tag_list = get_the_tag_list( __( ", ", 'organization' ) ); if ( ! empty( $tag_list ) ) { ?> &nbsp; &nbsp; <i class="icon-tags"></i> &nbsp;<?php _e("Tags:", 'organization'); ?> <?php the_tags(''); } ?></p>
<!-- END .post-meta -->
</div>

<!-- BEGIN .post-navigation -->
<div class="post-navigation">
	<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
	<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
<!-- END .post-navigation -->
</div>

<?php 
/* CUMC remove
if ( comments_open() || '0' != get_comments_number() ) comments_template();
/* END CUMC remove */ ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>

<?php endif; ?>