<?php 
  include ('KONEKSI.php'); 

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
      $customerNumber_upd = $_GET['customerNumber'];
      $query = $conn->prepare("DELETE FROM customers WHERE customerNumber = :customerNumber")
      $query->bindParam(':customerNumber',$customerNumber_upd);
          
        if ($query->execute()) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
          
        header('Location: INDEX.php?status='.$status);
    }  
  }
?>