<!DOCTYPE html>
<head>
<title>Bethel Properties</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .mb-3{
        margin-left: -30%;
    }
       .text-mute.mb-0{
        /* color:#99661a; */
        color:#DD9936;
    }
    .sidebar-wrapper.drop{
        background:none;
        margin-left:-1%;
    }
    .sidebar-link.drop{
        width:5%;
        
    }
    
    
    .submenu.drop{
        margin-left:-9.1%;
        width:100%;
        font-size:15%;
        /* background:white; */
        
    }
    body{
        /* background-color: #f2f7ff; */
        /* background-color:#fff2e6; */
        /* background-color:#ffebcc; */
        /* background-color:#FFF9F4; */
        background-color: white;
    } 
    .ms-3.name h5{
        /* color:#99661a; */
        color:#DD9936;
    }
  
    .name.ms-4 p{
        color:#DD9936;
    }
    .house{
        /* text-align: center; */
        margin-top: 12%;
        margin-left:20%;
        
    }
    .house h1{
        color:#DD9936;
        font-size:40pt;
    }
    .header{
        float: left;
        margin-left:-20%;
    }
    header{
        float:right;
    }
    .hlink{
       margin-top:1%;
       margin-left:-16%;
       
    }
    .bi {
        height: 7rem;
        width: 7rem;
        margin-left:9%;
        margin-top:5%;
        }
    /* .htex{
        font-size:20pt;
        margin-left:-41%;  
    }

    .htex span{
        margin-left:13%;
    } */
.col-md-3{
    margin-top:2%;
    
}
.col-md-3 p{
    font-size:20pt;
    margin-left:6%;
    
    
}

.card.ver{
    width:60%;
    margin-top:5%;
    height:90%;
    border:1px solid #DD9933;
    
}

.card-header{
    background-color:#DD9933;
    
}
.card-title{
    color:white;
}
.card-body{
   margin-left:15%;
   margin-top:3%;
}

section{
    margin-left:15%;
}

.form input{
    width:160%;
    
   
}


.form textarea{
    width:160%;
    
   
}
.form label{
    margin-top:8%;
}

.form button{
    width:100%;
    background-color:#DD9933;
    border:1px solid #DD9933;
    margin-top:10%;
    margin-left:20%;
}
/* .drop{
        margin-left:5%;
    }
    .bi {
        height: 2rem;
        width: 2rem;
        
        }
    .avatar.avatar-xl{
        margin-left:5%;
    } */
    </style>
<?php 
// require ('Models/users.php');
require ('includes/load.php');
// require ('Models/task.php');
// require ('Models/Property.php');
// require('Models/tenants.php');

$database = new Database();
$db =$database->connect();

$user = new users($db);
$tasks = new task($db);
$prop = new property($db);
$tenant = new tenants($db);

?>
</head>
<body>
    
    <div id="main">
        <div class="header">
            <img src="images/logo.png" alt="">
        </div>
     


        <div class="house">
            <h1>CLIENT COMPLAINTS
            </h1>
        </div>

        
                    

        <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card ver">
                                <div class="card-header">
                                    <h4 class="card-title">Complaint Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" id="s1" method="POST">
 
                                        <div id='getId' hidden><?php echo $_GET['id']?></div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <?php 
                                                    $r = $tenant->getco();
                                                    if($r->rowCount()>0){
                                                    $ro =$r->fetch(PDO::FETCH_ASSOC);
                                                       
                                                    ?>
                                                    <div class="form-group">
                                                 
                                                        <label for="first-name-column">Tenant Shop</label>
                                                        <input type="text" id="tenant" class="form-control" value="<?php echo $ro['Name_of_the_shop'];?>" name="lname-column" disabled/>
                                                        
                                                    </div>

                                                 
                                                    <div class ="error" id="rerror"></div>

                                                    <div class="column">
                                                    <div class="form-group">
                                                 
                                                        <label for="first-name-column">Landlord Shop</label>
                                                        <input type="text" id="shop" class="form-control"
                                                            name="lname-column" value ="<?php echo $ro['property_name']?>" disabled />
                                                        
                                                    </div>

                                                 
                                                    <div class ="error" id="rerror"></div>
                                                   
                                                </div>
                                                <div class="column">
                                                    <div class="form-group">
                                                 
                                                        <label for="first-name-column">Complaint</label>
                                                        <textarea class="form-control" placeholder="Leave a complaint here"  id="complaint" rows="9" ></textarea>
                                                        
                                                    </div>

                                                 
                                                    <div class ="error" id="rerror"></div>
                                                   
                                                </div>
                                               
                                              
                                                
                                            
                                            <div class="column" style ="margin-left:40%; margin-top:5%">
                                                    <button type="button" onclick="return add(event)" id="<?php echo $ro['property_id']?>" class="btn btn-primary me-1 mb-1" form="s1">Send</button>
                                                    <!-- in the backend get the date before inserting it into the database -->
                                                  
                                                </div>
                                                <?php }
                                                    
                                                    ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
        
       

                <!-- <div class="hlink">
                        <div class="row">
                   
                    $a = $prop->pp();
                    if($a->rowCount()>0){
                    while($r =$a->fetch(PDO::FETCH_ASSOC)){    
                    
                  
                         code to manipulate with  database start
    
                                <div class="col-md-3">
                                <a href="redirect.php?id= echo $r['property_id']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#744B0E" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                                    <span style="color:#744B0E;"><p>echo $r['property_name']?></p></span>
                                    </a>
                                </div>
                              
                             
                    }
                }
                ?>
                                
                        
                        
                        </div>
                
                </div> -->
              
        
                </div>
       
    </div> 


    <script>
    
    function add(e){
       var id = e.target.id;
       const ten = document.getElementById('getId').innerHTML;
       const feed = document.getElementById('complaint').value;
       var status=true;

       if(feed ==""){
    document.getElementById('complaint').style.border ="2px solid red";
     status=false;
     printError("Terror","please enter a complaint");
   }
   else{
     document.getElementById('complaint').style.border ="2px solid green";
   }

   if(status==true){
    var serverCall = new XMLHttpRequest();
       serverCall.open('POST','api/addfeedback.php',true);
       serverCall.onreadystatechange =function(){
           if(this.readyState==4 && this.status==200){
            console.log(this.responseText)
           if(this.responseText ==0){
            Swal.fire({
            title:'unable to add complaint',
            text:'The complaint could not be added',
            icon:'error',
            confirmButtonText:'OK'
          })  
               }
               else{
                Swal.fire({
            title:'Complaint Added',
            text:'The complaint has been added. Thank you',
            icon:'success',
            confirmButtonText:'OK'
          }).then((result) => {
            if(result.isConfirmed){
              window.location='complaint_h.php'
            }
          }); 
            
               }
           }
       };
       var data ={
           'tena':ten,
           'shop':id,
           'message':feed
       };
       serverCall.send(JSON.stringify(data));
    }
}
    </script>
</body>
</html>