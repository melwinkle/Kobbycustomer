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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
    .mb-3{
        margin-left: -30%;
    }
        .text-mute.mb-0 {
            /* color:#99661a; */
            color: #DD9936;
        }

        .sidebar-wrapper.drop {
            background: none;
            margin-left: -1%;
        }

        .sidebar-link.drop {
            width: 5%;

        }


        .submenu.drop {
            margin-left: -9.1%;
            width: 100%;
            font-size: 15%;
            /* background:white; */

        }

        body {
            /* background-color: #f2f7ff; */
            /* background-color:#fff2e6; */
            /* background-color:#ffebcc; */
            /* background-color:#FFF9F4; */
            background-color: white;
        }

        .ms-3.name h5 {
            /* color:#99661a; */
            color: #DD9936;
        }

        .name.ms-4 p {
            color: #DD9936;
        }

        .house {
            /* text-align: center; */
            margin-top: 12%;
            margin-left: 25%;

        }

        .house h1 {
            color: #DD9936;
            font-size: 40pt;
        }

        .header {
            float: left;
            margin-left: -20%;
        }

        header {
            float: right;
        }

        .hlink {
            margin-top: 1%;
            margin-left: -16%;

        }

        .bi {
            height: 7rem;
            width: 7rem;
            margin-left: 9%;
            margin-top: 5%;
        }

        /* .htex{
        font-size:20pt;
        margin-left:-41%;  
    }

    .htex span{
        margin-left:13%;
    } */
        .col-md-3 {
            margin-top: 2%;

        }

        .col-md-3 p {
            font-size: 20pt;
            margin-left: 6%;


        }

        .card.ver {
            width: 60%;
            margin-top: 5%;
            height: 100%;
            border: 1px solid #DD9933;

        }

        .card-header {
            background-color: #DD9933;

        }

        .card-title {
            color: white;
        }

        .card-body {
            margin-left: 10%;
            margin-top: 3%;
        }

        section {
            margin-left: 15%;
        }

        .form select {
            width: 90%;

        }
        .form input{
            width: 90%;
        }

        .form input {
            width: 90%;


        }

        .form label {
            margin-top: 8%;
        }

        .form button {
            width: 40%;
            background-color: #DD9933;
            border: 1px solid #DD9933;
            margin-top: 10%;
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
    require('includes/load.php');

    $database = new Database();
    $db = $database->connect();

    $user = new users($db);
    $tasks = new task($db);
    $prop = new property($db);
    // $tenant = new tenants($db);



    // $tt = $tenant->getTenantsShop();
    // $totaltenants = $tt->rowCount();

    // $dd = $user->duedate();
    // $duedaters = $dd->rowCount();


    // $tasking = $tasks->getAlltasks();
    // $totaltasks = $tasking->rowCount();
    ?>
</head>

<body>

    <div id="main">
        <div class="header">
            <img src="images/logo.png" alt="">
        </div>



        <div class="house">
            <h1>CLIENT COMPLAINT
            </h1>
        </div>




        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card ver">
                        <div class="card-header">
                            <h4 class="card-title">Verification Form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" id="s1" method="POST">

                                    <div class="error" id="rerror"></div>

                                    <div class="column">
                                        <div class="form-group">

                                            <label for="first-name-column">Landlord Shop</label>
<<<<<<< HEAD
                                            <select id="from" class="form-select">
=======
                                            <select id="from" class="form-select" onclick="displaydetails()" >
>>>>>>> 7da94580a0a6701650cee83ffcb78fd42248d7a0

                                                <option selected value="">Select a Landlord</option>
                                                <?php
                                                $a = $prop->pp();
                                                if ($a->rowCount() > 0) {
                                                    while ($r = $a->fetch(PDO::FETCH_ASSOC)) {

                                                ?>
                                                        <option value="<?php echo $r['property_id'] ?>"><?php echo $r['property_name'] ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                        </div>
                                        <option value="">No Tenant available</option>

                                    <?php      } ?>
                                    </select>

                                    </div>


                                    <div class="error" id="rerror"></div>

                            </div>


                            <div class="row">
                                <div class="column">
                                    <div class="form-group">
                                        <label for="first-name-column">Tenant Shop</label>
<<<<<<< HEAD
                                        <input type="text" id="shop" class="form-control"  name="tenant">
=======
                                        <input type="text" id="shop" class="form-control"
                                                            placeholder="<?php echo 'Shop Name';?>" name="tenant">
                                        <!-- <select id="to" class="form-select">
                                          
                                        </select> -->
>>>>>>> 7da94580a0a6701650cee83ffcb78fd42248d7a0

                                    </div>
                                    <div class="error" id="Terror"></div>






                                    <div class="column" style="margin-left:25%; margin-top:5%">
                                        <button type="button" onclick="return verify()" class="btn btn-primary me-1 mb-1" form="s1">Verify</button>

                                    </div>
                                    <!-- verify and pick the client name and building location to the comlaint_m.php page -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>

    </div>

    </div>


    <!-- <script>
        function add() {
            window.location = "complaint_m.php";
        }
    </script> -->

    <script>
<<<<<<< HEAD
        
function verify(){
    const tenant = document.getElementById('shop').value;
    const land = document.getElementById('from').value;
    var status = true;

    if (tenant ==""){
     document.getElementById('shop').style.border ="2px solid red";
     status=false;
     printError("Terror","please enter a valid username");
   }
   else{
     document.getElementById('shop').style.border ="2px solid green";
   }

   if (land ==""){
     document.getElementById('from').style.border ="2px solid red";
     status=false;
     printError("rerror","please enter a valid username");
   }
   else{
     document.getElementById('from').style.border ="2px solid green";
   }
   if(status == true){
       var serverCall = new XMLHttpRequest();
       serverCall.open('POST','api/verifytenant.php',true);
       serverCall.onreadystatechange =function(){
           if(this.readyState==4 && this.status==200){
            console.log(this.responseText)
           if(this.responseText ==0){
            Swal.fire({
            title:'unable to verify account',
            text:'The user account could not be verified',
            icon:'error',
            confirmButtonText:'OK'
          })  
               }
               else{
                Swal.fire({
            title:'Verified',
            text:'The account exists',
            icon:'success',
            confirmButtonText:'OK'
          }).then((result) => {
            if(result.isConfirmed){
              window.location='complaint_m.php?id='+this.responseText;
            }
          }); 
            
               }
           }
       };
       var data ={
           'tena':tenant,
           'shop':land
       };
       serverCall.send(JSON.stringify(data));

   }
}
=======
        function displaydetails() {
            var id = document.getElementById('from').value;
            var serverCall = new XMLHttpRequest();
            serverCall.open('POST', 'api/search.php', true);
            serverCall.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response) {
                        var myObj = JSON.parse(this.responseText);
                        var ele = document.getElementById('to');
                        for (var i = 0; i < myObj.data.length; i++) {
                            ele.innerHTML = ele.innerHTML +
                                '<option value="' + myObj.data[i]['id'] + '">' +
                                myObj.data[i]['shop'] + '</option>';
                        }
                    }
                }
            }
            var data = {
                'd': id
            }
            serverCall.send(JSON.stringify(data));
        }
