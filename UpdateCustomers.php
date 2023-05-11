<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('KONEKSI.php');

  
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = $conn->prepare("SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'");

          //eksekusi query
          $query->bindParam(':customerNumber',$customerNumber_upd );

      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $contactLastName = $_POST['contactLastName'];
      $contactFirstName = $_POST['contactFirstName'];
      $phone = $_POST['phone'];
      $addressLine1 = $_POST['addressLine1'];
      $addressLine2 = $_POST['addressLine2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $postalCode = $_POST['postalCode'];
      $country = $_POST['country'];
      $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      $creditLimit = $_POST['creditLimit'];

      //query SQL
      $query = $conn->prepare("UPDATE customers SET customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName',
      phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit'
      WHERE customerNumber='$customerNumber'");

      $query->bindParam(':customerNumber',$customerNumber);
      $query->bindParam(':customerName',$customerName);
      $query->bindParam(':contactLastName',$contactLastName);
      $query->bindParam(':contactFirstName',$contactFirstName);
      $query->bindParam(':phone',$phone);
      $query->bindParam(':addressLine1',$addressLine1);
      $query->bindParam(':addressLine2',$addressLine2);
      $query->bindParam(':city',$city);
      $query->bindParam(':state',$state);
      $query->bindParam(':postalCode',$postalCode);
      $query->bindParam(':country',$country);
      $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
      $query->bindParam(':creditLimit',$creditLimit);

      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: INDEX.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE CUSTOMERS</title>
  </head>

  <body>    
      <h2 style="margin: 30px 0 30px 0;">Update Data Customers</h2>
        <form action="updateCustomers.php" method="POST">
            <?php while($data = $query->fetch(PDO::FETCH_ASSOC)) {?>
                
              <label>Customer Number</label>
              <input type="text" class="form-control" placeholder="customer number" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            

            
              <label>Customer Name</label>
              <input type="text" class="form-control" placeholder="customer name" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required">
            

            
              <label>Contact Last Name</label>
              <input type="text" class="form-control" placeholder="contact last name" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required">
            

            
              <label>Contact First Name</label>
              <input type="text" class="form-control" placeholder="contact first name" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required">
            

            
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required">
            

             
              <label>Address Line 1</label>
              <input type="text" class="form-control" placeholder="address line 1" name="addressLine1" value="<?php echo $data['addressLine1'];  ?>" required="required">
            

            
              <label>Address Line 2</label>
              <input type="text" class="form-control" placeholder="address line 1" name="addressLine2" value="<?php echo $data['addressLine2'];  ?>" required="required">
            

             
              <label>City</label>
              <input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $data['city'];  ?>" required="required">
            

             
              <label>State</label>
              <input type="text" class="form-control" placeholder="state" name="state" value="<?php echo $data['state'];  ?>" required="required">
             

             
              <label>Postal Code</label>
              <input type="text" class="form-control" placeholder="postal code" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
            

             
              <label>Sales Rep Employee Number</label>
              <input type="text" class="form-control" placeholder="sales rep employee number" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>" required="required">
             
            <?php
            }
            ?>
            
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>