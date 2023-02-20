<?php
//about theme info
add_action( 'admin_menu', 'herbal_ayurveda_gettingstarted' );
function herbal_ayurveda_gettingstarted() {
	add_theme_page( esc_html__('About Herbal Ayurveda', 'herbal-ayurveda'), esc_html__('About Herbal Ayurveda', 'herbal-ayurveda'), 'edit_theme_options', 'herbal_ayurveda_guide', 'herbal_ayurveda_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function herbal_ayurveda_admin_theme_style() {
	wp_enqueue_style('herbal-ayurveda-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('herbal-ayurveda-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'herbal_ayurveda_admin_theme_style');

//guidline for about theme
function herbal_ayurveda_mostrar_guide() { 
	//custom function about theme customizer
	$herbal_ayurveda_return = add_query_arg( array()) ;
	$herbal_ayurveda_theme = wp_get_theme( 'herbal-ayurveda' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Herbal Ayurveda', 'herbal-ayurveda' ); ?> <span class="version"><?php esc_html_e( 'Version', 'herbal-ayurveda' ); ?>: <?php echo esc_html($herbal_ayurveda_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','herbal-ayurveda'); ?></p>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'herbal-ayurveda' ); ?></button>
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'herbal-ayurveda' ); ?></button>
		</div>

		<?php
			$herbal_ayurveda_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$herbal_ayurveda_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Herbal_Ayurveda_Plugin_Activation_Settings::get_instance();
				$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
				?>
				<div class="herbal-ayurveda-recommended-plugins">
				    <div class="herbal-ayurveda-action-list">
				        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
				                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','herbal-ayurveda'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($herbal_ayurveda_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'herbal-ayurveda' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Herbal Ayurveda is a theme for campaign, candidate, democrat, election, government, Ayurveda, Herbal Ayurveda, Ayurveda candidate, Ayurveda donation, Ayurveda event, Ayurveda party, Ayurveda, politician, politics, republican websites. This theme is perfectly made by our expert team for the users who want to establish their ayurvedic business online. It is amazing with its to notch features and compatibility with different plugins. Anyone can kick start their business in few clicks with the help of this theme. Also, it has color changing option so if the users who want to change the color of this theme according to their taste and brand can easily change it. With that users can also personalize fonts, sections, image, header, footer, etc. Herbal Ayurveda is best for all the users. This multipurpose theme has everything one needs to build the site. It has fantastic testimonial section and beautiful layouts. This responsive theme is best because of its SEO friendly nature and Compatibility with woo commerce. It makes the site rank higher on search engine result pages effortlessly. In few clicks your niche specific website will get ready without any hassle and stress. Now social movements, NGO’s, crowd-funding campaigns can kick start their website.','herbal-ayurveda'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'herbal-ayurveda' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'herbal-ayurveda' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'herbal-ayurveda' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'herbal-ayurveda'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'herbal-ayurveda'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'herbal-ayurveda'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'herbal-ayurveda' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','herbal-ayurveda'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_about_us_section') ); ?>" target="_blank"><?php esc_html_e('About Section','herbal-ayurveda'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','herbal-ayurveda'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','herbal-ayurveda'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','herbal-ayurveda'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','herbal-ayurveda'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','herbal-ayurveda'); ?></span><?php esc_html_e(' Go to ','herbal-ayurveda'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','herbal-ayurveda'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','herbal-ayurveda'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','herbal-ayurveda'); ?></span><?php esc_html_e(' Go to ','herbal-ayurveda'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','herbal-ayurveda'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','herbal-ayurveda'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','herbal-ayurveda'); ?> <a class="doc-links" href="<?php echo esc_url( HERBAL_AYURVEDA_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','herbal-ayurveda'); ?></a></p>
			  	</div>
			</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Herbal_Ayurveda_Plugin_Activation_Settings::get_instance();
			$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
			?>
				<div class="herbal-ayurveda-recommended-plugins">
				    <div class="herbal-ayurveda-action-list">
				        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
				                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'herbal-ayurveda' ); ?></h3>
				<hr class="h3hr">
				<div class="herbal-ayurveda-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','herbal-ayurveda'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'herbal-ayurveda' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','herbal-ayurveda'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','herbal-ayurveda'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','herbal-ayurveda'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','herbal-ayurveda'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','herbal-ayurveda'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

	</div>
</div>

<?php } ?>