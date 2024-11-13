<?php
function criarSelect($query, $label, $dados,$dadoTabela) {
   // require('../include/conecta.php');
   $retorno = '';
   $bd = Conecta();

   if ($bd->SqlExecuteQuery($query) && $bd->SqlNumRows() > 0) {
      $bContinua = true;
   }

   $retorno .= '<label class="form-label" for="'.$dados.'">'.$label.'</label>';
   $retorno .= '<select type="text" class="form-control form-control-sm" id="'.$dados.'" name="'.$dados.'">';
   $retorno .= '<option value="">Escolha opção</option>';
   
   while($bContinua){
      $pontoAtendimento = $bd->SqlQueryShow($dadoTabela);
      $retorno .= '<option value="' . $pontoAtendimento . '">' . $pontoAtendimento . '</option>';
      $bContinua = $bd->SqlFetchNext();
   }
   $retorno .= '</select>';
   
   $bd->SqlDisconnect();
   echo $retorno;
}

$query      = "SELECT nome FROM CHURRASCARIAS_SP ORDER BY nome"; 
$dadoTabela = "nome";
$label      = "Escolha uma Churrascaria em São Paulo:";
$dados      = "churrascariaSP";

echo criarSelect($query, $label, $dados, $dadoTabela);
?>