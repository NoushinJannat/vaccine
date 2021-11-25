<?php 
include "header.php";
include "navbar.php";
?>

    <!-- header -->
    <div class="page-banner">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row blog-header text-center">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Our Menus</h3> 
                    <p><a href="index.php"> Home </a> > Menu </p>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </div>
    <!--/. header -->

    <section id="menu">
        <div class="container">
            <div class="heading border_btom">
                <h2>Our Menus</h2> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                      //Database Connection
                      include "admin/inc/connection.php";
                      $query = "SELECT * FROM menu ORDER BY menu_id DESC LIMIT 8";
                      $result = mysqli_query($connection,$query) or die("Failed");
                      $count = mysqli_num_rows($result);
                                  if($count > 0){ 
                    ?>

                    <div class="row my-3">
                        <div class="col">
                            <h1 class="primary-color text-center">Soups</h1>
                        </div>
                        <div class="col">
                            <h1 class="primary-color text-center">Sushimi</h1>
                        </div>
                    </div>
                    <div class="special_wrap">
                    <?php  
                        while($row = mysqli_fetch_assoc($result)){  
                    ?>
                        <div class="single-item p-3 special">
                            <div class="single-item-text">
                                <h2 class="text-capitalize text-dark"><?php echo $row['title']; ?></h2>
                                <p><?php echo $row['description']; ?></p>
                            </div>
                            <div class="single-item-price align-self-end">
                                <h1 class="text-capitalize text-dark"><?php echo $row['price']; ?></h1>
                            </div>

                            <h3 class="special-text text-capitalize">chef selection</h3>
                        </div>
                    <?php 
                        } //while
                    ?>
                          </tbody>
                <?php
                    }else{
                        echo "No Data";
                } //if
            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php 
include "footer.php";
?>