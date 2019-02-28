
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $fecha_Nacimiento  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_Nacimiento']));
            $edad  = mysqli_real_escape_string($mysqli, trim($_POST['edad']));
            $telefono = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
             
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $num_contrato  = mysqli_real_escape_string($mysqli, trim($_POST['num_contrato']));
            $grado  = mysqli_real_escape_string($mysqli, trim($_POST['grado']));
            $dia  = mysqli_real_escape_string($mysqli, trim($_POST['dia']));
            $horario  = mysqli_real_escape_string($mysqli, trim($_POST['horario']));
             $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO alumno(nombres,apellidos,fecha_Nacimiento, edad, telefono, direccion, email, num_contrato,grado,dia,horario,estado,created_user) 
                                            VALUES('$nombres','$apellidos','$fecha_Nacimiento','$edad','$telefono','$direccion','$email','$num_contrato','$grado','$dia','$horario','estado','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=alumnos&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $fecha_Nacimiento  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_Nacimiento']));
            $edad  = mysqli_real_escape_string($mysqli, trim($_POST['edad']));
            $telefono = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
             
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $num_contrato  = mysqli_real_escape_string($mysqli, trim($_POST['num_contrato']));
            $grado  = mysqli_real_escape_string($mysqli, trim($_POST['grado']));
            $dia  = mysqli_real_escape_string($mysqli, trim($_POST['dia']));
            $horario  = mysqli_real_escape_string($mysqli, trim($_POST['horario']));
            $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE alumno SET  nombres       = '$nombres',
                                                                    apellidos      = '$apellidos',
                                                                    fecha_Nacimiento = '$fecha_Nacimiento',
                                                                    edad            = '$edad',
                                                                    telefono          = '$telefono',
                                                                    direccion    = '$direccion',
                                                                    email         ='$email',
                                                                    num_contrato = '$num_contrato',
                                                                    grado = '$grado',
                                                                    dia = '$dia',
                                                                    horario = '$horario',
                                                                    estado = '$estado'



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
      
            $query = mysqli_query($mysqli, "DELETE FROM alumno WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=alumnos&alert=3");
            }
        }
    }       
}       
?>