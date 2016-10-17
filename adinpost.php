<?php
/*
Plugin Name: Adinpost
Plugin URI: https://github.com/vailalex/AV_Workshop
Description: devoir à rendre pour le 21/10
Version: 0.16
Author: Alexandre Vaillant 3adev
*/



/* Affichage du bas de contenu, protection contre faille xss avec wp_kses (autorisation des lien href) */

function av_ajout_texte($contenu){
		$mon_bas_de_contenu= "TEST";
		$bas_de_contenu = "<div id='bas_de_contenu'>" . $mon_bas_de_contenu . "</div> ";
		$nouveau_contenu = $contenu . $bas_de_contenu;
		return $nouveau_contenu;
	
}

add_filter( 'the_content', 'av_ajout_texte');


/*BO Admin*/

add_action('admin_menu', 'add_admin_menu');

function add_admin_menu()
{					/*titre de la page, titre du menu, droit, */
	    add_menu_page('Options Adinpost', 'Adinpost', 'manage_options', 'av_bdc', 'menu_html');
}

function menu_html()
{
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
}

/*bouton barre horizontale admin */

add_action('add_admin_bar_menus', 'av_admin_bar');

function av_admin_bar_down() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array( 'id' => 'bas_de_contenu', 'title' => __('Adinpost', 'av_bas_de_contenu'), 'href' => admin_url( 'admin.php?page=av_bdc' ) ) );
}

function av_admin_bar() {
add_action( 'admin_bar_menu', 'av_admin_bar_down', 40 );	
}


?>