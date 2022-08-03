<?php
$today = date("d/m/Y H:i:s");

function Mask($mask,$str){
  $str = str_replace(" ","",$str);
  for($i=0;$i<strlen($str);$i++){
      $mask[strpos($mask,"#")] = $str[$i];
  }
  return $mask;
}

//$cpf = $customer->getCPF();
$nome = $customer->getName();
$email = $customer->getEmail();
$cpf = Mask("###.###.###-##",$customer->getCPF());
$data_de_nascimento = $customer->getBirthDate();
/*



if($customer->getSex() == 'Masculino') { echo 'selected'; }
if($customer->getSex() == 'Feminino') { echo 'selected'; }
if($customer->getMaritalStatus() == 'Solteiro') { echo 'selected'; }
if($customer->getMaritalStatus() == 'Casado') { echo 'selected'; }
if($customer->getMaritalStatus() == 'Divorciado') { echo 'selected'; }
if($customer->getMaritalStatus() == 'Viúvo') { echo 'selected'; }
*/

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->add_info('Title', 'Your meta title');
$dompdf->loadHtml('<title>Relatório Cliente</title><meta name="author" content="https://douglascarlos.dev/clientesgestordemo/"><hr style=\'width: 90%; height:5px; text-align:center; border:0px; color:#ff9999; background:#ff9999;\' />
<center>Consulta realizada em: ' . $today . '<br>
<h3>Clientes Gestor</h3>
<h3>Relatório Cliente</h3></center><br>
<table width=100%>
    <tr>
        <td><b>Nome:</b> ' . $nome . '</td>
        <td><b>E-mail:</b> ' . $email . '</td>
    </tr>
    <tr>
        <td><b>CPF:</b> ' . $cpf . '</td>
        <td><b>Data de Nascimento:</b> ' . $data_de_nascimento . '</td>
    </tr>
</table>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');


// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
// Output the generated PDF to Browser
header("Content-type:application/pdf");
header("Content-Disposition: attachment; filename=$nome.pdf'");
$dompdf->stream($nome,array('Attachment'=>0));
//$dompdf->stream($nome.".pdf");
/*
foreach($phone as &$phone_value):
$phone_value->getCPF();
$phone_value->getType();
$phone_value->getPhone();
$phone_value->getType();
$phone_ = $phone_value->getPhone(); echo (strlen($phone_) == 10) ? Mask('(##) ####-####',$phone_) : Mask('(##) # ####-####',$phone_);
endforeach;
*/
?>