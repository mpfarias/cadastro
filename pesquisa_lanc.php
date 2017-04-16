<?php
$TipoBeneficiario="Conjuge";
// inicializar variáveis a vazio
$check0 = $check1 = $check2 = $check3 = $check4 = "";

/* verificar qual o valor contido na variável $TipoBeneficiario
 * e preencher a variável de marcação com o atributo "selected"
 */
switch ($TipoBeneficiario) {
  case "Selecione": {
    $check0 = "selected";
    break;
  }
  case "Conjuge": {
    $check1 = "selected";
    break;
  }
  case "Filho": {
    $check2 = "selected";
    break;
  }
  case "Mãe/Pai": {
    $check3 = "selected";
    break;
  }
  case "Compannheira(o)": {
    $check4 = "selected";
    break;
  }
}
echo '
<label>Tipo Beneficiario:  </label>  <span> '.$TipoBeneficiario.'</span>
<div class="">
  <select name="tipoBeneficiario">
    <option value="0" '.$check0.'>Selecione</option>
    <option value="1" '.$check1.'>Conjuge</option>
    <option value="2" '.$check2.'>Filho</option>
    <option value="3" '.$check3.'>Mãe/Pai</option>
    <option value="4" '.$check4.'>Compannheira(o)</option>
  </select>
</div>';
?>