<?php
session_start();
if(isset($_SESSION["active_user"])==false)
{
    header("location:index.php");
}
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </script>
    <script>
        $(document).ready(function() {
            $("#btnpost").click(function() {
                if ($("#uid").val() == "" || $("#name").val() == "" || $("#mobile").val() == "" || $("#pet").val() == "Select" || $("#address").val() == "") {
                    alert("INVALID DATA");
                    return;
                }
                var querystring = $("#selpetfrm").serialize();
                //                                alert(querystring);
                var url = "citizenprocess.php?" + querystring;
                //                alert(url);
                $.get(url, function(response) {

                    alert(response);



                });

            });
        });

    </script>
</head>

<body>
      <div style="background-color:#EDF5E1 ">
      <nav class="navbar navbar-expand-md bg-light" >

          <h4> <label><b><?php echo $_SESSION['active_user']?></b></label></h4>
          <label style="position: absolute; left: 50%; transform: translatex(-50%);">
                <h3><i class="fa fa-bars" aria-hidden="true" style="color:black;"> DashBoard</i></h3>
            </label>

           <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a type="button" class="nav-link btn btn-warning" href="project-logout.php" style="color:white;">
                         Logout
                    </a>
                </li>
            </ul>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="card col-md-3 mt-5" style="margin: 0 auto; float: none; margin-bottom: 10px; box-shadow: 0px 0px 10px 5px #fefe80 ;">
                <img class=" card-img-top" src="pics/doctor.jpg" height="200" width="250">
                <div class="card-body  text-md-center">
                    <a href="angular-fetch-doc.php" class="btn btn-link btn-warning"> Find Doctor</a>
                </div>
            </div>
            <div class="card col-md-3 mt-5" style="margin: 0 auto; float: none; margin-bottom: 10px; box-shadow: 0px 0px 10px 5px #fefe80 ;">
                <img class="card-img-top" src="pics/pharmacy.jpg" height="200" width="250">


                <div class="card-body  text-md-center">
                    <a href="angular-fetch-pharmacy.php" class="btn btn-link btn-warning"> Find Pharmacy</a>
                </div>
            </div>
           <div class="card col-md-3 mt-5" style="margin: 0 auto; float: none; margin-bottom: 10px; box-shadow: 0px 0px 10px 5px #fefe80 ;">
                <img class="card-img-top" src="pics/sellpet.jpg" height="200" width="250">
                <div class="card-body text-md-center">
                    <a href="#" class="btn btn-link btn-warning" data-toggle="modal" data-target="#modalSelpet"> Sell Pets</a>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row ">
                 <div class="card col-md-3 mt-5" style="margin: 0 auto; float: none; margin-bottom: 10px; box-shadow: 0px 0px 10px 5px   #fefe80  ;">
                    <img class="card-img-top" src="pics/shelter%20provider.jpg" height="200" width="250">
                    <div class="card-body text-md-center">
                        <a href="angular-fetch-shelter.php" class="btn btn-link btn-warning"> Shelter Provider</a>
                    </div>
                </div>

            
                 <div class="card col-md-3 mt-5" style="margin: 0 auto; float: none; margin-bottom: 10px; box-shadow: 0px 0px 10px 5px #fefe80 ;">
                    <img class="card-img-top" src="pics/buy%20pets.jpg" height="200" width="250">
                    <div class="card-body  text-md-center">
                        <a href="angular-fetch-citizen.php" class="btn btn-link btn-warning"> Buy Pets</a>
                    </div>
                </div>
            </div>
    </div>


    <!--    modal-->


    <form id="selpetfrm">
        <div class="modal" id=modalSelpet tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header btn-warning">
                        <h5 class="modal-title">Sell Pets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="uid">
                                User id</label>
                            <input type="text" class="form-control" id="uid" name="uid">
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Person Name
                            </label>
                            <input type="name" required class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="mobile">
                                Mobile No</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-group ">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="pet">Select Pets</label>
                            <select class="form-control" id="pet" name="pet">
                                <option>SELECT</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Cow">Cow</option>
                                <option value="Fish">Fish</option>
                                <option value="Birds">Birds</option>
                                <option value="Monkey">Monkey</option>
                                <option value="Buffalo">Buffalo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="info">Other Information:</label>
                            <textarea rows="5" cols="156" maxlength="1000" class="form-control" id="info" name="info"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="POSTADD" id="btnpost">
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>

</html>
