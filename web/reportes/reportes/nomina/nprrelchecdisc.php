<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");

$banco="";
$tipgas="";
$cta="";
$fecdes="";
$fechas="";
$generar="";

global $banco;
global $tipgas;
global $cta;
global $fecdes;
global $fechas;
global $generar;


$bd=new basedatosAdo();


function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {
	   print $tb->fields[$campo1];
	 }
	 else
	 {
	   print "";
	 }
  }

?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<?
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>";
		?>
		</td>
    </tr>
    <tr>
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes
        </p>
        <fieldset>

        <div align="left">&nbsp;
          <table width="647"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RELACION CHEQUE-NOMINA
                 <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="194" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="181"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="258">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td><input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
               <td class="form_label_01"><div align="left"><strong>Banco:</strong></div></td>
              <td><div align="left">
                <input name="banco" type="text"  value="<?
                $sql="SELECT min(CODBAN) as codban FROM NPBANCOS";
                LlenarTextoSql($sql,"codban",$bd);
				?>" class="breadcrumb" id="banco" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo('banco');">
              </div></td>
            </tr>
            <tr>
               <td class="form_label_01"><div align="left"><strong>Tipo de Gasto:</strong></div></td>
              <td><div align="left">
                <input name="tipgas" type="text"  value="<?
				$sql="SELECT min(A.CODTIPGAS) as codtipgas FROM NPASICAREMP A, NPTIPGAS B WHERE A.CODTIPGAS=B.CODTIPGAS";
                LlenarTextoSql($sql,"codtipgas",$bd);
				?>" class="breadcrumb" id="tipgas" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo1('tipgas');">
              </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Generador de Disco :</strong></td>
              <td colspan="2">
                <select name="generar" class="breadcrumb" id="generar">
                  <option value="S">Si</option>
                  <option value="N" selected="selected">No</option>
                </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Nro de Cuenta :</strong></td>
              <td colspan="2"><input name="cta" type="text" class="breadcrumb" id="cta" size="60"></td>
            </tr>
             <tr>
              <td class="form_label_01"><div align="left"><strong>Per&iacute;odo de N&oacute;mina:</strong> </div></td>
              <td><div align="left">
                <input name="fecdes" type="text" value="<?
				$sql="Select to_char(min(fecnom),'dd/mm/yyyy') as fecnom from npnomcal";
                LlenarTextoSql($sql,"fecnom",$bd);
				?>" id="fecdes" size="12" maxlength="10" datepicker="true" class="breadcrumb">
              </div></td>
              <td><input name="fechas" type="text" value="<?
				$sql="Select to_char(max(fecnom),'dd/mm/yyyy') as fecnom from npnomcal";
                LlenarTextoSql($sql,"fecnom",$bd);
				?>" id="fechas" size="12" maxlength="10" datepicker="true" class="breadcrumb"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
          </table>
        </div>

        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr>
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()">
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr>
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="RELACION CHEQUE-NOMINA";
	f.action="rnprrelchecdisc.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

function catalogo(campo)
   {
      mysql='SELECT DISTINCT(CODBAN) as Código_Banco,NOMBAN as Nombre FROM NPBANCOS';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo1(campo)
   {//al a.codtipgas le falta un cero a la izq en esta bd por eso el catalogo ta vacio modificar el min arriba
      mysql='SELECT distinct(A.CODTIPGAS) as codigo, B.DESTIPGAS as descripcion FROM NPASICAREMP A, NPTIPGAS B WHERE A.CODTIPGAS=B.CODTIPGAS';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

</script>
</html>
