<?php
include('security.php');

include('access.php');
include('include/header.php');
include('include/navbar.php');

?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                        <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Manage Terminals</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Edit Terminal</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                        <?php
                    
                    if(isset($_POST['EditBtn'])){
                        $id = $_POST['EditId'];
                        $query = "SELECT * FROM users WHERE id='$id'";
                        $query_run = mysqli_query($connection,$query);

                        foreach($query_run as $row){
                            ?>
                                                    <form action="manage.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Terminal id</label>
                                                            <input type="number" class="form-control" required  name="terminal" placeholder="Enter terminal id"
                                                            value="<?php echo $row['terminal_id']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Area</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"  name="area" required>
                                                            <option class="form-control" value="" disabled selected>Select Area</option>
                                                            <?php

$query2 = "SELECT *
 FROM area
 ";
$query_run2 = mysqli_query($connection, $query2);
if (mysqli_num_rows($query_run2) > 0) {
    while ($row2 = mysqli_fetch_assoc($query_run2)) {
?>
                                                                       <option class="form-control" value=<?php echo $row2['id']; ?>><?php echo $row2['area-name']; ?></option>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "No Record Found";
                                                        }
                                                        ?>
                                                            </select>
                                                        </div>
                                                       
                                                        <button type="submit" class="btn btn-primary" name="registerbtnTer">Submit</button>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                            <label>Active</label>
                                                            <select class="form-control" name="active" required>
                                                                 <option class="form-control" value="" disabled selected>Terminal State</option>
                                                                <option class="form-control" value="1" <?php if($row['active']== '1'){ echo 'selected'; }?>>Active</option>
                                                                <option class="form-control" value="0" <?php if($row['active']== '0'){ echo 'selected'; }?>> Unactive</option>
                                                </select>
                                                        </div>
                                                      
                                                    </form>
                                                    <?php
                            }
                        }
                      ?>  
                                                </div>
                                            </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--[ Recent Users ] end-->
                        

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include('include/script.php');
include('include/footer.php');
?>
