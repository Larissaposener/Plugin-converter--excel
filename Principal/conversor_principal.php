<?php 

//function converter_posener($atts){
$path = getcwd();
$my_plugin = WP_PLUGIN_DIR . '/converter-posener';
//var_dump($my_plugin);exit();

require($path.'/converter-posener-front/Classes/PHPExcel/IOFactory.php');
if(isset($_FILES['excelFile']) && !empty($_FILES['excelFile']['tmp_name'])){
    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['excelFile']['tmp_name']);
 
    $colunas  = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
    $total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

//Pegar o total de linhas 
$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

echo "<table border='1'";

//navegar nas linhas
for ($linha=1; $linha <= $total_linhas ; $linha++) { 
 
 echo "<tr>";
 //navegar nas colunas 

 for ($coluna=0; $coluna <= $total_colunas-1; $coluna++) { 
  if ($linha == 1) {
   echo "<th>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());
    
  }else{
   echo "<td>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());
  }
  }
 echo "</tr>";

}
echo "</table>";

}else{
  echo "ARQUIVO NÃO ENCONTRADO";
}
?>