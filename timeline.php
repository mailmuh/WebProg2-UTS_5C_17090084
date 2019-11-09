<?php require_once("auth.php"); 
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Absensi</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">
                    <img class="img img-responsive rounded-circle mb-3" width="50" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>
                    <p><a href="logout.php">Logout</a></p>
                </div>
            </div>
        </div>
            <div class="card-body table-responsive p-0">
              <div class="col-lg-11 mb-5 mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nis</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Opsi</th>
                    </td>
                    </tr>
                  </thead>

            <?php 

            $query = "SELECT * FROM absen";
            $data = $db->prepare($query);
            $data->execute();

            $no = 1;
            while($tampil = $data->fetch(PDO::FETCH_LAZY)){

           ?>
            <tbody>
            <tr>
              <td><?php echo $tampil->id; ?></td>
              <td><?php echo $tampil->nis; ?></td>
              <td><?php echo $tampil->nama; ?></td>
              <td><?php echo $tampil->kelas; ?></td>
              <td>
              <div class="form-group">
                    <form action="simpan.php" method="post"> 
                    <input type="text" name="id" value="<?php echo $tampil->id; ?>" hidden><br/> 
                    <table> 
                     <input type="radio" name="absen" value="hadir" checked>Hadir<br/>  
                     </table>
                     <table>
                     <input type="radio" name="absen" value="sakit">Sakit<br/>  
                     </table>
                     <table>
                     <input type="radio" name="absen" value="alfa">Alfa<br/>
                     </table>
                     <td valign="top"> 
                     <input type="submit" class="btn btn-info" name="simpan"value="Simpan">
                    </td> 
                    </form>
                </div>
                </td>
              </td>
            </tr>
          </tbody>
        <?php } ?>
          
</body>
</html>