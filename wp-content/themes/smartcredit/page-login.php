<?php
/*
* Template Name: Login Page
*/
?>

<?php get_header(); ?>

<?php the_content(); ?>

<?php
	$args = array(
		'echo' => true,
	    'redirect' => home_url(),
	    'form_id' => 'loginform',
	    'id_username' => 'user',
	    'id_password' => 'pass',
	   );

	if(isset($_GET['login']) && $_GET['login'] == 'failed')
	{
?>
		<div class="login-error">
			<p>Login failed: You have entered an incorrect Username or password, please try again.</p>
		</div>
<?php
	}

	wp_login_form( $args );
?>

<a id="lostpass_url" href="<?php echo site_url('/wp-login.php?action=lostpassword'); ?>">Lost Password?</a>

<?php get_footer(); ?>