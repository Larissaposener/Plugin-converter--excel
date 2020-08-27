<?php  

/* 
	Plugin Name:Converter Posener
	Author:Larissa Posener
	Description: um plugin que converte planilhar excel em um array
	Version:1.0

*/
	//seguraça

	if(!defined('ABSPATH')){
		exit("acesso negado");
	}

   define("MEU_DIRETORIO_PRINCIPAL",plugin_dir_path(__FILE__ ));



	 

function front_page_view(){
	require_once(MEU_DIRETORIO_PRINCIPAL.'/Principal/converter-posener-front/converter-posener-front-end.php');
}
add_filter('the_content', 'front_page_view');
	  


	//function converter_posener(){

 //echo "PRIMEIRO TESTE";
	//}

?>


