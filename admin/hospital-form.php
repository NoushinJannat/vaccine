<?php
ob_start();
$page = 'employees-form';
include "inc/header.php";
?>
      <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-20 basic_form">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <h3 class="d-inline">Add Hospital Info</h3> 
                  </div>

                  <?php
                    if(isset($_POST['submit'])){
                      //Database Connection
                      include "inc/connection.php";
                      $hname = mysqli_real_escape_string($connection,$_POST['hname']); 
                      $haddress = mysqli_real_escape_string($connection,$_POST['haddress']);
                      $hnormal = mysqli_real_escape_string($connection,$_POST['hnormal']);
                      $hicu = mysqli_real_escape_string($connection,$_POST['hicu']);
                      $hoxygen = mysqli_real_escape_string($connection,$_POST['hoxygen']);
                      $hplasma = mysqli_real_escape_string($connection,$_POST['hplasma']);

                      $query = "SELECT hospital_name FROM hospitals_info WHERE hospital_name='$hname'";
                      $result = mysqli_query($connection, $query) or die("Query Faild");

                      $count = mysqli_num_rows($result);
                      if($count > 0){
                          echo "User Name Already Exists";
                      }else{
                          $query1 = "INSERT INTO hospitals_info (hospital_name,address,normal,icu,oxygen,plasma) 
                          VALUE ('$hname','$haddress','$hnormal','$hicu','$hoxygen','$hplasma')";
                          $result1 = mysqli_query($connection, $query1) or die("Query Faild.");

                          if($result1==true){
                              header("location: hospital-form.php");
                          }
                      }
                    }
                  ?>
                  
                  <!-- Form Start -->
                  <form  action="" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Hospital Name</label>
                          <input type="text" name="hname" class="form-control" placeholder="Hospital Name" required>
                      </div>
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="haddress" class="form-control" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                          <label>Normal Bed</label>
                          <input type="text" name="hnormal" class="form-control" placeholder="Add Normal Bed" required>
                      </div>                      
                      <div class="form-group">
                          <label>ICU Bed</label>
                          <input type="text" name="hicu" class="form-control" placeholder="Add ICU Bed" required>
                      </div>
                      <div class="form-group">
                          <label>Oxygen</label>
                          <input type="text" name="hoxygen" class="form-control" placeholder="Add Oxygen" required>
                      </div>                      
                      <div class="form-group">
                          <label>Plasma Donner</label>
                          <input type="text" name="hplasma" class="form-control" placeholder="Add Plasma Donner" required>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Add" required />
                  </form>
                  <!-- Form End-->


                </div> <!-- .card-body -->
              </div>  <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
          </div> <!-- .row (2nd)--> 
        </div> <!-- .content -->
      </div>
      <!-- End: content-wrapper Section -->

<?php include 'inc/footer.php'; ?>