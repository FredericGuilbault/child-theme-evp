<?php
/**
 * The template for displaying all single posts.
 *
 * @package Dyad
 */
$file = 'mailList.cvs';
get_header();

if( current_user_can('editor') || current_user_can('administrator') ) {


	echo '<div style="margin-bottom:150px;margin-top:150px;background-color:rgba(255, 0, 0, 0.12);padding-left:20px"> 
		  <br>ADMINISTRATION SEULEMENT<br>'
		  .nl2br(file_get_contents($file))
		  .'</div>';


} else if ( !isset( $_POST['subscriber-email'] ) ){
?>


	<main id="primary" class="content-area" role="main" style="margin-left:30%">
		<h1> Liste de diffusion
		<br> Environnement vert plus
		</h1>
		<h1>&nbsp;</h1>
		<h3><div>Inscrivez-vous :</div>
		<div class="alignleft comment" >
			<form method="post" action="/listes-de-diffusion/">
				<input class="fields" id="custformemail" type="email" name="subscriber-email" value="...Votre email" />
				<input id="custformsub" type="submit" value="Souscrire" />
			</form>
		</div>
		</h3>
		<h1>&nbsp;</h1>
		<h1>&nbsp;</h1>
<script>
	jQuery('#custformsub').prop('disabled', true);
	jQuery('#custformsub').css('background-color', 'silver');
	jQuery('#custformsub').bind('click',function(){
	});

	jQuery('#custformemail').bind('keyup', function(){
		var emailLength = jQuery("#custformemail").val().length;
		if (emailLength > 0  && jQuery("#custformemail").val() !== '...Votre email'  ) {
			jQuery('#custformsub').prop('disabled', false);
			jQuery('#custformsub').css('background-color', '#0cc324');
		}else{
			jQuery('#custformsub').prop('disabled', true);
			jQuery('#custformsub').css('background-color', 'silver');
		}
	});

	jQuery('#custformemail').bind('keyup', function(){
	});

</script>



<?php
	} else {
		$email = filter_var( $_POST['subscriber-email'], FILTER_SANITIZE_EMAIL);
		file_put_contents( $file , date('Y-m-d_H:i:s').','.$_SERVER['REMOTE_ADDR'].','.$email.",".PHP_EOL, FILE_APPEND);
		?>
		<main id="primary" class="content-area" role="main" style="margin: 100px 0px 400px 30%;">
			<h3><b> <?php echo $email; ?></b> a été ajouté, merci !</h3>


	<?php
	}
?>



	</main><!-- #main -->

<?php get_footer(); ?>


