<?php
/**
 * Support to webApp
 *
 * @since 1.0
 */
function mobile_web_app() {
  echo '<link rel="manifest" href="'.get_url().'/manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="'.get_bloginfo('short_name').'">
    <meta name="apple-mobile-web-app-title" content="'.get_bloginfo('name').'">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="'.get_url().'">
  ';
}


/**
 * Get Open Graph Protocol tags
 * Note: og:image need to set an image with a resolution of 1200x630 pixels
 *
 * @since 1.0
 */
function get_tags_og_protocol() {
  echo '<meta property="og:description" content="'. get_bloginfo( "description" ) .'">
    <meta property="og:image" content="'. get_icon_url("og-image.jpg", "favicons") .'">
    <meta property="og:locale" content="'. get_bloginfo( "language" ) .'">
    <meta property="og:site_name" content="'. get_bloginfo( "short_name" ) .'">
    <meta property="og:title" content="'. get_bloginfo( "name" ) .'">  
    <meta property="og:type" content="website">
    <meta property="og:url" content="'. get_bloginfo( "url" ) .'">';
}


/**
 * Get theme color
 * changes the color of the browser bar
 *
 * @since 1.0
 * @param string $color get color
 */
function get_tags_theme_color( $color = '' ) {
  if ( $color != '' ) {
    $color = trim($color);

    echo '<meta name="theme-color" content="'. $color .'">
      <meta name="msapplication-navbutton-color" content="'. $color .'">
      <meta name="msapplication-TileColor" content="'. $color .'">';  
  }
}


/**
 * Get favicon images
 *
 * @since 1.0
 * @param string $icons Get all sizes images to browsers and applicatons
 */
function get_favicon_icons( $icons = 'shortcut' ) {
  echo '<link href="'. get_icon_url() .'" rel="shortcut icon">';

  if ( $icons == 'all' ) {
    echo '<meta name="msapplication-TileImage" content="'. get_icon_url('ms-icon-144x144.png">', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="57x57" href="'. get_icon_url('apple-icon-57x57.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="60x60" href="'. get_icon_url('apple-icon-60x60.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="72x72" href="'. get_icon_url('apple-icon-72x72.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="76x76" href="'. get_icon_url('apple-icon-76x76.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="114x114" href="'. get_icon_url('apple-icon-114x114.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="120x120" href="'. get_icon_url('apple-icon-120x120.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="144x144" href="'. get_icon_url('apple-icon-144x144.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="152x152" href="'. get_icon_url('apple-icon-152x152.png', 'favicons') .'">
    <link rel="apple-touch-icon" sizes="180x180" href="'. get_icon_url('apple-icon-180x180.png', 'favicons') .'">
    <link rel="icon" type="image/png" sizes="192x192"  href="'. get_icon_url('android-icon-192x192.png', 'favicons') .'">
    <link rel="icon" type="image/png" sizes="32x32" href="'. get_icon_url('favicon-32x32.png', 'favicons') .'">
    <link rel="icon" type="image/png" sizes="96x96" href="'. get_icon_url('favicon-96x96.png', 'favicons') .'">
    <link rel="icon" type="image/png" sizes="16x16" href="'. get_icon_url('favicon-16x16.png', 'favicons') .'">';
  }
}


/**
 * Get the link tag canonical 
 *
 * @since 1.0
 */
function get_link_canonical() {
  echo '<link rel="canonical" href="'. get_url() .'">';  
}