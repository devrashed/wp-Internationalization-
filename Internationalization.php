<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<h3>Basic strings:</h3>

<?php 
  __( 'Blog Options', 'my-theme' );

  echo __( 'WordPress is the best!', 'my-theme' );

  _e( 'WordPress is the best!', 'my-theme' );
?>

<h3>Variables<h3>

<?php 
	printf(
    /* translators: %s: Name of a city */
    __( 'Your city is %s.', 'my-theme' ),
    $city
);
?>	
<b>Here the zip code is displayed after the city name. In some languages, displaying the zip code and city in opposite order is more appropriate. Using %s prefix, as in the above example, allows for this. A translation can be written:</b>

<?php 
printf(
    /* translators: 1:ZIP code 2:Name of a city */
    __( 'Your zip code is %2$s, and your city is %1$s.', 'my-theme' ),
    $city,
    $zipcode
);
?>

<b> sprintf is also available for javascript translations: </b>
<script>
 const zipCodeMessage = sprintf(
    /* translators: 1:ZIP code 2:Name of a city */
    __( 'Your zip code is %2$s, and your city is %1$s.', 'my-theme'),
    city,
    zipcode
);

</script>


<h3>Escaping strings </h3>

<b>it is good to escape all of your strings, preventing translators from running malicious code. There are a few escape functions that are integrated with internationalization functions.</b>

esc_attr__: Retrieve the translation of $text and escapes it for safe use in an attribute.

<a title="<?php esc_attr_e( 'Skip to content', 'my-theme' ); ?>" class="screen-reader-text skip-link" href="#content">

<?php _e( 'Skip to content', 'my-theme' ); ?>
</a>
<p><input title="<?php esc_attr_e( 'Read More', 'your_text_domain' ) ?>" type="submit" value="submit" /></p>

<label for="nav-menu">
  <?php esc_html_e( 'Select Menu:', 'my-theme' ); ?>
</label>

<b>esc_html__:</b>
esc_html__: Retrieve the translation of $text and escapes it for safe use in HTML output.
<h1><?php echo esc_html__( 'Title', 'text-domain' )?></h3>


<b>esc_html_e:</b>
esc_html_e: Display translated text that has been escaped for safe use in HTML output.
<h1><?php esc_html_e( 'Title', 'text-domain' )?></h1>

<b>esc_html_x</b>
Translates string with gettext context, and escapes it for safe use in HTML output.

<a href="#comment">
  <?php 
    echo esc_html_x( 
      'Comment', 
      'Verb: To leave a comment', // Here's the contextual help
      'wpdocs_my_theme' 
    ); 
  ?>
</a>

<b>number_format_i18n()</b>

<p>Converts float number to format based on the locale.</p>
<?php
	$number = 3948;
	$formatted = number_format_i18n( $number );

	// output “3,948”
?>

<b>Using the $decimal Parameter</b>
 <?php 
 $number = 3948;
 $formatted = number_format_i18n( $number, 2 );

 // output “3,948.00”
?>

<b>date_i18n</b>
<p>Retrieves the date in localized format, based on a sum of Unix timestamp and timezone offset in seconds.</p>

<?php 
$datetime = '2022-12-03 10:00:00';
date_i18n('d/m/Y H:i', strtotime( get_date_from_gmt( $datetime ) ) ); 
?>




</body>
</html>