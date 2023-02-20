<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Herbal Ayurveda
 */
?>

<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'herbal-ayurveda' ); ?></h2>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'herbal-ayurveda' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'herbal-ayurveda' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'herbal-ayurveda' ); ?></p><br />
	<div class="more-btn mt-4 mb-4">
		<a class="p-3" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('herbal_ayurveda_button_text',__('Go Back','herbal-ayurveda')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('herbal_ayurveda_button_text',__('Go Back','herbal-ayurveda')));?></span></a>
	</div>
<?php endif; ?>