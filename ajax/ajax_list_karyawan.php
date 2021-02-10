	<?php 
		include '../db/db_connection.php';
		include '../db/entity/karyawan.php';

			$where = "";
			$sql = "SELECT * FROM karyawan ";

			if($_GET['ID_KARYAWAN'] != null){
				if(strlen($where) > 0){
					$where=$where." AND ";
				}
				$where=$where." ID_KARYAWAN = '".$_GET['ID_KARYAWAN']."'";
			}

			if($_GET['NAMA_KARYAWAN'] != null){
				if(strlen($where) > 0){
					$where=$where." AND ";
				}
				$where=$where." NAMA_KARYAWAN LIKE '%".$_GET['NAMA_KARYAWAN']."%'";
			}

			if($_GET['DEPARTMENT'] != null){
				if(strlen($where) > 0){
					$where=$where." AND ";
				}
				$where=$where." DEPARTEMENT IN ('".str_replace(",","','",$_GET['DEPARTMENT'])."')";
			}

			if($_GET['JABATAN'] != null){
				if(strlen($where) > 0){
					$where=$where." AND ";
				}
				$where=$where." JABATAN IN ('".str_replace(",","','",$_GET['JABATAN'])."')";
			}

			if($_GET['STATUS_RESIGN'] != null){
				if(strlen($where) > 0){
					$where=$where." AND ";
				}
				$where=$where." STATUS_RESIGN IN ('".str_replace(",","','",$_GET['STATUS_RESIGN'])."')";
			}

			if($where != null){
				$sql = "SELECT * FROM karyawan WHERE ".$where;
			}
			
			$conn = new DBConnection();
			$conn -> get_connetion();
			$result =  $conn -> execute_query($sql);
			?>
			<table id="DATA_KARYAWAN" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID Karayawan</th>
                  <th>Nama Karyawan</th>
                  <th>Departement</th>
                  <th>Jabatan</th>
                  <th>Status Resign</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 0;
            	if ($result->num_rows > 0) {
					$Karyawan = new Karyawan();
					while($row = $result ->fetch_assoc()) {
						$no++;
                  	?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row["ID_KARYAWAN"]; ?></td>
                  <td><?php echo $row["NAMA_KARYAWAN"]; ?></td>
                  <td><?php echo $row["DEPARTEMENT"] ?></td>
                  <td><?php echo $row["JABATAN"]; ?></td>
                  <td><?php echo ($row["STATUS_RESIGN"] == 0 ) ? 'No' : 'Yes' ?></td>
                  <td>
                    <a href="javascript:editEmp('<?php echo $row["ID_KARYAWAN"]; ?>');" class="btn"><i class="fas fa-edit" style="color: green;"></i></a>
                    <a href="javascript:deleteEmp(<?php echo $row["ID_KARYAWAN"]; ?>);" class="btn"><i class="fas fa-trash-alt" style="color: red;"></i></a>
                  </td>
                </tr>
                <?php 
            		} 
            	}
            	$conn -> close_connetion();
                 ?>
                </tbody>
              
              </table>

  