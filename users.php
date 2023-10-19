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
                                            <h5>Manage Users</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Add User</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="manage.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control" required id="exampleInputPassword1" placeholder="Password" name="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Confirm Password</label>
                                                            <input type="password" class="form-control" required id="exampleInputPassword1" placeholder="Password" name="cpassword">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" name="registerbtn">Submit</button>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                        <div class="form-group">
                                                            <label>User Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" required name="first_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">User Type</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"  name="usertype" required>
                                                                <option value="Admin">Admin</option>
                                                                <option value="Supervisor">Supervisor</option>
                                                                <option value="Merchant">Merchant</option>
                                                                <option value="User">User</option>
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
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Admins</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Supervisors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Merchants</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Users</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Manage</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM `users`
                                                WHERE `usertype`='Admin'
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <h6 id="idd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="first_name<?php echo $row['id']; ?>" class="m-0"><?php echo $row['first_name']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="email<?php echo $row['id']; ?>" class="m-0"><?php echo $row['email']; ?></h6>
                                                        </td>
                                                        <h6 style="display:none;" id="password_hash<?php echo $row['id']; ?>" class="m-0"><?php echo $row['password_hash']; ?></h6>
                                                        <h6 style="display:none;" id="usertype<?php echo $row['id']; ?>" class="m-0"><?php echo $row['usertype']; ?></h6>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete2" class="label theme-bg2 text-white f-12">Delete</a>
                                                               <!--Modal-->
      <div class="modal fade" id="delete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                                    <button type="button" class="close btn btn-danger float-left" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                    <div class="modal-body">

                                                                                        <h4>Do you really want to delete this user ?</h4>
                                                                                    </div>
                                                                                    <div class="modal-footer">

                                                                                    <form action="manage.php" method="POST">
                                                                        <input type="hidden" name="DeleteId" value="<?php echo $row['id']; ?>">
                                                                                        <button class="btn btn-danger" type="submit" name="DeleteBtn">Yes</button>
                                                                                        </form>
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            <button type="button" style=" background-color: white;border: none;" class="edit" value="<?php echo $row['id']; ?>"><a href="#!" class="label theme-bg text-white f-12 edit">Edit</a></button>
                                                        
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
                                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>id</th>
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM `users`
                                                WHERE `usertype`='Supervisor'
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                 <tr>
                                                        <td>
                                                            <h6 id="idd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="first_name<?php echo $row['id']; ?>" class="m-0"><?php echo $row['first_name']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="email<?php echo $row['id']; ?>" class="m-0"><?php echo $row['email']; ?></h6>
                                                        </td>
                                                        <h6 style="display:none;" id="password_hash<?php echo $row['id']; ?>" class="m-0"><?php echo $row['password_hash']; ?></h6>
                                                        <h6 style="display:none;" id="usertype<?php echo $row['id']; ?>" class="m-0"><?php echo $row['usertype']; ?></h6>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete3" class="label theme-bg2 text-white f-12">Delete</a>
                                                               <!--Modal-->
      <div class="modal fade" id="delete3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                                    <button type="button" class="close btn btn-danger float-left" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                    <div class="modal-body">

                                                                                        <h4>Do you really want to delete this user ?</h4>
                                                                                    </div>
                                                                                    <div class="modal-footer">

                                                                                    <form action="manage.php" method="POST">
                                                                        <input type="hidden" name="DeleteId" value="<?php echo $row['id']; ?>">
                                                                                        <button class="btn btn-danger" type="submit" name="DeleteBtn">Yes</button>
                                                                                        </form>
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            <button type="button" style=" background-color: white;border: none;" class="edit" value="<?php echo $row['id']; ?>"><a href="#!" class="label theme-bg text-white f-12 edit">Edit</a></button>
                                                        
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
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>id</th>
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM `users`
                                                WHERE `usertype`='Merchant'
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                <tr>
                                                        <td>
                                                            <h6 id="idd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="first_name<?php echo $row['id']; ?>" class="m-0"><?php echo $row['first_name']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="email<?php echo $row['id']; ?>" class="m-0"><?php echo $row['email']; ?></h6>
                                                        </td>
                                                        <h6 style="display:none;" id="password_hash<?php echo $row['id']; ?>" class="m-0"><?php echo $row['password_hash']; ?></h6>
                                                        <h6 style="display:none;" id="usertype<?php echo $row['id']; ?>" class="m-0"><?php echo $row['usertype']; ?></h6>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete" class="label theme-bg2 text-white f-12">Delete</a>
                                                            <?php
                                                            include('delete-modal.php');
                                                            ?>
                                                            <button type="button" style=" background-color: white;border: none;" class="edit" value="<?php echo $row['id']; ?>"><a href="#!" class="label theme-bg text-white f-12 edit">Edit</a></button>
                                                        
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
                                        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="contact-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>id</th>
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM `users`
                                                WHERE `usertype`='User'
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                <tr>
                                                        <td>
                                                            <h6 id="idd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="first_name<?php echo $row['id']; ?>" class="m-0"><?php echo $row['first_name']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="email<?php echo $row['id']; ?>" class="m-0"><?php echo $row['email']; ?></h6>
                                                        </td>
                                                        <h6 style="display:none;" id="password_hash<?php echo $row['id']; ?>" class="m-0"><?php echo $row['password_hash']; ?></h6>
                                                        <h6 style="display:none;" id="usertype<?php echo $row['id']; ?>" class="m-0"><?php echo $row['usertype']; ?></h6>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete" class="label theme-bg2 text-white f-12">Delete</a>
                                                            <?php
                                                            include('delete-modal.php');
                                                            ?>
                                                            <button type="button" style=" background-color: white;border: none;" class="edit" value="<?php echo $row['id']; ?>"><a href="#!" class="label theme-bg text-white f-12 edit">Edit</a></button>
                                                        
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
<?php
include('edit-modal.php');
?>
<script>
$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
        var idd=$('#idd'+id).text();
		var first=$('#first_name'+id).text();
        var address=$('#email'+id).text();
		var last=$('#password_hash'+id).text();
        var type=$('#usertype'+id).text();
	
		$('#edit').modal('show');
        $('#id').val(idd);
		$('#edit-user').val(first);
		$('#edit-email').val(address);
		$('#edit-password').val(last);
        $('#usertype').val(type);
	});
});
</script>

<?php
include('include/script.php');
include('include/footer.php');
?>
