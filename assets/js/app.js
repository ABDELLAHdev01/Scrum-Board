const toDoTask = document.getElementById('to-do-tasks');
const inProgress = document.getElementById('in-progress-tasks');
const done = document.getElementById('done-tasks');
let upd=document.getElementById("btn-edit");
let update=document.getElementById("update");
        const    taskTitle         = document.getElementById('title');
        const      taskType          = document.getElementsByName('type');
        const    taskPriority      = document.getElementById('priority');
        const    taskStatus        = document.getElementById('status');
        const    taskDate          = document.getElementById('date');
        const    taskDescription   = document.getElementById('description');
        

let Feature=document.getElementById("Feature");
let Bug=document.getElementById("Bug");

function addTask(){
    let task = {
        'title'         :   taskTitle.value,
        'type'          :   '',        
        'priority'      :   taskPriority.value,
        'status'        :   taskStatus.value,
        'date'          :   taskDate.value,
        'description'   :   taskDescription.value,
        'id'            :   tasks.length,
    } 
    if(Feature.checked==true){
        task.type="Feature";
    }else{
        task.type="Bug";
    }

    tasks.push(task);
     
    //deleting
    taskTitle.value = "";
    taskType.value = "";
    taskPriority.value = "";
    taskStatus.value = "";
    taskDate.value = "";
    taskDescription.value= "";

    toDoTask.innerHTML="";
    inProgress.innerHTML="";
    done.innerHTML="";

//


    
    Swal.fire(
        'Good job!',
        'You have add the task',
        'success'
      ) 
      aficheData()
        
}
// function getRadio(){
//     let checkRadio;
//     console.log(taskType)
//     for(let i=0 ; i<taskType.length ;i++){
//         if(taskType[i].checked){
//             checkRadio=taskType[i].value;
//         }
//     }
   
//     return checkRadio;

// }
//
function aficheData(){
const toDoTask = document.getElementById('to-do-tasks');
const inProgress = document.getElementById('in-progress-tasks');
const done = document.getElementById('done-tasks');


document.getElementById('to-do-tasks-count').innerHTML=0;
document.getElementById('done-tasks-count').innerHTML=0;
document.getElementById('in-progress-tasks-count').innerHTML=0;
    toDoTask.innerHTML="";
    inProgress.innerHTML="";
    done.innerHTML="";
for(let i = 0; i < tasks.length; i++){
    
    if(tasks[i].status === 'To Do'){
        document.getElementById('to-do-tasks-count').innerHTML++;
       
        toDoTask.innerHTML+=`<button    class="hc p-2 d-flex text-start w-100 border taskt" >
        <div class="col-md-1">
            <i class=" bi bi-question-circle"></i>
        </div>
        <div  id="EditCont"> 
            <div class="ContEdit">
            <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="editTask(${i})"></i>
            <span>
            <i class="bi bi-trash3 fs-3" onclick="DeleteOneElement(${i})"></i>
            </div>
        </div>
        <div class="col-md-11">
            <div class="fw-bold">${tasks[i].title}</div>
            <div class="">
                <div class="text-muted">#${i+1} created in ${tasks[i].date}</div>
                <div class="fw-normal" title="${tasks[i].description}">${tasks[i].description.substring(0, 50)} ...</div>
            </div>
            <div class="">
                <span class="btn btn-info rounded-pill p-0 col-md-2">${tasks[i].priority}</span>
                <span class="btn btn-secondary rounded-pill p-0 col-md-2">${tasks[i].type}</span>
            
            </div>
        
        </div>
    </button>`
    }
    if(tasks[i].status === 'In Progress'){
        document.getElementById('in-progress-tasks-count').innerHTML++;

        inProgress.innerHTML+=`<button  class="hc p-2 d-flex text-start w-100 border taskt" >
        <div class="col-md-1">
            <i class=" bi bi-question-circle"></i>
        </div>
        <div id="EditCont"> 
            <div class="ContEdit">
            <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="editTask(${i})"></i>
            <span>
            <i class="bi bi-trash3 fs-3" onclick="DeleteOneElement(${i})"></i>
            </div>
        </div>
        </div>
        <div class="col-md-11">
            <div class="fw-bold">${tasks[i].title}</div>
            <div class="">
                <div class="text-muted">#${i+1} created in ${tasks[i].date}</div>
                <div class="fw-normal" title="${tasks[i].description}">${tasks[i].description.substring(0, 50)} ...</div>
            </div>
            <div class="">
                <span class="btn btn-info rounded-pill p-0 col-md-2">${tasks[i].priority}</span>
                <span class="btn btn-secondary rounded-pill p-0 col-md-2">${tasks[i].type}</span>
            
            </div>
        
        </div>
    </button>`
    }
    if(tasks[i].status === 'Done'){
        document.getElementById('done-tasks-count').innerHTML++;
        done.innerHTML+=`<button  class="hc p-2 d-flex text-start w-100 border taskt" >
        <div class="col-md-1">
            <i class=" bi bi-question-circle"></i>
            <div  id="EditCont"> 
            <div class="ContEdit">
            <i  data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-pencil-square fs-3" onclick="editTask(${i});"></i>
            <span>
            <i class="bi bi-trash3 fs-3" onclick="DeleteOneElement(${i})"></i>
            </div>
        </div>
        </div>
        <div class="col-md-11">
            <div class="fw-bold">${tasks[i].title}</div>
            <div class="">
                <div class="text-muted">#${i+1} created in ${tasks[i].date}</div>
                <div class="fw-normal" title="${tasks[i].description}">${tasks[i].description.substring(0, 50)} ...</div>
            </div>
            <div class="">
                <span class="btn btn-info rounded-pill p-0 col-md-2">${tasks[i].priority}</span>
                <span class="btn btn-secondary rounded-pill p-0 col-md-2">${tasks[i].type}</span>
            
            </div>
        
        </div>
    </button>`
    }
   
};
}



aficheData();






function DeleteOneElement(index){
    tasks.splice(index,1);
    toDoTask.innerHTML="";
    inProgress.innerHTML="";
    done.innerHTML="";
    aficheData();
}





let button_clicked_index;
function editTask(i) {
    button_clicked_index = i;
    
    upd.style.display="none";
    update.style.display="block";

    taskTitle.value = tasks[i].title;
    taskPriority.value = tasks[i].priority;
    taskStatus.value = tasks[i].status;
    taskDate.value = tasks[i].date;
    taskDescription.value= tasks[i].description;
    if(tasks[i].type=="Feature"){
    Feature.checked=true;
    }else{
        Bug.checked=true;
    }




	
}

function Update(){
    
    let index = button_clicked_index;
    


    tasks[index].title =  taskTitle.value;
    tasks[index].priority =  taskPriority.value;
    tasks[index].status =  taskStatus.value;
    tasks[index].date =  taskDate.value;
    tasks[index].description =  taskDescription.value;

    if(Feature.checked){
        tasks[index].type = "Feature";}
    else{ tasks[index].type = "Bug";
    
    
}

Swal.fire(
    'Task Updated!',
    'sucessfully!',
    'success'
  )
    aficheData();
    
}

function resteData(){
    document.getElementById('formtasks').reset()
    upd.style.display="block";
    update.style.display="none";
    
}

