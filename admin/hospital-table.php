<?php
ob_start();
$page = 'holidays';
include "inc/header.php";
?>

      <div class="content-wrapper hospital_area">
        <div class="content">
          <div class="row">
            <div class="col-lg-12 col-md-12 basic_form">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">

                    <h3 class="d-inline font-primary">Hospitals Details  </h3> 

                    <?php if($_SESSION['role'] == 1){  ?>  
                      <div class="card_icon"><a href="hospital-form.php" class="my-btn"> <i class="mdi mdi-plus"></i> Add Hospitals Info</a></div>
                    <?php } ?>

                  </div>
                  <div class="table-responsive">

			    <?php
              //Database Connection
              include "inc/connection.php";
              $query = "SELECT * FROM hospitals_info ORDER BY hospital_id DESC";
              $result = mysqli_query($connection,$query) or die("Failed");
              $count = mysqli_num_rows($result);

              if($count > 0){ ?>

                  <table class="table table_custom">
                    <thead>
                        <tr>
                          <th>Hospital Name</th>
                          <th>Address</th>
                          <th>Normal Bed</th>
                          <th>ICU Bed</th>
                          <th>Oxygen</th> 
                          <th>Plasma Donner</th>
                          <?php if($_SESSION['role'] == 1){  ?> 
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>


				        <?php
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)){  
                ?>

                      <tr>
                        <td class="col-3"><span> <?php echo $row['hospital_name']; ?></span></td>
                        <td class="col-3"><span><?php echo $row['address']; ?> </span></td>
                        <td class="col-1"><span><?php echo $row['normal']; ?></span></td>
                        <td class="col-1"><span><?php echo $row['icu']; ?></span></td>
                        <td class="col-1"><span> <?php echo $row['oxygen']; ?></span></td>
                        <td class="col-1"><span><?php echo $row['plasma']; ?> </span></td>
                        <?php if($_SESSION['role'] == 1){  ?>  
                        <td class="col-1" style="max-width: 5%">   
                        <a href="hospital-update.php?id=<?php echo $row['hospital_id'] ?>" class="edit"> <i class="mdi mdi-square-edit-outline"></i></a>                            
                          <a onclick="return confirm('Are You Sure?')" href='hospital-delete.php?id= <?php echo $row['hospital_id'] ?>'><i class='mdi mdi-delete-outline'></i></a>
                        </td>
                        <?php } ?>
                      </tr>
 
                <?php 
                    } //while
                ?>
                    </tbody>
          <?php
              }else{
                  echo "No Data";
          } //if

          ?>
                  </table>




                </div> <!-- .table-responsive -->
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