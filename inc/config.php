<?php


/**
 * get_head_tags
 *
 * @param  mixed $show
 * @return void
 */
function get_head_tags( $show = true ) {
  if ( $show ) {
    mobile_web_app();
    get_tags_og_protocol();
    get_tags_theme_color( THEME_COLOR );
    get_favicon_icons('shortcut'); // set "all" to get all icons
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
 * bloginfo
 *
 * @param  string $show
 * @return string
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
