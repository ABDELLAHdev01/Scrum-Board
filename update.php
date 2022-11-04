<?php

include 'connect.php';
include 'scripts.php';

if(isset($_GET['updateid'])){
    $con = $GLOBALS['con'];

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `tasks` WHERE taskid=$id";
    $result = mysqli_query($con,$sql);
    $row = $result->fetch_assoc() ?>
            
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
	
	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			
				
            <div class="modal-dialog jus form">
            <div class="modal-content bluefade" >
				<div class="modal-header blackfade"  >
                <h1 class="modal-title fs-4 text-white offset-5 editText" id="exampleModalLabel">Add task</h1>
                
             <a href="index.php"> <button type="button"  class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> </a>
              </div>
              <div class="modal-body">

                  <form method="POST" action="">
                      <br>
                      <!-- title -->
                      <div>
                          <label class="form-label" for="title">Title</label>
                          <input name="title" type="text" class="form-control" id="title" value="<?php echo $row['title'] ?>">
                      </div>
                          <!-- Type -->
                      <br>
                      <div>
                      <label class="form-label" for="type" name="type">Type</label>
                          </div>										
                          <div class="m-2">
                                
                            <input class="form-check-input " type="radio" value="1" id="Feature" name="type" <?php if($row['type_id']==1){ echo "checked" ;} ?>>
                            <label for="feature">Feature</label>
                        
                            <input class="form-check-input" type="radio" value="2" id="Bug" name="type" <?php if($row['type_id']==2){ echo "checked" ;} ?>  >
                            <label for="bug">Bug</label>
                      
                      </div>
                      <br>					
                      <!-- prioritys -->
                          <div class="form-group">
                          <label for="Priorityselect">Priority</label>
                          <select name="priority" class="form-select" id="priority">
                              <option selected disabled value="">Pleas Select</option>
                            <option value="3" <?php if($row['priority_id']==3){ echo "selected" ;} ?>>Low</option>
                            <option value="2" <?php if($row['priority_id']==2){ echo "selected" ;} ?>>Medium </option>
                            <option value="1" <?php if($row['priority_id']==1){ echo "selected" ;} ?>>High</option>						
                          </select>
                        </div>
                        <br>
                        <!-- Status -->
                        <div class="form-group">
                          <label for="Statusselect">status</label>
                          <select name="status" class="form-select" id="status">
                              <option selected disabled value="">Pleas Select</option>
                            <option value="1" <?php if($row['status_id']==1){ echo "selected" ;} ?> >To Do</option>
                            <option value="2" <?php if($row['status_id']==2){ echo "selected" ;} ?>>In Progress</option>
                            <option value="3" <?php if($row['status_id']==3){ echo "selected" ;} ?>>Done</option>
                          </select>
                        </div>  
                        <br>
                        <!-- date -->
                        <label for="date">Date</label>
                        <input name="date" type="date" id="date" class="form-control" value="<?php echo $row['task_datetime'] ?>">
                          <br>
                        <!-- textdescription -->

                        <div class="form-group">
                          <label for="descriptionlb">Description</label>
                          <textarea value="" name="description" class="form-control" id="description" rows="3"><?php echo $row['description'] ?></textarea>
                        </div>					
                    
                  </div>
              <div class="modal-footer">
             
                <button  id="update"  type="submit"  name="update" class="btn btn-dark"  data-bs-dismiss="modal"  name="update" >update</button>
              
          </div>
          </form>
            </div>
          </div>
        </div>
        <div class="bg"></div>

<div class="star-field">
<div class="layer"></div>
<div class="layer"></div>
<div class="layer"></div>';
        <?php
    }
    
 ?>

