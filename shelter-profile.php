<?php
session_start();
if(isset($_SESSION["active_user"])==false)
{
    header("location:index.php");
}
?>

<html>

<head>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    
     function showpreview(file, prev1) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev1).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        function showpreview(file, prev2) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev2).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        function showpreview(file, prev3) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev3).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        $(document).ready(function(){
           $("#show").click(function(){
               var ref=$("#pet").val();
               $("#selpets").val(ref);
           });
              $("#uid").blur(function() {
                var uidValue = $("#uid").val();


                var url = "shelter-profileajax.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    alert(response);

                });

            });

        });
                               
    </script>
</head>

<body>
     <div style="background-color:#EDF5E1 ">
     <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 mx-md-auto">SHELTER PROVIDER</span>
</nav><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="project-logout.php" class="btn btn-link float-right">LogouT</a>
            </div>
        </div>
    </div>
    <div class="container">
                <form action="shelter-profileprocess.php" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="uid">User id</label>
                    <input type="text" required class="form-control" id="uid" name="uid"value="<?php echo $_SESSION['active_user']?>" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" required class="form-control" id="name" name="name">

                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact Number</label>
                    <input type="text" required class="form-control" id="contact" name="contact">

                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group col-md-3 ">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                 <div class="form-group col-md-3 ">
                    <label for="days">Maximum Days</label>
                    <input type="number" class="form-control" id="days" name="days">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="pet">Select Pets</label>
                    <select class="form-control" id="pet" name="pet" size="5" multiple >
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
                <label for="selpets">Selected pets:</label>
                <input type="text"  class="form-control" id="selpets" name="selpets">
                <br>
                <input type="button" id="show"  value="Show here">
                
                </div>
                		

                
            </div>
                
            <div class="form-row">
               <div class="form-group">
                <label for="info">Other Information:</label>
                <textarea rows="5" cols="156" maxlength="1000" class="form-control" id="info" name="info"></textarea>
                </div>
            </div>
            <center><h3>GALLERY</h3></center>
             <div class="form-row">
                <div class="form-group col-md-4 ">
                    
                    <br> <input type="file" id="pic1" name="pic1" onchange="showpreview(this,prev1);" accept="image/x">
                </div>
                 <div class="form-group col-md-4 ">
                    
                    <br> <input type="file" id="pic2" name="pic2" onchange="showpreview(this,prev2);" accept="image/x">
                </div>
                 <div class="form-group col-md-4 ">
                    
                    <br> <input type="file" id="pic3" name="pic3" onchange="showpreview(this,prev3);" accept="image/x">
                </div>
            </div>
               <div class="form-row">
                <div class="form-group col-md-4">
                    <img width="200" height="200" id="prev1">
                </div>
                <div class="form-group col-md-4">
                    <img width="200" height="200" id="prev2">
                </div>
                <div class="form-group col-md-4">
                    <img width="200" height="200" id="prev3">
                </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-4">
                   <label for="pic1">Pic 1</label>
               </div>
               <div class="form-group col-md-4">
                   <label for="pic2">Pic 2</label>
               </div>
               <div class="form-group col-md-4">
                   <label for="pic3">Pic 3</label>
               </div>
            </div>
            <br>
            <br>
            <center>
                <button type="submit" class="btn btn-primary col-md-3" value="Upload to Server" name="btn" id="btn">Upload to Server</button>
            </center>
            
            
        </form>
    </div>
    </div>
</body>

</html>
