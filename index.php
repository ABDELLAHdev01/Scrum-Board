<?php
include('scripts.php');

?>





<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ICON -->
	<link rel="icon" href="/assets/img/ic.png" type="image/icon type">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- ================== END core-css ================== -->
</head>
<body>
	<div id="preloader"></div>
	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="d-flex justify-content-between">
				<div class="row breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
							<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
						  </svg> </a></li>
						<li class="breadcrumb-item active" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-all" viewBox="0 0 16 16">
							<path d="M0 0h16v16H0V0zm1 1v6.5h6.5V1H1zm7.5 0v6.5H15V1H8.5zM15 8.5H8.5V15H15V8.5zM7.5 15V8.5H1V15h6.5z"/>
						  </svg></li>
					</ol>
					<!-- BEGIN page-header -->
					
					<!-- END page-header -->
				</div>
				
				<div class="" >
					<span id="deleteall"></span>
					<button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show()" >Add Task<i class="bi bi-plus-lg"></i></a></button>
				</div>
				
			</div>
			<div class="text-center text-lg-start">
			<h1 class="page-header fw-bold " id="Sb">
				Scrum Board 
			</h1>
			<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-green alert-dismissible fade show">
				<strong>Success!</strong>
					<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
		</div>
			<div class="row justify-content-around	" id="testing">
				<div class="col-sm-12 col-md-6 col-lg-4" style="width: 355px;">
					<div class="mb-5" style="height: 100%;">
						<div class="p-2 border bg-secondary rounded-top">
							<h4 class="text-white">To do (<span id="to-do-tasks-count">0</span>)</h4>

						</div>
						<div class="" id="to-do-tasks">
						<?php
						getTasks(1);
						?>
						<!-- FILED BY JS -->
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4" style="width: 355px;">
					<div class="mb-5" style="height: 100%;">
						<div class="p-2 border bg-secondary rounded-top">
							<h4 class="text-white">In Progress (<span id="in-progress-tasks-count">0</span>)</h4>

						</div>
						<div class="" id="in-progress-tasks">
							<?php
						     getTasks(2);
							 ?>
							<!-- FILED BY JS -->
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4" style="width: 355px;">
					<div class=""style="height: 100%;">
						<div class="p-2 border bg-secondary rounded-top">
							<h4 class="text-white ">Done (<span id="done-tasks-count">0</span>)</h4>

						</div>
						<div class=" " id="done-tasks">
						    <?php
						     getTasks(3);
							 ?>
							<!-- FILED BY JS -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->
		
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- TASK MODAL -->
	<!-- <div class="modal fade" id="modal-task"> -->
		
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog jus form">
			  <div class="modal-content"  style="background-color: #CAEBF2;">
				<div class="modal-header"   style="background-color: #6C757D;">
				  <h1 class="modal-title fs-4 text-white offset-5 editText" id="exampleModalLabel">Add task</h1>
				  
				<button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<form method="POST" name="save" action="scripts.php">
						<br>
						<!-- title -->
						<div>
							<label class="form-label" for="title">Title</label>
							<input name="title" type="text" class="form-control" id="title">
						</div>
							<!-- Type -->
						<br>
						<div>
						<label class="form-label" for="type" name="type">Type</label>
							</div>										
							<div class="m-2">
							<input class="form-check-input " type="radio" value="1" id="Feature" name="type" checked>
						<label for="feature">Feature</label>
					
						<input class="form-check-input" type="radio" value="2" id="Bug" name="type"  >
						<label for="bug">Bug</label>
						
						</div>
						<br>					
						<!-- prioritys -->
							<div class="form-group">
							<label for="Priorityselect">Priority</label>
							<select name="priority" class="form-select" id="priority">
								<option selected disabled value="">Pleas Select</option>
							  <option value="3">Low</option>
							  <option value="2">Medium </option>
							  <option value="1">High</option>						
							</select>
						  </div>
						  <br>
						  <!-- Status -->
						  <div class="form-group">
							<label for="Statusselect">status</label>
							<select name="status" class="form-select" id="status">
								<option selected disabled value="">Pleas Select</option>
							  <option value="1">To Do</option>
							  <option value="2">In Progress</option>
							  <option value="3">Done</option>
							</select>
						  </div>  
						  <br>
						  <!-- date -->
						  <label for="date">Date</label>
						  <input name="date" type="date" id="date" class="form-control">
							<br>
						  <!-- textdescription -->

						  <div class="form-group">
							<label for="descriptionlb">Description</label>
							<textarea name="description" class="form-control" id="description" rows="3"></textarea>
						  </div>					
					  
					</div>
				<div class="modal-footer">
				  <button  class="btn btn-danger" data-bs-dismiss="modal" >Close</button>
				  <button  id="btn-edit" type="submit" class="btn btn-success" name="save" data-bs-dismiss="modal">Save</button>
				  <button style="display:none" id="update"  type="submit"  name="update" class="btn btn-warning"  data-bs-dismiss="modal"  >update</button>
				
			</div>
			</form>
			  </div>
			</div>
		  </div>
		  
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/vendor.min.js"></script>
    <script src="main.js" ></script>
	<!-- ================== END core-js ================== -->

	
</body>
</html>