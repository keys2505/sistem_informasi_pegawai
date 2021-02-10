<?php 
    include '../db/db_connection.php';
    include '../db/entity/user.php';

      $sql = "SELECT * FROM user ";
      $conn = new DBConnection();
      $conn -> get_connetion();
      $result =  $conn -> execute_query($sql);
    ?>
			
			
			<table id="DATA_USER" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Tipe User</th>
                  <th>Status User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 0;
                  if ($result->num_rows > 0) {
                    $user = new User();
                    while($row = $result ->fetch_assoc()) {
                      $no++;
                    ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row["USERNAME"]; ?></td>
                  <td><?php echo $row["FULLNAME"]; ?></td>
                  <td><?php echo $row["EMAIL"]; ?></td>
                  <td><?php echo $row["USER_TYPE"] == 1 ? 'Administrator' : 'Staff User'; ?></td>
                  <td><?php echo $row["USER_STATUS"] == 1 ? 'Non Aktif' : 'Aktif'; ?></td>
                  <td>
                    <a href="javascript:editUser('<?php echo $row["ID_USER"]; ?>');" class="btn"><i class="fas fa-edit" style="color: green;"></i></a>
                    <a href="javascript:deleteUser('<?php echo $row["ID_USER"]; ?>')" class="btn"><i class="fas fa-trash-alt" style="color: red;"></i></a>
                  </td>
                </tr>
                <?php }
                   }
                  $conn -> close_connetion();
                 ?>
                </tbody>
              
              </table>

  