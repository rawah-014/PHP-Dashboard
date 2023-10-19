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
                                            <h5>Manage Areas</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Add Area</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="manage.php" method="POST">
                                                        <div class="form-group">
                                                            <label >Area Name</label>
                                                            <input type="text" class="form-control" required  name="area" placeholder="Enter area name">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" name="areabtn">Submit</button>
                                                    
                                                </div>
                                                </form>
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
                                                        <th>id</th>
                                                        <th>Area Name</th>
                                                        <th>Manage</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT *
                                                FROM area
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <h6 id="iddd<?php echo $row['id']; ?>" class="m-0"><?php echo $row['id']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6 id="area<?php echo $row['id']; ?>" class="m-0"><?php echo $row['area-name']; ?></h6>
                                                        </td>
                                                        <td>
                                                            <a  data-toggle="modal" data-target="#delete-area" class="label theme-bg2 text-white f-12">Delete</a>
                                                            <?php
                                                            include('delete-area.php');
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
include('edit-area.php');
?>
<script>
$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
        var iddd=$('#iddd'+id).text();
		var area =$('#area'+id).text();
       
	
		$('#edit').modal('show');
        $('#id').val(iddd);
		$('#area').val(area);
	});
});
</script>

<?php
include('include/script.php');
include('include/footer.php');
?>
