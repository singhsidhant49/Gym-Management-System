<div class="modal modal-danger fade in" id="DeleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
          <?php 
              if (isset($_POST['delete_category_id_btn'])) {
                $delete_category_id_input = $_POST['category_id_delete'];
                $sql_delete_category_id = "DELETE FROM  categories WHERE id ={$delete_category_id_input}";
                $result_sql_delete_category_id = mysqli_query($conn, $sql_delete_category_id);
                header("Location: ../modal/category_admin.php");
              }
           ?>
    <div class="modal-content">
      <form method="post" action="">
      <div class="modal-header">
         <h4 class="modal-title">ARE YOU SURE??</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" class="form-control" id="category_id_delete" name="category_id_delete">
         <h5> <i class="fa fa-trash"></i>
             YOU WANT TO DELETE THIS CATEGORY ??</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="delete_category_id_btn" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-name"></span>Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>