// function display(){
//     var id = document.getElementById('from').value;
//     let dropdown = document.getElementById('to');
//     dropdown.length =0;
    
//     let defaultOption = document.createElement('option');
//     defaultOption.text ='Select Shop';

//     dropdown.add(defaultOption);
//     dropdown.selectedIndex =0;

//     var serverCall = new XMLHttpRequest();
//             serverCall.open('POST', 'api/search.php', true);
//             serverCall.onreadystatechange = function(){
//                 if (this.readyState == 4 && this.status == 200) {
//                     if (this.response) {
//                         var myObj = JSON.parse(this.responseText);
//                         console.log(myObj.data);
                      
//                        for(let i =0; i< myObj.data.length;i++){
//                           let option = document.createElement('option');
//                            option.value = myObj.data[i]['id'];
//                            option.text = myObj.data[i]['shop'];
//                        }
                     
//                     }
//                 }
//             }
//             var data = {
//                 'd': id
//             }
//             serverCall.send(JSON.stringify(data));
//         }

//         $(document).ready(function (){
//             var listItems ='<option selected="selected" value="0">-Select-</option>';
//             var serverCall = new XMLHttpRequest();
//             serverCall.open('POST', 'api/search.php', true);
//             serverCall.onreadystatechange = function(){
//                 if (this.readyState == 4 && this.status == 200) {
//                     if (this.response) {
//                         var myObj = JSON.parse(this.responseText);
//                         console.log(myObj.data);

//                         for(var i=0; i< myObj.data.length; i++){
//                             listItems+="<option value='" +myObj.data[i]['id'] + "'>" + myObj.data[i]['shop'] +"</option>";

//                         }
           
//         }
//     }
// }
//     $('#to').html(listItems);

// });

>>>>>>> 7da94580a0a6701650cee83ffcb78fd42248d7a0

    </script>
</body>

</html>