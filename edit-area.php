<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Edit Area</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                <form action="manage.php" method="POST">
                <input type="hidden" style="width:350px;" class="form-control" id="id" name="id" >
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Edit Area name:</span>
						<input type="text" style="width:350px;" class="form-control" id="area" name="area">
					</div>	
                    			
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-success" name="UpdateBtnArea">Update</button>
                </div>
</form>
            </div>
        </div>
    </div>
<!-- /.modal -->