

<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Stock de Medicamentos

    <a class="btn btn-primary btn-social pull-right" href="modules/stock_inventory/print.php" target="_blank">
      <i class="fa fa-print"></i> Imprimir
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
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
                <th class="center">Numero de Contrato</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,fecha_Nacimiento,edad,telefono,direccion,email,num_contrato FROM alumno ORDER BY nombres ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              /*$precio_compra = format_rupiah($data['precio_compra']);
              $precio_venta = format_rupiah($data['precio_venta']);*/
             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[codigo]</td>
                      <td width='80' class='center'>$data[nombres]</td>
                      <td width='80' class='center'>$data[apellidos]</td>
                      <td width='80' class='center'>$data[fecha_Nacimiento]</td>
                      <td width='80' class='center'>$data[edad]</td>
                      <td width='80' class='center'>$data[telefono]</td>
                      <td width='80' class='center'>$data[direccion]</td>
                      <td width='80' class='center'>$data[email]</td>
                      <td width='80' class='center'>$data[num_contrato]</td>
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