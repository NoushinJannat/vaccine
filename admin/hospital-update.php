<?php
ob_start();
$page = 'appointment-table';
include 'inc/header.php'; 
?>
 
<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    $hospital_id = mysqli_real_escape_string($connection,$_POST['hospital_id']); 
    
        $hname = mysqli_real_escape_string($connection,$_POST['hname']); 
        $haddress = mysqli_real_escape_string($connection,$_POST['haddress']);
        $hnormal = mysqli_real_escape_string($connection,$_POST['hnormal']);
        $hicu = mysqli_real_escape_string($connection,$_POST['hicu']);
        $hoxygen = mysqli_real_escape_string($connection,$_POST['hoxygen']); 
        $hplasma = mysqli_real_escape_string($connection,$_POST['hplasma']); 


    $query2 = "UPDATE hospitals_info SET hospital_name='{$hname}', address='{$haddress}', normal='{$hnormal}', icu='{$hicu}', oxygen='{$hoxygen}', plasma='{$hplasma}' WHERE hospital_id = '{$hospital_id}'";
    
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild a");
    if($result2 == true){
        header ("location: hospital-table.php");
    }
}
?>


      <!-- Content Section -->
      <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-50 basic_form">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <h3 class="d-inline"> Hospital List Update </h3> 
                  </div>
<?php
    $hospital_idd = $_GET['id'];
    include "inc/connection.php";
    $query = "SELECT * FROM hospitals_info WHERE hospital_id = {$hospital_idd}";
    $result = mysqli_query($connection,$query) or die("FAILED");
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
          <form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
              <div class="form-group">
                  <input type="hidden" name="hospital_id"  class="form-control" value="<?php echo $row['hospital_id'] ?>" placeholder="" >
              </div>
              <div class="form-group">
                  <label>Hospital Name</label>
                  <input type="text" name="hname" class="form-control" value="<?php echo $row['hospital_name'] ?>" placeholder="" required>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="haddress" class="form-control" value="<?php echo $row['address'] ?>" placeholder="" required>
              </div>
              <div class="form-group">
                  <label>Normal Bed</label>
                  <input type="text" name="hnormal" class="form-control" value="<?php echo $row['normal'] ?>" placeholder="" required>
              </div>
              <div class="form-group">
                  <label>ICU Bed</label>
                  <input type="text" name="hicu" class="form-control" value="<?php echo $row['icu'] ?>" placeholder="" required>
              </div>
              <div class="form-group">
                  <label>Oxygen</label>
                  <input type="text" name="hoxygen" class="form-control" value="<?php echo $row['oxygen'] ?>" placeholder="" required>
              </div>                      
              <div class="form-group">
                  <label>Plasma Donner</label>
                  <input type="text" name="hplasma" class="form-control" value="<?php echo $row['plasma'] ?>" placeholder="" required>
              </div> 
              <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
          </form>

    <?php 
            }//while
        } //if
    ?>  
                </div> <!-- .card-body -->
              </div>  <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
          </div> <!-- .row (2nd)--> 
        </div> <!-- .content -->
      </div>
      <!-- End: content-wrapper Section -->
  
<?php include 'inc/footer.php';
ob_end_flush();
?>
