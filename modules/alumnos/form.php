 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Alumnos
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=alumnos"> Alumnos </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/alumnos/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as id FROM alumno
                                                ORDER BY codigo DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['id']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $id = "B$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Código.</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombres" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidos" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha_Nacimiento" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Edad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="edad" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Numero de Contrato</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="num_contrato" autocomplete="off" required>
                </div>
              </div>

              

              <div class="form-group">  
                <label class="col-sm-2 control-label">Grado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar grado --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_nivel, nombre FROM nivel ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_nivel]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

                <div class="form-group">  
                <label class="col-sm-2 control-label">Día</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar día --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_dia, nombre FROM dia ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_dia]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">  
                <label class="col-sm-2 control-label">Horario</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar horario --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_horario, nombre FROM horario ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_horario]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>


              <div class="form-group">  
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar estado --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_estado, nombre FROM estado ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_estado]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

                        
                              

             
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=alumnos" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}


elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,fecha_Nacimiento,edad,telefono,direccion,email,num_contrato,grado,dia,horario,estado  FROM alumno WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Editar datos de alumno
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=alumnos"> Alumnos </a></li>
      <li class="active"> editar </li>
    </ol>
  </section>

  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/alumnos/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['codigo']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombres" autocomplete="off" value="<?php echo $data['nombres']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidos" autocomplete="off" value="<?php echo $data['apellidos']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-2 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha_Nacimiento" autocomplete="off" value="<?php echo $data['fecha_Nacimiento']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2  control-label">Edad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="edad" autocomplete="off" value="<?php echo $data['edad']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" value="<?php echo $data['telefono']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="direccion" autocomplete="off" value="<?php echo $data['direccion']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo Electrónico</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Numero de Contrato</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="num_contrato" value="<?php echo $data['num_contrato']; ?>" readonly required>
                </div>
              </div>

              
              <div class="form-group">  
                <label class="col-sm-2 control-label">Grado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar grado --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_nivel, nombre FROM nivel ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_nivel]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

                <div class="form-group">  
                <label class="col-sm-2 control-label">Día</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar día --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_dia, nombre FROM dia ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_dia]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">  
                <label class="col-sm-2 control-label">Horario</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar horario --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_horario, nombre FROM horario ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_horario]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>


              <div class="form-group">  
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo" data-placeholder="-- Seleccionar estado --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_estado, nombre FROM estado ORDER BY nombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_estado]\"> $data_obat[nombre] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>          
              




              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=alumnos" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>