<?php
ob_start();
$page = 'appointment-table';
include 'inc/header.php'; 
?>
 
<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    $appointment_id = mysqli_real_escape_string($connection,$_POST['appointment_id']); 
    
    $a_name = mysqli_real_escape_string($connection,$_POST['a_name']); 
    $m_phone = mysqli_real_escape_string($connection,$_POST['m_phone']);
    $a_address = mysqli_real_escape_string($connection,$_POST['a_address']);
    $department = mysqli_real_escape_string($connection,$_POST['department']); 
    $visit_doctor = mysqli_real_escape_string($connection,$_POST['visit_doctor']); 

    $visitdate = date('Y-m-d', strtotime($_POST['visitdate']));

    $query2 = "UPDATE appointment SET fullname='{$a_name}', address='{$a_address}', visit_doctor='{$visit_doctor}', vdate='{$visitdate}', department='{$department}', phone='{$m_phone}' WHERE appointment_id = '{$appointment_id}'"; // first_name=from database , {$f_name}= Form Name field
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild");
    if($result2 == true){
        header ("location: appointment-table.php");
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
                    <h3 class="d-inline"> Doctor Appointment Update </h3> 
                  </div>
<?php
    $vaccine_idd = $_GET['id'];
    include "inc/connection.php";
    $query = "SELECT * FROM appointment WHERE appointment_id = {$vaccine_idd}";
    $result = mysqli_query($connection,$query) or die("FAILED");
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
                <form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="appointment_id"  class="form-control" value="<?php echo $row['appointment_id'] ?>" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label for="title">Full Name</label>
                          <input type="text" name="a_name" class="form-control" id="title" value="<?php echo $row['fullname'] ?>" placeholder="" required>
                      </div> 
                      <div class="form-group">
                          <label for="price">Address</label>
                          <input type="text" name="a_address" class="form-control" id="address" value="<?php echo $row['address'] ?>" placeholder="" required>
                      </div>  
                      <div class="form-group">
                        <label for="phone">Mobile Number</label>
                        <input type="text" name="m_phone" class="form-control" id="phone" value="<?php echo $row['phone'] ?>" placeholder="">
                      </div>

                    <div class="form-group">
                        <label>Visit Doctor</label>
                        <select class="form-control" name="visit_doctor" value="<?php echo $row['visit_doctor'] ?>">
                            <?php  
                                if($row['visit_doctor'] == Noushin){
                                  echo "<option value='Noushin' selected > Noushin </option>";
                                  echo "<option value='Swaliha'> Swaliha </option>";
                                  echo "<option value='Tithi'> Tithi </option>";
                                  echo "<option value='Pullen'> Pullen </option>";
                                  echo "<option value='Fillmore'> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler'> Holler </option>";
                                } elseif ($row['visit_doctor'] == Swaliha) {
                                  echo "<option value='Noushin'> Noushin </option>";
                                  echo "<option value='Swaliha' selected> Swaliha </option>";
                                  echo "<option value='Tithi'> Tithi </option>";
                                  echo "<option value='Pullen'> Pullen </option>";
                                  echo "<option value='Fillmore'> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler'> Holler </option>";
                                } elseif ($row['visit_doctor'] == Tithi) {
                                  echo "<option value='Noushin'> Noushin </option>";
                                  echo "<option value='Swaliha'> Swaliha </option>";
                                  echo "<option value='Tithi' selected> Tithi </option>";
                                  echo "<option value='Pullen'> Pullen </option>";
                                  echo "<option value='Fillmore'> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler'> Holler </option>";
                                }elseif ($row['visit_doctor'] == Pullen) {
                                  echo "<option value='Noushin'> Noushin </option>";
                                  echo "<option value='Swaliha'> Swaliha </option>";
                                  echo "<option value='Tithi'> Tithi </option>";
                                  echo "<option value='Pullen' selected> Pullen </option>";
                                  echo "<option value='Fillmore'> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler'> Holler </option>";
                                }elseif ($row['visit_doctor'] == Fillmore) {
                                  echo "<option value='Noushin'> Noushin </option>";
                                  echo "<option value='Swaliha'> Swaliha </option>";
                                  echo "<option value='Tithi'> Tithi </option>";
                                  echo "<option value='Pullen'> Pullen </option>";
                                  echo "<option value='Fillmore' selected> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler'> Holler </option>";
                                }else {
                                  echo "<option value='Noushin'> Noushin </option>";
                                  echo "<option value='Swaliha'> Swaliha </option>";
                                  echo "<option value='Tithi'> Tithi </option>";
                                  echo "<option value='Pullen'> Pullen </option>";
                                  echo "<option value='Fillmore'> Fillmore </option>";
                                  echo "<option value='Nervo'> Nervo </option>";
                                  echo "<option value='Holler' selected> Holler </option>";
                                }   
                            ?>    
                        </select>
                    </div> 

                    <div class="form-group">
                        <label>Select Department </label>
                        <select class="form-control" name="department" value="<?php echo $row['department'] ?>">
                            <?php  
                                if($row['visit_doctor'] == cardiologist){
                                  echo "<option value='cardiologist' selected > Cardiologist </option>";
                                  echo "<option value='dentist'> Dentist </option>";
                                  echo "<option value='psychiatrists'> Psychiatrists </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist'> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist'> Pulmonologist </option>";
                                } elseif ($row['visit_doctor'] == dentist) {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='dentist' selected> Dentist </option>";
                                  echo "<option value='psychiatrists'> Psychiatrists </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist'> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist'> Pulmonologist </option>"; 
                                }  elseif ($row['visit_doctor'] == psychiatrists) {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='dentist'> Dentist </option>";
                                  echo "<option value='psychiatrists' selected> Psychiatrists </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist'> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist'> Pulmonologist </option>"; 
                                } elseif ($row['visit_doctor'] == neurologist) {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='dentist'> Dentist </option>";
                                  echo "<option value='psychiatrists'> Psychiatrists </option>";
                                  echo "<option value='neurologist' selected> Neurologist </option>";
                                  echo "<option value='oncologist'> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist'> Pulmonologist </option>"; 
                                } elseif ($row['visit_doctor'] == oncologist) {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='dentist'> Dentist </option>";
                                  echo "<option value='psychiatrists'> Psychiatrists </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist' selected> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist'> Pulmonologist </option>"; 
                                } else {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='dentist'> Dentist </option>";
                                  echo "<option value='psychiatrists'> Psychiatrists </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist'> Oncologist </option>";
                                  echo "<option value='radiologist'> Radiologist </option>";
                                  echo "<option value='pulmonologist' selected> Pulmonologist </option>"; 
                                }   
                            ?>    
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="phone">Appointment Date</label>
                      <input type="date" name="visitdate" class="form-control" id="m_date"  value="<?php echo $row['vdate'] ?>"> 
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
