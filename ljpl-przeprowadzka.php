<?php
/*
 Plugin Name: Przeprowadzka
 Plugin URI: http://wordpress.org/extend/plugins/przeprowadzka/
 Description: Okienko informujące o zmianie adresu witryny
 Early version. Wyświetla informację o zmianie adresu bloga, jeżeli znajdzie na końcu adresu
hashtag #zmianaAdresu
 Version: 0.2
 Author: Łukasz Jasiński
 Author URI: http://www.ljasinski.pl
 Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
 */


// #############################################################################
// ### Adding a stylesheet

add_action( 'wp_print_styles', 'ljpl_przeprowadzka_add_stylesheet' );
/**
 * Adds custom stylesheet to head section of the page
 */
function ljpl_przeprowadzka_add_stylesheet() {
	wp_register_style( 'przeprowadzkaStyle', plugins_url("/ljpl-przeprowadzka.css",__FILE__) );
	wp_enqueue_style( 'przeprowadzkaStyle');
}

// #############################################################################
// ### Inserting content into a footer

add_action ( 'wp_footer', 'ljpl_przeprowadzka_insert_content' );

function ljpl_przeprowadzka_head() {
	
}

function ljpl_przeprowadzka_insert_content() {
?>
<script type="text/javascript">
function przeprowadzkaUkryj() {
	document.getElementById('przeprowadzka').style.display='none';
	document.getElementById('fade').style.display='none';
}
</script>
<div id="przeprowadzka" class="przeprowadzka-content">
	<p>Strona zmieniła adres na: <strong><?php echo home_url(); ?></strong>. Proszę zaktualizuj swoje zakładki i bądź częstym gościem. Zapraszam również do komentowania.</p> 
	<p class="buttons">
	<a href = "javascript:void(0)" onclick = "przeprowadzkaUkryj();">
	Zamknij</a></p>
</div>
<div id="fade" class="przeprowadzka-black"></div>
<script type="text/javascript">
	if (document.location.hash == '#zmianaAdresu') {
		document.getElementById('przeprowadzka').style.display = 'block';
		document.getElementById('fade').style.display = 'block';
		scroll(0,0);
	}
</script>
<?php 
}