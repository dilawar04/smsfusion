<?php require_once 'config/guard.php'; ?>

<?php 

  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
 
  require_once 'config/dbc.php';
  $date = $_POST['create_date'];
  $category_id = $_POST['category_id'];
  $member_id = 'DEACTIVE';
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $content = $_POST['content'];
  $status = 'DEACTIVE';
  $meta_description = $_POST['meta_description'];
  $meta_keyword = $_POST['meta_keyword'];

  mysqli_query($connection, "INSERT INTO message(create_date,category_id,member_id,title,slug,content,status,meta_description,meta_keyword) VALUES ('$date','$category_id','$member_id','$title','$slug','$content','$status','$meta_description','$meta_keyword')") or die(mysqli_error($connection));

  header("location:sms.php");
  }
?>

<!--BEGIN HEADER HERE-->
<?php include 'partials/header.php'; ?>
<!--END HEADER HERE-->

<!--BEGIN SIDEBAR HERE-->
<?php include 'partials/sidebar.php'; ?>
<!--END SIDEBAR HERE-->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Add SMS</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formAdd" id="formAdd" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="col-md-14">
            <div class="grid simple">
                <div class="grid-body no-border">
                    <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              &nbsp;
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="category_id" id="category_id" class="form-control">
                          <option  value="0">-- Select Category --</option>
                          <?php 
                           require_once 'config/dbc.php';
                           $getCategories = mysqli_query($connection, "SELECT * FROM category") or die (mysqli_error($connection));
                           while ($viewCategory = mysqli_fetch_array($getCategories)) {
                           ?>
                          <option value="<?php echo $viewCategory['id']; ?>"><?php echo $viewCategory['title']; ?></option>
                      <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text"  class="form-control" placeholder="Title">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text"  class="form-control" placeholder="Slug">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="content" id="content" rows="8" class="form-control" placeholder="SMS"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="sms.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
            </div>
        </div>
        </form>
        <script type="text/javascript">
          var frmvalidator  = new Validator("formAdd");
          frmvalidator.addValidation("create_date","req","Date shouldn't be empty!");
          frmvalidator.addValidation("title","req","Title shouldn't be empty!");
          frmvalidator.addValidation("slug","req","Slug shouldn't be empty!");
        </script>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>

