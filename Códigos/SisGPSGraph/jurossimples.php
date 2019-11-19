<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html> 
<head> 
<META HTTP-EQUIV="Expires" CONTENT="Fri, Jan 01 1900 00:00:00 GMT"> 
<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="author" content="Mauricio Maciel"> 
<META HTTP-EQUIV="Reply-to" CONTENT="maciel@brasildata.net"> 
<meta name="generator" content="PHPEd 1.80"> 
<META NAME="description" CONTENT="F�rumla para C�lculo de Juros"> 
<meta name="keywords" content="calculo, juro, composto, financiamento, capital, montante"> 
<META NAME="Creation_Date" CONTENT="08/15/2000"> 
<meta name="revisit-after" content="15 days"> 
        <title>C�lculo de Juros</title> 
</head> 
<body> 
<p><h1>Formul�rio para c�lculo de juros compostos</h1> 
<p><b>Como usar:</b> Preencha todos os campos com os formatos pedidos. Capital Empatado � o dinheiro usado 
no in�cio do financiamento/investimento, a taxa de juros (ex: para 2% coloque somente o d�gito 2) e o Per�odo de 
Capitaliza��o � o tempo que este vai levar (preencha com meses). O montante no fim do per�odo ser� o Capital 
empatado mais os juros pelo per�odo determinado. </p> 
<FORM  action="juros.php" method="POST" name="formulario"> 
<p>Capital Empatado: R$ <INPUT TYPE="TEXT"  name="c" size="20" maxlength="20"></p> 
<p>Taxa de Juros: <INPUT TYPE="TEXT"  name="t" size="5" maxlength="5"> %</p> 
<p>Per�odo de Capitaliza��o: <INPUT TYPE="TEXT"  name="n" size="5" maxlength="5"> meses</p> 
<INPUT TYPE="SUBMIT"  value="Calcular"> 
<INPUT TYPE="HIDDEN"  name="op" value="calc"> 
</FORM> 

<? 
if (!$c || !$t || !$n) { 
echo "Valor inv�lido! Preencha o formul�rio novamente."; 
exit; 
                       } 

if (is_numeric ($c) and is_numeric ($t) and is_numeric ($n) ) { 
   $op = 'calc';                                                  } 
else { echo "Valor inv�lido! Preencha o formul�rio novamente. \n\n"; 
       exit; 
     } 


if ($op == 'calc') { 
$i = ($t/100); 
$m = ($c* (potencia (1+$i,$n))); 
echo "Montante no fim do Per�odo: R$". converte_valor(intval($m*100)). " \n\n"; 
                   } 

function potencia($a,$b){ 
 $resultado = $a; 
 while ($b >= 2) { 
 $resultado *= $a; 
 $b--; 
                 } 
 return $resultado; 
                       } 

function converte_valor($valor) 
{ 
    $valor=str_replace(".", "", $valor); 
    $tvalor=substr("$valor", 0, -2); 
    $vfinal=substr("$valor", -2); 
    $nvalor=""; 
    while (strlen($tvalor>3)) 
    { 
            if (strlen($nvalor)>0) 
            { 
                $nvalor=substr($tvalor, -3).".".$nvalor; 
            } 
            else 
            { 
                $nvalor=substr($tvalor, -3); 
            } 
            $tvalor=substr($tvalor, 0,-3); 
    } 
    if ((strlen($tvalor)<3)and (strlen($tvalor)!=0)) 
    { 
        $nvalor=$tvalor.".".$nvalor; 
    } 
    return $nvalor.",".$vfinal; 
} 

?> 

</body> 
</html> 