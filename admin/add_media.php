<?php require_once 'config/guard.php'; ?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  
  require_once 'config/dbc.php';
  $date = $_POST['create_date'];
  $media_type = $_POST['media_type'];
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $status = 'DEACTIVE';
  $meta_description = $_POST['meta_description'];
  $meta_keyword = $_POST['meta_keyword'];

  if ($_FILES['media_img'])
  {
    $name = uniqid(time());
    $extension = pathinfo($_FILES['media_img']['name'], PATHINFO_EXTENSION);
    $fileName = $name . "." . $extension;
    $hasFileUploaded = move_uploaded_file($_FILES['media_img']['tmp_name'], '../uploads/' . $fileName);
  }

  if ($hasFileUploaded) 
  {
  mysqli_query ($connection, "INSERT INTO media(create_date, media_type, title, slug, description, media_img, status, meta_description, meta_keyword)
    VALUES ('$date','$media_type','$title','$slug','$description','$fileName','$status',
    '$meta_description','$meta_keyword')") or die (mysqli_error($connection));
  }
    header("location:media.php");
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
            <h2>Add Media</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formAdd" id="formAdd" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
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
                        <select name="media_type" id="media_type">
                          <option value="0">-- Select Media --</option>
                          <option value="slideshow">Slideshow</option>
                          <option value="gallery">Gallery</option>
                          <option value="video">Video</option>
                          <option value="audio">Audio</option>
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
                        <textarea name="description" id="description" rows="8" class="form-control" placeholder="Description"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                       <input type="file" name="media_img" id="media_img"> 
                      </div>
                  </div>
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
          <a href="media.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

