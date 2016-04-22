<?php
/**
 * The Header for our theme
 * @subpackage Magzilla
 * @since Magzilla 1.0
 */
global $ft_option, $fave_container; // Fetch options stored in $ft_option;

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	
	<![endif]-->

	<?php
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	// Get the favicon
	if ( $ft_option['site_favicon'] != '' ) { 
		$site_favicon = $ft_option['site_favicon'];
	} else { 
		$site_favicon = get_template_directory_uri() . '/images/favicon.ico';
	}
	?>
	<link rel="shortcut icon" href="<?php echo $site_favicon; ?>" />
	<?php 
	// Get the retina favicon
	if ( $ft_option['site_retina_favicon'] != '' ) { 
		$retina_favicon = $ft_option['site_retina_favicon'];
	} else { 
		$retina_favicon = get_template_directory_uri() . '/images/retina-favicon.png';
	}
	?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo $retina_favicon; ?>" />
	<?php } ?>

	<?php wp_head(); ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2684182-29', 'auto');
  ga('send', 'pageview');

</script>
<!-- End Google Analytics -->

</head>

<?php 

$boxed_layout = $framed_layout = $fave_container = '';
$single_layout = '';
$main_layout = $ft_option['site_layout'];

if ( $main_layout == "boxed-layout" ) { 
	$boxed_layout = $main_layout;

} elseif ( $main_layout == "framed-layout" ) {
	$framed_layout = $main_layout;
	$boxed_layout = 'boxed-layout';
}

if ( $main_layout == "container-fluid" ) {
	$fave_container = "container-fluid";
} else {
	$fave_container = "container";
}

?>

<body <?php body_class( $boxed_layout ); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-556JXJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-556JXJ');</script>
<!-- End Google Tag Manager -->


	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=217780371604666";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div class="external-wrap <?php echo $framed_layout; ?>">

		<?php 
		
		$header_layout = $ft_option['header_layout'];
		if( !empty( $header_layout ) ) {
			$header_layout = $ft_option['header_layout'];
		} else {
			$header_layout = 'header-1';
		}

		?>

		<?php get_template_part('inc/header/'.$header_layout); ?>

		<?php get_template_part('inc/header/mobile', 'menu'); ?>

		<?php if( $ft_option['site_breadcrumb'] != 0 ) { get_template_part('inc/breadcrumb'); } ?>

		<?php if( !empty( $ft_option['ads_below_mainmenu'] ) ): ?>
		<div class="<?php echo $fave_container; ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="content-ads-wrapper"><?php echo $ft_option['ads_below_mainmenu']; ?></div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="magzilla-main-wrap">