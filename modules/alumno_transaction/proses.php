

<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
            
            $codigo_transaccion = mysqli_real_escape_string($mysqli, trim($_POST['codigo_transaccion']));            
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $codigo       = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $num   = mysqli_real_escape_string($mysqli, trim($_POST['num']));
            $total_stock      = mysqli_real_escape_string($mysqli, trim($_POST['total_stock']));
            $tipo_transaccion= mysqli_real_escape_string($mysqli, trim($_POST['transaccion']));
            $created_user    = $_SESSION['id_user'];

          
            $query = mysqli_query($mysqli, "INSERT INTO transaccion_alumno(codigo_transaccion,fecha,codigo,numero,created_user,tipo_transaccion) 
                                            VALUES('$codigo_transaccion','$fecha_a','$codigo','$num','$created_user','$tipo_transaccion')")
                                            or die('Error: '.mysqli_error($mysqli));    

           
            if ($query) {
                
                $query1 = mysqli_query($mysqli, "UPDATE alumno SET stock        = '$total_stock'
                                                              WHERE codigo   = '$codigo'")
                                                or die('Error: '.mysqli_error($mysqli));

               
                if ($query1) {                       
                    
                    header("location: ../../main.php?module=alumno_transaction&alert=1");
                }
            }   
        }   
    }
} 

elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
                $pcompra = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['pcompra'])));
                $pventa = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['pventa'])));
                $unidad     = mysqli_real_escape_string($mysqli, trim($_POST['unidad']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE medicamentos SET  nombre       = '$nombre',
                                                                    precio_compra      = '$pcompra',
                                                                    precio_venta      = '$pventa',
                                                                    unidad          = '$unidad',
                                                                    updated_user    = '$updated_user'
                                                              WHERE codigo       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=alumnos&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM medicamentos WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=medicines&alert=3");
            }
        }
    }       
}       
?>


?>

