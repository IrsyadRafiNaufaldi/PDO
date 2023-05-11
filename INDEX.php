<?php
include ('KONEKSI.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>MAIN</title>
</head>

<body>    
  <?php 
    if (@$_GET['status']!==NULL) {
    $status = $_GET['status'];
    if ($status=='ok') {
      echo '<br><br><div class="alert alert-success" role="alert">Data Perusahaan berhasil di-update</div>';
    }
    elseif($status=='err'){
      echo '<br><br><div class="alert alert-danger" role="alert">Data Perusahaan gagal di-update</div>';
    }
    }
  ?>
  <div id="Customers">
  <h2 style="margin: 30px 0 30px 0; ">CUSTOMERS</h2>
  <table>
    <thead align="center">
      <tr>
        <th>Customer Number</th>
        <th>Customer Name</th>
        <th>Contact Last Name</th>
        <th>Contact First Name</th>
        <th>Phone</th>
        <th>Address Line 1</th>
        <th>Address Line 2</th>
        <th>City</th>
        <th>State</th>
        <th>Postal Code</th>
        <th>Country</th>
        <th>Sales Rep Employee Number</th>
        <th>Credit Limit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM customers";
        $result =  $conn->query($query);
      ?>

      <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
        <tr align="center">
          <td><?php echo $data['customerNumber'];  ?></td>
          <td><?php echo $data['customerName'];  ?></td>
          <td><?php echo $data['contactLastName'];  ?></td>
          <td><?php echo $data['contactFirstName'];  ?></td>
          <td><?php echo $data['phone'];  ?></td>
          <td><?php echo $data['addressLine1'];  ?></td>
          <td><?php echo $data['addressLine2'];  ?></td>
          <td><?php echo $data['city'];  ?></td>
          <td><?php echo $data['state'];  ?></td>
          <td><?php echo $data['postalCode'];  ?></td>
          <td><?php echo $data['country'];  ?></td>
          <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
          <td><?php echo $data['creditLimit'];  ?></td>
          <td>
            <a href="<?php echo "UpdateCustomers.php?customerNumber=".$data['customerNumber']; ?>" >Update</a>
            &nbsp;&nbsp;
            <a href="<?php echo "DeleteCustomers.php?customerNumber=".$data['customerNumber']; ?>" >Delete</a>
          </td>
        </tr>
      <?php endwhile ?>
    </tbody>
  </table>
                
  <div id="Products">
  <h2 style="margin: 30px 0 30px 0; ">PRODUCTS</h2>
  <table>
    <thead align ="center">
      <tr>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Product Line</th>
        <th>Product Scale</th>
        <th>Product Vendor</th>
        <th>Product Description</th>
        <th>Quantity In Stock</th>
        <th>Buy Price</th>
        <th>MSRP</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $no=1;
      $query1 = "SELECT * FROM products";
      $result1 =  $conn->query($query1);
    ?>
                
    <?php while($data = $result1->fetch(PDO::FETCH_ASSOC) ): ?>
    <tr align="center">
      <td><?php echo $data['productCode'];  ?></td>
      <td><?php echo $data['productName'];  ?></td>
      <td><?php echo $data['productLine'];  ?></td>
      <td><?php echo $data['productScale'];  ?></td>
      <td><?php echo $data['productVendor'];  ?></td>
      <td align="justify"><?php echo $data['productDescription'];  ?></td>
      <td><?php echo $data['quantityInStock'];  ?></td>
      <td><?php echo $data['buyPrice'];  ?></td>
      <td><?php echo $data['MSRP'];  ?></td>
      <td>
        <a href="<?php echo "UpdateProduct.php?productCode=".$data['productCode']; ?>" >Update</a>
        &nbsp;&nbsp;
        <a href="<?php echo "DeleteProduct.php?productCode=".$data['productCode']; ?>" >Delete</a>
      </td>
    </tr>
    <?php $no++; ?>
    <?php endwhile ?>
    </tbody>
  </table>
</body>
</html>