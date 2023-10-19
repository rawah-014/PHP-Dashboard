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
                                            <h5>Add Terminal</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="manage.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Terminal id</label>
                                                            <input type="number" class="form-control" required  name="terminal" placeholder="Enter terminal id">
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
                                                       
                                                        <button type="submit" class="btn btn-primary" name="registerbtnArea">Submit</button>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                            <label>Active</label>
                                                            <select class="form-control" name="active" required>
                                                                 <option class="form-control" value="" disabled selected>Terminal State</option>
                                                                <option class="form-control" value="1">Active</option>
                                                                <option class="form-control" value="0"> Unactive</option>
                                                </select>
                                                        </div>
                                                      
                                                    </form>
                                                </div>
                                            </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--[ Recent Users ] end-->
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-12 m-b-30">
                              
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Terminal id</th>
                                                        <th>Active/unactive</th>
                                                        <th>Area</th> 
                                                        <th>Manage</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT *
                                                FROM terminal
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <h6 id="idd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['terminal_id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="active<?php echo $row['id']; ?>" class="m-0"><?php echo $row['active']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="area<?php echo $row['id']; ?>" class="m-0"><?php echo $row['area']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete4" class="label theme-bg2 text-white f-12">Delete</a>
                                                               <!--Modal-->
      <div class="modal fade" id="delete4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                                    <button type="button" class="close btn btn-danger float-left" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                    <div class="modal-body">

                                                                                        <h4>Do you really want to delete this terminal ?</h4>
                                                                                    </div>
                                                                                    <div class="modal-footer">

                                                                                    <form action="manage.php" method="POST">
                                                                        <input type="hidden" name="DeleteId" value="<?php echo $row['id']; ?>">
                                                                                        <button class="btn btn-danger" type="submit" name="DeleteBtnTer">Yes</button>
                                                                                        </form>
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <form action="edit-ter.php" method="POST">
                                                                        <input type="hidden" name="EditId" value="<?php echo $row['id']; ?>">
                                                             <button type="submit" name="EditBtn" style=" background-color: white;border: none;" class="edit" value="<?php echo $row['id']; ?>">
                                                            <a href="#!" class="label theme-bg text-white f-12 edit">Edit</a></button> 
                                                            </form> -->

                                                           <!--  <form action="edit-ter.php" method="POST">
                                                                        <input type="hidden" name="EditId" value="<?php echo $row['id']; ?>">
                                                                        <button class="btn btn-success btn-mini btn-round" type="submit" name="EditBtn">
                                                                        <a href="#!" class="label theme-bg text-white f-12 edit">Edit</a>
                                                                        </button>
                                                                    </form> -->
                                                        
                                                    </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Record Found";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

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
<!-- [ Main Content ] end -->
<!-- Edit Modal-->
<!-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Edit Terminal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                <form action="manage.php" method="POST">
                <input type="number" style="width:350px;" class="form-control" id="id" name="id" >
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Edit User name:</span>
						<input type="text" style="width:350px;" class="form-control" id="edit-user" name="edit-user">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Edit Email:</span>
						<input type="email" style="width:350px;" class="form-control" id="edit-email" name="edit-email">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Edit Password:</span>
						<input type="password" style="width:350px;" class="form-control" id="edit-password"  name="edit-password">
					</div>		
                    			
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-success" name="UpdateBtn">Update</button>
                </div>
</form>
            </div>
        </div>
    </div> -->
<!-- /.modal -->
<script>
$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
        var idd=$('#idd'+id).text();
		var active=$('#active'+id).text();
        var area=$('#area'+id).text();
	
		$('#edit').modal('show');
        $('#id').val(idd);
		$('#active').val(active);
		$('#area').val(area);
	});
});
</script>

<?php
include('include/script.php');
include('include/footer.php');
?>
