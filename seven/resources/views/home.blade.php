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

</body>
</html>