<?php

	$herbal_ayurveda_custom_css= "";

	/*---------------------------Width Layout -------------------*/

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_width_option','Full Width');
    if($herbal_ayurveda_theme_lay == 'Boxed'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='right: 100px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.row.outer-logo{';
			$herbal_ayurveda_custom_css .='margin-left: 0px;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Wide Width'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='right: 30px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.row.outer-logo{';
			$herbal_ayurveda_custom_css .='margin-left: 0px;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Full Width'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='max-width: 100%;';
		$herbal_ayurveda_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$herbal_ayurveda_slider_height = get_theme_mod('herbal_ayurveda_slider_height');
	if($herbal_ayurveda_slider_height != false){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='height: '.esc_attr($herbal_ayurveda_slider_height).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$herbal_ayurveda_resp_slider = get_theme_mod( 'herbal_ayurveda_resp_slider_hide_show',false);
	if($herbal_ayurveda_resp_slider == true && get_theme_mod( 'herbal_ayurveda_slider_hide_show', false) == false){
    	$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} ';
	}
    if($herbal_ayurveda_resp_slider == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:block;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_slider == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} }';
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px){';
		$herbal_ayurveda_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$herbal_ayurveda_custom_css .='margin-top: 45px;';
		$herbal_ayurveda_custom_css .='} }';
	}

	$herbal_ayurveda_resp_sidebar = get_theme_mod( 'herbal_ayurveda_sidebar_hide_show',true);
    if($herbal_ayurveda_resp_sidebar == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#sidebar{';
			$herbal_ayurveda_custom_css .='display:block;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_sidebar == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#sidebar{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} }';
	}

	$herbal_ayurveda_resp_scroll_top = get_theme_mod( 'herbal_ayurveda_resp_scroll_top_hide_show',true);
	if($herbal_ayurveda_resp_scroll_top == true && get_theme_mod( 'herbal_ayurveda_hide_show_scroll',true) == false){
    	$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:hidden !important;';
		$herbal_ayurveda_custom_css .='} ';
	}
    if($herbal_ayurveda_resp_scroll_top == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:visible !important;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_scroll_top == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px){';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:hidden !important;';
		$herbal_ayurveda_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$herbal_ayurveda_copyright_alingment = get_theme_mod('herbal_ayurveda_copyright_alingment');
	if($herbal_ayurveda_copyright_alingment != false){
		$herbal_ayurveda_custom_css .='.copyright p{';
			$herbal_ayurveda_custom_css .='text-align: '.esc_attr($herbal_ayurveda_copyright_alingment).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$herbal_ayurveda_site_title_font_size = get_theme_mod('herbal_ayurveda_site_title_font_size');
	if($herbal_ayurveda_site_title_font_size != false){
		$herbal_ayurveda_custom_css .='.logo h1, .logo p.site-title{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_site_title_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_site_tagline_font_size = get_theme_mod('herbal_ayurveda_site_tagline_font_size');
	if($herbal_ayurveda_site_tagline_font_size != false){
		$herbal_ayurveda_custom_css .='.logo p.site-description{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_site_tagline_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$herbal_ayurveda_preloader_bg_color = get_theme_mod('herbal_ayurveda_preloader_bg_color');
	if($herbal_ayurveda_preloader_bg_color != false){
		$herbal_ayurveda_custom_css .='#preloader{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_preloader_bg_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_preloader_border_color = get_theme_mod('herbal_ayurveda_preloader_border_color');
	if($herbal_ayurveda_preloader_border_color != false){
		$herbal_ayurveda_custom_css .='.loader-line{';
			$herbal_ayurveda_custom_css .='border-color: '.esc_attr($herbal_ayurveda_preloader_border_color).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}