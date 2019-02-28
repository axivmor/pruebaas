<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de alumnos

    <a class="btn btn-primary btn-social pull-right" href="?module=form_alumnos&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos de alumno ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del alumno modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del alumno
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Nombres</th>
                <th class="center">Apellidos</th>
                <th class="center">Fecha de Nacimiento</th>
                <th class="center">Edad</th>
                <th class="center">Telefono</th>
                <th class="center">Direccion</th>
                <th class="center">Email</th>
                <th class="center">No. Contrato</th>
                <th class="center">Grado</th>
                <th class="center">Día</th>
                <th class="center">Horario</th>
                <th class="center">Estado</th>

                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,fecha_Nacimiento,edad,telefono,direccion,email,num_contrato,grado,dia,horario,estado FROM alumno ORDER BY codigo DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              /*$nombre = format_rupiah($data['nombres']);
              $apellido = format_rupiah($data['precio_venta']);*/
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[codigo]</td>
                      <td width='80'>$data[nombres]</td>
                      
                      <td width='80' align='right'>$data[apellidos]</td>
                      <td width='80' class='center'>$data[fecha_Nacimiento]</td>
                      <td width='80' class='center'>$data[edad]</td>
                      <td width='80' class='center'>$data[telefono]</td>
                      <td width='80' class='center'>$data[direccion]</td>
                      <td width='80' class='center'>$data[email]</td>
                      <td width='80' class='center'>$data[num_contrato]</td>
                      <td width='60' class='center'>$data[grado]</td>
                      <td width='80' class='center'>$data[dia]</td>
                      <td width='80' class='center'>$data[horario]</td>
                      <td width='80' class='center'>$data[estado]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_alumnos&form=edit&id=$data[codigo]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/alumnos/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content