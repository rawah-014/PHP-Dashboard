      <!--Modal-->
      <div class="modal fade" id="delete-area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Area</h5>
                                                                                    <button type="button" class="close btn btn-danger float-left" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                    <div class="modal-body">

                                                                                        <h4>Do you really want to delete this area ?</h4>
                                                                                    </div>
                                                                                    <div class="modal-footer">

                                                                                    <form action="manage.php" method="POST">
                                                                        <input type="hidden" name="DeleteId" value="<?php echo $row['id']; ?>">
                                                                                        <button class="btn btn-danger" type="submit" name="DeleteBtnArea">Yes</button>
                                                                                        </form>
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>