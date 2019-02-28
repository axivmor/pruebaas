<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$no = 1;

$query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,fecha_Nacimiento,edad,telefono,direccion,email,num_contrato FROM alumno ORDER BY nombres ASC")
                                or die('Error '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Listado de alumnos</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           LISTADO
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>NO.</small></th>
                        <th height="20" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="20" align="center" valign="middle"><small>NOMBRES</small></th>
                        <th height="20" align="center" valign="middle"><small>APELLIDOS</small></th>
                        <th height="20" align="center" valign="middle"><small>FECHA DE NACIMIENTO</small></th>
                        <th height="20" align="center" valign="middle"><small>EDAD</small></th>
                        <th height="20" align="center" valign="middle"><small>TELEFONO</small></th>
                        <th height="20" align="center" valign="middle"><small>DIRECCION</small></th>
                        <th height="20" align="center" valign="middle"><small>EMAIL</small></th>
                        <th height="20" align="center" valign="middle"><small>NUMERO DE CONTRATO</small></th>
                    </tr>
                </thead>
                <tbody>
        <?php
       
        while ($data = mysqli_fetch_assoc($query)) {
            /*$precio_compra = format_rupiah($data['precio_compra']);
            $precio_venta = format_rupiah($data['precio_venta']);*/
          
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[codigo]</td>
                         <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[nombres]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[apellidos]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[fecha_Nacimiento]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[edad]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[telefono]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[direccion]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[email]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[num_contrato]</td>
                    </tr>";
            $no++;
        }
        ?>  
                </tbody>
            </table>

            
        </div>
    </body>
</html>
<?php
$filename="INFORMDE STOCK.pdf"; 
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>