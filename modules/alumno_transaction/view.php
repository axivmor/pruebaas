

<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Pagos e incripcion

    <a class="btn btn-primary btn-social pull-right" href="?module=form_alumno_transaction&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Incripcion / Colegiatura
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
              Datos registrados correctamente.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
         
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo de Transación</th>
                <th class="center">Fecha</th>
                <th class="center">Codigo</th>
                <th class="center">Nombres</th>
				        <th class="center">Apellidos</th>
                <th class="center">Tipo de Pago</th>
                <th class="center">Mes</th>
                <th class="center">Cantidad</th>
                <th class="center">Tipo de pago</th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;

            $query = mysqli_query($mysqli, "SELECT codigo_transaccion,fecha,codigo_alumno,nombres,apellidos,tipo_pago,mes_pago,cantidad,tipo_transaccion
                                            FROM transaccion_alumno  ORDER BY fecha DESC")
                                            or die('error '.mysqli_error($mysqli));
           
            /*$query = mysqli_query($mysqli, "SELECT a.tipo_transaccion, a.codigo_alumno,a.fecha,a.codigo,a.numero,b.codigo,b.nombre,b.unidad
                                            FROM transaccion_alumno as a INNER JOIN alumno as b ON a.codigo=b.codigo ORDER BY codigo_transaccion DESC")
                                            or die('error '.mysqli_error($mysqli));*/

           
            while ($data = mysqli_fetch_assoc($query)) { 
              $fecha         = $data['fecha'];
              $exp             = explode('-',$fecha);
              $fecha2   = $exp[2]."-".$exp[1]."-".$exp[0];

             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[codigo_transaccion]</td>
                      <td width='80' class='center'>$fecha</td>
                      <td width='80' class='center'>$data[codigo_alumno]</td>
                      <td width='80'>$data[nombres]</td>
                      <td width='80' align='right'>$data[apellidos]</td>
                      <td width='80' align='right'>$data[tipo_pago]</td>
                      <td width='80' align='right'>$data[mes_pago]</td>
                      <td width='80' align='right'>$data[cantidad]</td>
					  <td width='80' class='center'>$data[tipo_transaccion]</td>
                      
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