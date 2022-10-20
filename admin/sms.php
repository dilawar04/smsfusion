<?php require_once 'config/guard.php'; ?>
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
            <h2>Manage SMS</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
            <div class="grid simple ">
                <div class="grid-body no-border">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" id="activeAll" class="btn btn-primary tip" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="#" id="deactiveAll" class="btn btn-primary tip" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="#" id="deleteAll" class="btn btn-primary tip" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="add_sms.php" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                        
                    <br>
                       <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                    <div class="checkbox check-default">
                                        <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox10"></label>
                                    </div>
                                </th>
                                <th style="width:35%">Title</th>
                                <th style="width:35%">Category</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once 'config/dbc.php';

                            $query = mysqli_query($connection, "SELECT * FROM message") or die(mysqli_error($connection));
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox10"></label>
                                    </div>
                                </td>
                                <td><?php echo $row['title']; ?></td>
                                <td>
                                	<?php
                                    $category_id = $row['category_id'];
                                    $getCategoryById = mysqli_query($connection, "SELECT * FROM category WHERE 
                                        id=$category_id") or die (mysqli_error($connection));
                                    $viewCategoryById = mysqli_fetch_array($getCategoryById);
                                    echo $viewCategoryById['title'];
                                    ?></td>
                                <td>
                                    <?php if ($row['status'] == 'DEACTIVE'): ?>
                                    <a href="sms_status.php?id=<?php echo $row['id']; ?>" > <span class="label label-important btn-small"><i class="fa fa-thumbs-o-down"></i></span></a>
                                    <?php else: ?>
                                       <a href="sms_status.php?id=<?php echo $row['id']; ?>"> <span class="label label-info btn-small"><i class="fa fa-thumbs-o-up"></i></span> </a>
                                    <?php endif ?>   
                                </td>
                                <td>
                                    <a href="edit_sms.php?id=<?php echo $row['id']; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="delete_sms.php?id=<?php echo $row['id']; ?>" 
                                    onclick="return confirm('Are you sure you want to delete this message?')" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

