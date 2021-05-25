<html>

<head>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
            $("#btnsignup").click(function(ev) {
                if ($("#uid").val() == "" || $("#pwd").val() == "" || $("#mobile").val() == "" || $("#type").val() == "Select") {
                    alert("INVALID DATA");
                    return;
                }
                var querystring = $("#signupfrm").serialize();
                //                alert(querystring);
                var url = "signupprocess.php?" + querystring;
                //                alert(url);
                $.get(url, function(response) {

                    alert(response);



                });

            });
            $("#btnlogin").click(function() {
                var querystring = $("#loginfrm").serialize();
                //                 alert(querystring);
                var url = "loginprocess.php?" + querystring;
                //                 alert(url);
                $.get(url, function(responselog) {
                    //                     alert(responselog);
                    if (responselog == "Shelter") {
                        location.href = "shelter-profile.php";
                    } else if (responselog == "Doctor") {
                        location.href = "project-docprofile.php";
                    } else if (responselog == "Pharmacy") {
                        location.href = "proj-pharmacyprofile.php";
                    } else if (responselog == "Citizen") {
                        location.href = "citizen-dashboard.php";
                    } else {
                        alert(responselog);
                    }

                });
            });

            $("#btnforgotpwd").click(function() {
                var uidlog = $("#uidlog").val();
                //                alert(uidlog);
                var actionurl = "send-sms.php?uidlog=" + uidlog;
                //                alert(actionurl);
                $.get(actionurl, function(response) {
                    alert(response);
                    //
                    //                    if (response == "Message sent to your registered mobile number")
                    //
                    //                    {
                    //                        alert(response);
                    //                    } else
                    //
                    //                        alert("No such Id found.");



                });
            });

            $("#uid").blur(function() {
                var uidValue = $("#uid").val();


                var url = "signupajax.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    alert(response);

                });

            });
            $("#mobile").keyup(function() {
                //regEx: regular expression
                var exp = /^[6-9]{1}[0-9]{9}$/;
                var mobile = $(this).val();
                var resp = exp.test(mobile);
                if (resp == false)
                    $("#errMob").html("Invalid Mobile Number");
                else
                    $("#errMob").html("ok");
            });
            $("#pwd").keyup(function() {
                var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                var pwd = $(this).val();
                if (r.test(pwd) == false)
                    $("#errPwd").html("WEAK");
                else
                    $("#errPwd").html("STRONG");

            });
            $("#eye").mousedown(function() {
                $("#pwd").attr("type", "text");
                $("#eye").addClass("fa-eye-slash").removeClass("fa-eye");
            });
            $("#eye").mouseup(function() {
                $("#pwd").attr("type", "password");
                $("#eye").addClass("fa-eye").removeClass("fa-eye-slash");

            });
            $("#eye1").mousedown(function() {
                $("#pwdlog").attr("type", "text");
                $("#eye1").addClass("fa-eye-slash").removeClass("fa-eye");
            });
            $("#eye1").mouseup(function() {
                $("#pwdlog").attr("type", "password");
                $("#eye1").addClass("fa-eye").removeClass("fa-eye-slash");

            });




        });

    </script>

    <style>
        #icons {

            padding: 10px 0px 10px 0px;
        }

        i {
            transition: ease all 1s;

        }

        i:hover {
            transform: scale(1.25);
            transition: ease all 1s;
            cursor: pointer;
        }

    </style>

</head>

