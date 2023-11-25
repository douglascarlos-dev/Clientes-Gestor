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
$sexo = "";
if($customer->getSex() == 'Masculino') { $sexo = 'Masculino'; }
if($customer->getSex() == 'Feminino') { $sexo = 'Feminino'; }
$estado_civil = "";
if($customer->getMaritalStatus() == 'Solteiro') { $estado_civil = 'Solteiro'; }
if($customer->getMaritalStatus() == 'Casado') { $estado_civil = 'Casado'; }
if($customer->getMaritalStatus() == 'Divorciado') { $estado_civil = 'Divorciado'; }
if($customer->getMaritalStatus() == 'Viúvo') { $estado_civil = 'Viúvo'; }
$html_telefone = "";
foreach($phone as &$phone_value):
    $html_telefone .= "<tr>";
    $html_telefone .= "<td><b>Telefone:</b> " . $phone_value->getType() . "</td>";
    $phone_ = $phone_value->getPhone();
    $html_telefone .= "<td><b>Número:</b> " . $phone_ . "</td>";
    $html_telefone .= "</tr>";
endforeach;
$html_endereco = "";
foreach($address as &$address_value):
    $html_endereco .= "<br><tr>";
    $html_endereco .= "<td><b>Categoria endereço:</b> " . $address_value->getAddressCategory() . "</td>";
    $html_endereco .= "<td><b>Tipo:</b> " . $address_value->getType() . "</td>";
    $html_endereco .= "</tr>";
    $html_endereco .= "<tr>";
    $html_endereco .= "<td><b>Nome:</b> " . $address_value->getName() . "</td>";
    $html_endereco .= "<td><b>Número:</b> " . $address_value->getNumber() . "</td>";
    $html_endereco .= "</td>";
    $html_endereco .= "<tr>";
    $html_endereco .= "<td><b>Bairro:</b> " . $address_value->getDistrict() . "</td>";
    $html_endereco .= "<td><b>Cidade:</b> " . $address_value->getCity() . "</td>";
    $html_endereco .= "</tr>";
    $html_endereco .= "<tr>";
    $html_endereco .= "<td><b>CEP:</b> " . $address_value->getZipCode() . "</td>";
    $html_endereco .= "<td><b>UF:</b> " . $address_value->getState() . "</td>";
    $html_endereco .= "</tr>";
    $html_endereco .= "<tr>";
    $html_endereco .= "<td colspan=2><b>Complemento:</b> " . $address_value->getComplement() . "</td>";
    $html_endereco .= "</tr>";
endforeach;


/*
*/

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->add_info('Title', 'Your meta title');
$dompdf->loadHtml('<title>' . $nome . ' - Relatório Cliente</title><meta name="author" content="https://clientesgestor.douglascarlos.dev/"><hr style=\'width: 90%; height:5px; text-align:center; border:0px; color:#ff9999; background:#ff9999;\' />
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
    <tr>
        <td><b>Sexo:</b> ' . $sexo . '</td>
        <td><b>Estado Civil:</b> ' . $estado_civil . '</td>
    </tr><br>
    ' . $html_telefone . '
    
    ' . $html_endereco . '
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