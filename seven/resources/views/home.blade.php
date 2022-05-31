<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link href="css/datatables.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    
    <script src="js/jqueryv3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <title>Ticket Dispatching</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
  <div class="container-fluid">
	
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		<li class="navbar-brand"><a class="text-decoration-none ticketweb" style="color:black;" href="/ticketweb/">Ticket Dispatching</a></li>
        <li></li>
      </ul>
      <span class="navbar-nav"><img src="images/bosch_logo_w340.png" style="" class="bosch-logo float-end" alt="bosch logo" width="40%" height="auto"></span>
    </div>
  </div>
</div>
</nav>
<div class="container">
		<h5 class="instruction-head">Instructions:</h5>
		<ul class="instruction-list">
			<li>the point to remember</li>
			<li>the point 2 to remember</li>
			<li>the point 3 to remember</li>
			<li>the point 4 to remember</li>
		</ul>
		
	</div>
    
    <form class="myforms" action="#myTable">

        <div class="mx-auto my-2" style="text-align:center;">

            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                data-bs-target="#createModal">Create User</button>
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#editModal">Assign</button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                data-bs-target="#deleteModal">Delete User</button>
        
		</div>
    </form>


<!-- Creating New User Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create New Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method='POST'>
                <div class="modal-body">
                    <p style="font-family: Arial, Helvetica, sans-serif;text-align:center">Please fill to Create New Entry</p>
                    <hr>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"><b>Employee ID</b></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Enter ID" class="form-control" id="eid" name="eid" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"><b>Assignee</b></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Enter Assignee" class="form-control" name="assignee"
                                id="assignee" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label"><b>Email address</b></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@in.bosch.com" required>
                        </div>
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Assignee Modal-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Availability</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method='POST'>
                <div class="modal-body">
                    
                    <div class="mb-3 row">

                        <div class="col-sm-10">
                            <input type="hidden" name="sno" id="sno">
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label"><b>Assignee</b></label>
                        <?php
        $sql = "SELECT `id`,`assignee` FROM `emp`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

                        <select class="form-select custom-select chosen-select" name="emp_id" id="e_emp_id" aria-label="Default select example"
                            data-live-search="true" required>
                        
                            <option value="" disabled selected>CHOOSE ASSIGNEE</option>
                            <?php
                                foreach ($arr  as $data){
                            ?>
                            
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['assignee']; ?></option>
                            <?php 
                         
                                }
                                ?>

                           

                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Groups</b></label>
                        
                        <?php
            $sql = "SELECT id,grp_name FROM grp";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

                        <select class="form-select chosen-select" name="grp_id" id="g_grp_id" aria-label="Default select example">
                        <option value="" disabled selected>CHOOSE GROUP</option>
                            <?php 
                            
                                foreach ($arr  as $data){
                            ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['grp_name']; ?></option>
                            <?php 
                        
                                }
                        ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label pr-3"><b>Services</b></label>
                                <br>
                        <?php
            $sql = "SELECT id,service_name FROM services";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                        
                        <?php
                            foreach($arr as $data){
                        ?>
                        <input class="form-check-input" name="service_id[]"  type="checkbox" value="<?php echo $data['id']; ?>"
                            >
                            <?php echo $data['service_name']; ?>
                        <br>
                        <?php
                        }
                        ?>

                        
                    </div>


                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"><b>Set Availability</b></label>
                        <div class="col-sm-10">
                            <input placeholder="Start Date & Time" name="t_start_time" id="dateAndTimePicker3" />
                            <input placeholder="End Date & Time" name="t_end_time" id="dateAndTimePicker4" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-dark">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete user Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method='POST'>
                <div class="modal-body">
                    <p style="font-family: Arial, Helvetica, sans-serif;text-align:center">Do You Want to Delete User?</p>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label"><b>Assignee</b></label>
                        <?php
                        $sql = "SELECT `id`,`assignee` FROM `emp`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
                       <select class="form-select custom-select chosen-select" name="d_emp_id" id="d_emp_id" aria-label="Default select example"
                            data-live-search="true" required>
                        
                            <option value="" disabled selected>CHOOSE ASSIGNEE</option>
                            <?php 
                            
                                foreach ($arr  as $data){ 
                            ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['assignee']; ?></option>
                            <?php 
                            
                                }
                            ?>
                            </select>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-secondary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom:50px;">
    <!-- Responsive Data Table -->
    <div class="mytable my-1" style="border: 1px solid;">
        <form action="" method="POST">
            <table class="datatable" id="myTable">

                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Assignee</th>
                        <th scope="col">Services</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Count</th>
                        <th scope="col">Group</th>
                        <th scope="col">Email</th>
                        <th class="noExport" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                $sql = "SELECT a.*,b.assignee,b.email FROM users a INNER JOIN emp b ON(a.emp_id = b.id) ORDER BY a.sno DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                $serial  = 1;
                $num_row = $stmt->rowCount();
                foreach ($arr  as $data){
            
          $sno = $data['sno'];
          $emp_id = $data['emp_id'];
          
          ?>
                    <tr>
                        <td scope="row"><?php echo $serial; $serial++; ?></td>
                        <td><?php echo $data['assignee']; ?></td>
                        <td>
                            <?php  if($data['service_id'] == 1){
                echo "AA_EMEA";
              }else if($data['service_id'] == 2){
                echo "ADD_ONE";
              }
              else if ($data['service_id'] == 3){
                echo "PT";
              }
              else if($data['service_id'] == 4){
                echo "PAD";
              }
              else if($data['service_id'] == 5){
                echo "AA_NA";
              }
              else if($data['service_id'] == 6){
                echo "TT";
              }
              else if($data['service_id'] == 7){
                echo "DP_BBM";
              }
              else if($data['service_id'] == 8){
                echo "BBM";
              }
              else {
                echo "Unlisted";
              } 
          ?>
                        </td>

                        <td><?php echo $data['t_start_time']; ?></td>
                        <td><?php echo $data['t_end_time']; ?></td>
                        <td><?php echo $data['count']; ?></td>
                        <td>
                            <?php  if($data['grp_id'] == 1){
                      echo "Logistics Planning - RBEI";
                    }else{
                      echo "Logistics Planning - EXT- RBEI";
                    } ?>
                        </td>
                        <td><?php echo $data['email']; ?></td>
                        <?php 
                echo "<td>
                    <div class='btn-group'>
                        
                    
                        <a class='delete btn btn-outline-danger' href='?delete={$sno}'>Delete</a>
                    </div>
                </td>";
                ?>

                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </form>
    </div>
              </div>
    <footer class="navbar bg-light footer"><div class="container">© 2022 Robert Bosch GmbH</div></footer>
	<div id="imageContainer">
		<img style="width: 100%;height:15px;" src="images/BOSCH-SUPERGRAPHIC-4K-SVG.svg" alt="Bosch-Supergraphic">
	</div>
    <script src="js/jquery.datetimepicker.full.min.js"></script>


    <script>
    $("#dateAndTimePicker1").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });

    $("#dateAndTimePicker2").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });

    $("#dateAndTimePicker3").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });

    $("#dateAndTimePicker4").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });

    $("#dateAndTimePicker5").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });

    $("#dateAndTimePicker6").datetimepicker({
        format: 'd-m-Y H:i:i',
        formatTime: 'H:i:i',
        formatDate: 'd-m-Y',
        step: 30
    });
    </script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.tabledit.min.js"></script>
    <script type="text/javascript" src="js/exp_datatables.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({

            searching: true,
            select: true,
            responsive: true,

            dom: 'lBfrtip',
            buttons: [{
                extend: 'collection',
                text: 'DOWNLOAD',
                buttons: [{
                    extend: 'excel',
                    title: 'Logistic Data',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'Logistic Data',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'print',
                    title: 'Logistic Data',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }]
            }]

        });
    });
    </script>
    <link rel="stylesheet" href="css/chosen.min.css">
    <script src="js/chosen.jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".chosen-select").chosen();
      });
    </script>
    <script>
      $("#d_emp_id").chosen({width:"75%"});
      $("#e_emp_id").chosen({width:"75%"});
      $("#g_grp_id").chosen({width:"75%"});
    </script>
</body>
</html>