<body>
    <div style="background-color:#EDF5E1 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="pics/logo.png" width="50" height="40" class="d-inline-block align-top" alt="">&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <span style="color: black"> <a class="navbar-brand" href="#"><b>PetsCare.com</b></a></span>
            </div>

            <div class="dropdown-menu-right nav-item">
                <a class="nav-link btn btn-warning mr-2 mt-1 font-weight-bold " data-toggle="modal" data-target="#modalSignup" href="#">Signup</a>
                <form id="signupfrm">
                    <div class="modal" id=modalSignup tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header btn-warning">
                                    <h5 class="modal-title">SIGNUP</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="uid"><i class="fa fa-user" aria-hidden="true"></i>
                                            User id</label>
                                        <input type="text" class="form-control" id="uid" name="uid">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            Password
                                        </label><i id="eye" class="fa fa-eye" aria-hidden="true" style="float:right"></i>
                                        <input type="password" required class="form-control" id="pwd" name="pwd">
                                        <span id="errPwd">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile"><i class="fa fa-address-book" aria-hidden="true"></i>

                                            Mobile No</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                                        <span id="errMob">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="type"><i class="fa fa-sort-desc" aria-hidden="true"></i>
                                            Category:</label>
                                        <select class="form-control" id="type" name="type">
                                            <option>Select</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Shelter">Shelter</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Citizen">Citizen</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="SIGNUP" id="btnsignup">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="dropdown-menu-right nav-item">
                <a class="nav-link btn btn-warning mr-2 mt-1 font-weight-bold " data-toggle="modal" data-target="#modallogin" href="#">Login</a>
                <form id="loginfrm">
                    <div class="modal" id=modallogin tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header btn-warning">
                                    <h5 class="modal-title">LOGIN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="uid"><i class="fa fa-user" aria-hidden="true"></i> User id</label>
                                        <input type="text" required class="form-control" id="uidlog" name="uidlog">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwdlog"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Password</label>
                                        <i id="eye1" class="fa fa-eye" aria-hidden="true" style="float:right"></i>
                                        <input type="password" required class="form-control" id="pwdlog" name="pwdlog">
                                        <a href="#" id="btnforgotpwd" class="float-right"> Forgot Password?</a>
                                        <br>
                                    </div>

                                    <div class="modal-footer">

                                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="LOGIN" id="btnlogin">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </nav>




        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pics/carausal.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pics/carausal%202.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pics/carausl%203.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br><br>

        <center>
            <div class=" h3 btn-danger"> OUR SERVICES</div>
        </center><br>

        <div class="container mt-4 ">
            <div class="row row-cols-1 row-cols-md-4">
                <div class="col mb-3">
                    <div class="card">
                        <img src="pics/veterinary%20doctor.jpg" class=" card-img-top" alt="..." height="200">
                        <div class="card-body">
                            <center>
                                <h5>DOCTOR</h5>
                            </center>
                            <p class="card-text"> <b>Problem finding a Doctor?</b><br>We are here to provide you Details of your nearby veterinary doctors registered with us. </p>
                        </div>
                    </div>
                </div>

                <div class="col mb-4">

                    <div class="card">
                        <img src="pics/pharmacy%20veternary.jpg" class="card-img-top " alt="..." height="200">
                        <div class="card-body">
                            <center>
                                <h5>PHARMACY</h5>
                            </center>
                            <p class="card-text"><b>Find your nearby Pharmacy</b><br>Get in touch with your nearby Pharmacist selling wellness products at affordable prices for your loving pets.</p>
                        </div>
                    </div>

                </div>
                <div class="col mb-4">

                    <div class="card ">
                        <img src="pics/shelter%20veternary.jpg" class="card-img-top" alt="..." height="200">
                        <div class="card-body">
                            <center>
                                <h5>SHELTER PROVIDER</h5>
                            </center>
                            <p class="card-text"><b>Search shelter for your pet</b><br>Want to go out for a vacation, but worried for your pet. Choose a suitable Shelter home for your pet.</p>
                        </div>
                    </div>

                </div>
                <div class="col mb-4">

                    <div class="card ">
                        <img src="pics/sell%20buy%20pet.jpg" class="card-img-top" alt="..." height="200">
                        <div class="card-body">
                            <center>
                                <h5>BUY OR SELL PET</h5>
                            </center>
                            <p class="card-text"><b>Want to buy a Pet.</b><br>Bring home a bundle of joy and happiness in form of a pet. You can also sell your pet here.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div><br>
        <center>
            <div class=" h3 btn-danger"> MEET THE DEVELOPERS</div>
        </center><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <div class="h3 btn-secondary">UNDER GUIDANCE OF</div>
                    </center>
                    <div class=" btn-light btn  "><img src="pics/rajesh%20sir.jpg" width="210" height="210">
                        <div class=" col-md-7 font-weight-bold float-right">
                            <center><u>
                                    <h5>Rajesh Bansal</h5>
                                </u></center>
                            A brilliant coder with
                            19 Years of experience in Training & Development. Founder of realJavaOnline.com and also the author of book "Real Java".
                            <br> Contact info:<br>
                            Email : bcebti@gmail.com<br>
                            Contact : +91 98722-46056
                            <br><br>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 float-right">
                    <center>
                        <div class=" h3 btn-secondary "> DEVELOPED BY</div>
                    </center>
                    <div class="btn-light btn  "><img src="pics/developer.jpg" width="210" height="210">
                        <div class=" col-md-7 font-weight-bold float-right">
                            <center><u>
                                    <h5>Anurag</h5>
                                </u></center>
                            A second year student currently pursuing Bachelor of Technology in computer science at SRM Institute of Science and Technology, <br>Delhi-NCR.<br>
                            Contact info:<br>
                            Email:anuragarora5433@gmail.com<br>
                            Contact :+91 62841-66004<br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <center>
            <div class=" h3 btn-danger"> REACH US</div>
        </center><br>

        <div class="container">
            <div class="row">

                <iframe width="100%" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8805713513743!2d74.95013941459771!3d30.211955917595883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594710682525!5m2!1sen!2sin" width="350" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div><br><br>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <span> <a class="navbar-brand" href="#"><b>Copyright 1999-2020 by Refsnes Data. All Rights Reserved.</b></a></span>
            </div>
            <div class="dropdown-menu-right nav-item">
                <div id="icons">
                    <a href="mailto:anuragarora5433@gmail.com"> <i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.quora.com/profile/Anurag-Arora-123"><i class="fa fa-quora fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/___.anurag.__/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/anurag.arora.9275/"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.linkedin.com/in/anurag-arora-7a55b71a3/"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/Anurag85974868"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>

                </div>
            </div>
        </nav>


    </div>
</body>

</html>
