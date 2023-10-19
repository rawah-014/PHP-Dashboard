
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
            <!-- <script> swal({
            title: "Good job!",
            text: "You clicked the button!",
             icon: "success",
            });</script> -->
            <?php
                        if(isset($_SESSION['status'])&& $_SESSION['status'] !='')
                        { 
                            ?>                          
                              <script> swal({
                                title: "<?php echo $_SESSION['status'] ?>",
                                //text: "",
                                icon: "<?php echo $_SESSION['status_code'] ?>",
                                });</script>
                           
                        }
                        <?php
                            unset($_SESSION['status']);
                        }
                    ?>