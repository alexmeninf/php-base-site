<?php

define("SITE_DESCRIPTION",  "");
define("SITE_LANGUAGE",     "pt-BR");
define("SITE_NAME",         "Template padrão");
define("TEMPLATE_VERSION",  "1.0");
define("LOCAL_URL",         "http://localhost/www/themes/landing-page-default");


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
      $output = TEMPLATE_VERSION;
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
function get_icon_url( $img = 'favicon.png', $path = '/assets/img/' ) {
  return get_url() . $path . $img;
}


/**
 * Get Open Graph Protocol tags
 *
 * @since 1.0
 */
function get_og_protocol() { ?>
	<meta property="og:image" content="<?php echo get_icon_url() ?>"/> 
	<meta property="og:title" content="<?php bloginfo( 'name' ); ?>"/>  
	<meta property="og:url" content="<?php bloginfo( 'url' ) ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="<?php bloginfo( 'language' ) ?>">
	<meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>">
<?php
}