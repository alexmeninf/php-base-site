<?php

/**
 * Get head tags
 *
 * @since 1.0
 * @param string $show default is true
 */
function get_head_tags( $show = true ) {
  if ( $show ) {
    mobile_web_app();
    get_tags_og_protocol();
    get_tags_theme_color( THEME_COLOR );
    get_favicon_icons(false);
    get_link_canonical();
  }
}


/**
 * Retrieves information about the current site.
 * 
 * @since 1.0
 * 
 * @param string $show   Optional. Site info to retrieve. Default empty (site name).
 * @return string Mostly string values, might be empty.
 */
function get_bloginfo( $show ) {
  switch ( $show ) {
    case 'name':
      $output = SITE_NAME;
    break;
    case 'short_name':
      $output = APP_SHORT_NAME;
    break;
    case 'description':
      $output = SITE_DESCRIPTION;
      break;
    case 'language':
      $output = SITE_LANGUAGE;
      break;
    case 'url':
      $output = get_url();
      break;
    case 'version':
      $output = SITE_VERSION;
      break;
    default:
      $output = SITE_NAME;
      break;
  }

  return $output;
}


/**
 * Displays the information about the current site.
 * 
 * @since 1.0
 * 
 * @param string $show  Optional. Site info to retrieve. Default empty (site name).
 */
function bloginfo( $show ) {
  echo get_bloginfo( $show );
}


/**
 * Get the site URL.
 *
 * @since 1.0
 * @return string Returns the primary URL of the site
 */
function get_url() {  
	// Local
	if( strstr($_SERVER["HTTP_HOST"], 'localhost') ){
    $atual_url = LOCAL_URL;
    
	// Production
	} else {
		$url = str_replace('/', '', $_SERVER["HTTP_HOST"]);
		
		if ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ) {
			$atual_url = 'https://' . $url;
		} else {
			$atual_url = 'http://' . $url;
		}
  }
  
	return $atual_url;
}


/**
 * Force HTTPS
 * 
 * @since 1.0
 */
function force_https() {
  if ( (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"]) != "on" && 
    !!strstr($_SERVER["HTTP_HOST"], 'localhost') )
  {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    exit;
  }
} 
force_https();


/**
 * Get the site icon URL.
 * 
 * (Standard return favicon.)
 *
 * @since 1.0
 * 
 * @param string $img   Image name
 * @param string $path  Image path on the server
 * @return string Site image URL.
 */
function get_icon_url( $img = 'favicon.png', $path = '' ) {
  $base = '/assets/img/';

  if ($path != '') {
    is_simple_string($path);
    $path = $path . '/';
  }

  return get_url() . $base . $path . $img;
}


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
    <meta property="og:image" content="'. get_icon_url("og-image.jpg", "favicon") .'">
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
      <meta name="apple-mobile-web-app-status-bar-style" content="'. $color .'">
      <meta name="msapplication-navbutton-color" content="'. $color .'">
      <meta name="msapplication-TileColor" content="'. $color .'">';  
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


/**
 * Get favicon images
 *
 * @since 1.0
 * @param string $all Get all sizes images to browsers and applicatons
 */
function get_favicon_icons( $all = false ) {
  echo '<link href="'. get_icon_url() .'" rel="shortcut icon">';

  if ( $all ) {
    echo '<meta name="msapplication-TileImage" content="'. get_icon_url('ms-icon-144x144.png">', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="57x57" href="'. get_icon_url('apple-icon-57x57.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="60x60" href="'. get_icon_url('apple-icon-60x60.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="72x72" href="'. get_icon_url('apple-icon-72x72.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="76x76" href="'. get_icon_url('apple-icon-76x76.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="114x114" href="'. get_icon_url('apple-icon-114x114.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="120x120" href="'. get_icon_url('apple-icon-120x120.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="144x144" href="'. get_icon_url('apple-icon-144x144.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="152x152" href="'. get_icon_url('apple-icon-152x152.png', 'favicon') .'">
    <link rel="apple-touch-icon" sizes="180x180" href="'. get_icon_url('apple-icon-180x180.png', 'favicon') .'">
    <link rel="icon" type="image/png" sizes="192x192"  href="'. get_icon_url('android-icon-192x192.png', 'favicon') .'">
    <link rel="icon" type="image/png" sizes="32x32" href="'. get_icon_url('favicon-32x32.png', 'favicon') .'">
    <link rel="icon" type="image/png" sizes="96x96" href="'. get_icon_url('favicon-96x96.png', 'favicon') .'">
    <link rel="icon" type="image/png" sizes="16x16" href="'. get_icon_url('favicon-16x16.png', 'favicon') .'">';
  }
}


/**
 * Validates if it is a simple string
 *
 * @since 1.0
 * @param $string validate if a simple string
 * @return boolean if false, show mensage error
 */
function is_simple_string( $string ) {
  $validated = preg_match("/^[a-zA-Z0-9]+$/", $string);

  if ( !$validated ) {
    echo "ERRO: Só é permitido caracteres de a-z, A-Z e 0-9.";
    exit;
  }

  return true;
}
