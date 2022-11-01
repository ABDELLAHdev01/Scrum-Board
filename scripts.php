<?php


    //INCLUDE DATABASE FILE
    include('connect.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
     session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_GET['deleteid']))      deleteTask();
    

    function getTasks($para)
    {
        // id did make $con global
    $con = $GLOBALS['con'];
   
      
    if($para==1){
       

        
        $sql ="SELECT * FROM tasks JOIN types ON tasks.type_id=types.id JOIN priorities ON tasks.priority_id =priorities.id WHERE status_id=1";
        $result = mysqli_query($con,$sql);
        while($row = $result->fetch_assoc()){
            $id = $row['taskid'];
            $title = $row['title'];
            $type = $row['type_id'];
            $priority = $row['priority_id'];
            $status = $row['status_id'];
            $time = $row['task_datetime'];
            $description = $row['description']; 
            $nameType=$row['nametype'];
            $prio=$row['namepriority'];
            echo "<script> document.getElementById('to-do-tasks-count').innerHTML++; </script>";
            echo ('
            
            <button    class="hc p-2 d-flex text-start w-100 border taskt" >
            <div class="col-md-1">
                <i class=" bi bi-question-circle"></i>
            </div>
            <div  id="EditCont"> 
                <div class="ContEdit">
                <a href="update.php?updateid='.$id.'" class="link-dark"><i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="hide()" ></i>
                <span>
              <a  href="scripts.php?deleteid='.$id.'" class="link-dark">  <i class="bi bi-trash3 fs-3"> </i> </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="fw-bold">'.$title.'</div>
                <div class="">
                    <div class="text-muted">#'.$id.' created in '.$time.'</div>
                    <div class="fw-normal" title="'.$description.'" >'.substr($description , 0 ,80).'...</div>
                </div>
                <div class="">
                    <span class="btn btn-info rounded-pill p-0 col-md-2">'.$prio.'</span>
                    <span class="btn btn-secondary rounded-pill p-0 col-md-2">'.$nameType.'</span>
                
                </div>
            
            </div>
        </button> '
    );
        
        
            
            
        }
    }if($para==2){
        $sql ="SELECT * FROM tasks tasks JOIN types ON tasks.type_id=types.id JOIN priorities ON tasks.priority_id =priorities.id WHERE status_id=2";
        $result = mysqli_query($con,$sql);
        while($row = $result->fetch_assoc()){
            // puting the datas on variables i just like to do that heheheh ^^
            $id = $row['taskid'];
            $title = $row['title'];
            $type = $row['type_id'];
            $priority = $row['priority_id'];
            $status = $row['status_id'];
            $time = $row['task_datetime'];
            $description = $row['description']; 
            $nameType=$row['nametype'];
            $prio=$row['namepriority'];
            echo "<script> document.getElementById('in-progress-tasks-count').innerHTML++; </script>";
            // printing part ^^$
            echo ('
            
            <button    class="hc p-2 d-flex text-start w-100 border taskt" >
            <div class="col-md-1">
                <i class=" bi bi-question-circle"></i>
            </div>
            <div  id="EditCont"> 
                <div class="ContEdit">
                <a href="update.php?updateid='.$id.'" class="link-dark"><i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="hide()" ></i>
                <span>
                <a  href="index.php?deleteid='.$id.'" class="link-dark">  <i class="bi bi-trash3 fs-3"> </i> </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="fw-bold">'.$title.'</div>
                <div class="">
                    <div class="text-muted">#'.$id.' created in '.$time.'</div>
                    <div class="fw-normal" title="'.$description.'">'.substr($description , 0 ,80).'...</div>
                </div>
                <div class="">
                    <span class="btn btn-info rounded-pill p-0 col-md-2">'.$prio.'</span>
                    <span class="btn btn-secondary rounded-pill p-0 col-md-2">'.$nameType.'</span>
                
                </div>
            
            </div>
        </button> ');
            
            
            
        }
    } if($para==3){
        $sql ="SELECT * FROM tasks tasks JOIN types ON tasks.type_id=types.id JOIN priorities ON tasks.priority_id =priorities.id WHERE status_id=3";
        $result = mysqli_query($con,$sql);
        while($row = $result->fetch_assoc()){
            $id = $row['taskid'];
            $title = $row['title'];
            $type = $row['type_id'];
            $priority = $row['priority_id'];
            $status = $row['status_id'];
            $time = $row['task_datetime'];
            $description = $row['description']; 
            $nameType=$row['nametype'];
            $prio=$row['namepriority'];
            echo "<script> document.getElementById('done-tasks-count').innerHTML++; </script>";
            echo ('
            
            <button    class="hc p-2 d-flex text-start w-100 border taskt" >
            <div class="col-md-1">
                <i class=" bi bi-question-circle"></i>
            </div>
            <div  id="EditCont"> 
                <div class="ContEdit">
                <a href="update.php?updateid='.$id.'" class="link-dark"><i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="hide()" ></i>
                <span>
                <a  href="index.php?deleteid='.$id.'" class="link-dark" >  <i class="bi bi-trash3 fs-3"> </i> </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="fw-bold">'.$title.'</div>
                <div class="">
                    <div class="text-muted">#'.$id.' created in '.$time.'</div>
                    <div class="fw-normal" title="'.$description.'" >'.substr($description , 0 ,80).'...</div>
                </div>
                <div class="">
                    <span class="btn btn-info rounded-pill p-0 col-md-2">'.$prio.'</span>
                    <span class="btn btn-secondary rounded-pill p-0 col-md-2">'.$nameType.'</span>
                
                </div>
            
            </div>
        </button> ');
            
        }
    }



        
    }


    function saveTask()
    {
            // id did make $con global
            $con = $GLOBALS['con'];

            // puting the form post to variables
            $title = $_POST['title'];
            $type = $_POST['type'];
            $priority = $_POST['priority'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            // sending variables into a requet sql
            $sql = "INSERT INTO `tasks`  VALUES (null,'$title','$type','$priority','$status','$date','$description')" ;
            $result = mysqli_query($con,$sql);
            // i use header location to get back to my index.php
            header('location: index.php');
            $_SESSION['message'] = "Task has been added successfully !";

           
    }   

    function updateTask()
    {

            $con = $GLOBALS['con'];
            $id = $_GET['updateid'];
            // puting the form post to variables
            $title = $_POST['title'];
            $type = $_POST['type'];
            $priority = $_POST['priority'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $description = $_POST['description'];

          $sql = "UPDATE `tasks` SET `title`='$title' ,`type_id`='$type',`priority_id`='$priority',`status_id`='$status',`task_datetime`='$date',`description`='$description' WHERE taskid=$id;";
          $result = mysqli_query($con,$sql);

        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        
        $con = $GLOBALS['con'];

        
       
            $id = $_GET['deleteid'];
            $sql = "DELETE FROM `tasks` WHERE taskid=$id";
            $result = mysqli_query($con,$sql);
            header('location: index.php');
        
        
        
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		// header('location: index.php');
    }
    
?>

