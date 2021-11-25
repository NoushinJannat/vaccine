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
                    <h3>Contact US</h3> 
                    <h4><a href="index.php"> Home </a> > Contact </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </div>
    <!--/. header -->

    <section id="contact" class="contact_pg">
        <div class="container"> 
            <div class="row">
                <div class="col-md-6 my-3">
                    <div class="embed-responsive embed-responsive-21by9 height-50">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d380513.7160704819!2d-88.01215363790064!3d41.83339249074502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2c3cd0f4cbed%3A0xafe0a6ad09c0c000!2z4Ka24Ka_4KaV4Ka-4KaX4KeLLCDgpofgprLgpr_gpqjgpq_gprwsIOCmruCmvuCmsOCnjeCmleCmv-CmqCDgpq_gp4HgppXgp43gpqTgprDgpr7gprfgp43gpp_gp43gprA!5e0!3m2!1sbn!2sbd!4v1593775339791!5m2!1sbn!2sbd" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    </div>
                </div>
                <div class="col-md-6 my-3 align-self-center">
                    <div class="card text-center">

                        <div class="card-body">
                            <form action="" method="post" autocomplete="off">  
                                <div class="form-group">
                                      <input type="hidden" name="book_id"  class="form-control" placeholder="" >
                                </div>
                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="text" name="r_name" class="form-control form-control-lg" placeholder="Enter your name here">
                                </div>

                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-email">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" name="r_email" id="text" class="form-control form-control-lg" placeholder="Enter your email here">
                                </div>

                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-phone">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="r_phone" id="phone" class="form-control form-control-lg" placeholder="Enter your phone here">
                                </div>

                                <button type="submit" name="submit" class="btn btn-block btn-lg text-uppercase contact-btn"><i class="far fa-hand-point-right mr-2"></i>Book My Table </button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php 
include "footer.php";
?>