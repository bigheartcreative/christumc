<?php
/**
* The blog sidebar template for our theme.
* This template is used to display the sidebar on the blog page template.
*
* @package Natural
* @since Natural 3.0
*
*/
?>

<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>

	<div class="sidebar">
		<?php dynamic_sidebar( 'home-sidebar' ); ?>
	</div>

<?php endif; ?>