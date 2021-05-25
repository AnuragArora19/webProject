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
        function showpreview(file, prev) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        $(document).ready(function() {

            $("#uid").blur(function() {
                var uidValue = $("#uid").val();


                var url = "project-ajaxpharmacy.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    alert(response);

                });

            });

            $("#btnsearch").click(function() {
                var user = $("#uid").val();
                $.getJSON("project-jsonpharmacy.php?uid=" + user, function(jsonAryResponse) {
                    if (jsonAryResponse.length == 0)
                        alert("Invalid ID");
                    else {
                        $("#fname").val(jsonAryResponse[0].fname);
                        $("#mob").val(jsonAryResponse[0].mobile);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#licence").val(jsonAryResponse[0].licence);
                        $("#prev").prop("src", "uploads/" + jsonAryResponse[0].qrpic);
                        $("#hdnBox").val(jsonAryResponse[0].qrpic);
                    }
                });
            });
        });

    </script>
</head>

<body>
      <div style="background-color:#EDF5E1 ">
      <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 mx-md-auto"> PHARMACIST PROFILE</span>
</nav><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="project-logout.php" class="btn btn-link float-right">LogouT</a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="project-pharmacyprocess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdnBox" name="hdnBox">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="uid">User id</label>
                    <input type="text" required class="form-control" id="uid" name="uid" value="<?php echo $_SESSION['active_user']?>" readonly>

                </div>
                <div class="form-group col-md-2 ">
                    <label for="fetch"><br></label>
                    <input type="button" id="btnsearch" value="SEARCH" class="form-control btn btn-primary">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="fname">Firm Name</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="mob">Mobile No</label>
                    <input type="text" class="form-control" id="mob" name="mob" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8 ">
                    <label for="address">Shop Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="city">City/Locality</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="licence">Licence No</label>
                    <input type="text" class="form-control" id="licence" name="licence">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="qrpic">Upload Paytm QR Code:</label>
                    <br> <input type="file" id="qrpic" name="qrpic" onchange="showpreview(this,prev);" accept="image/x">
                </div>
                <div class="form-group">
                    <img width="200" height="200" id="prev">
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary col-md-2 mt-4" value="save" name="btn" id="btn">Send</button>
                <button type="submit" class="btn btn-primary col-md-2 mt-4" value="update" name="btn" id="btn">Update</button>
            </center>


        </form>
    </div>
    </div>
</body>

</html>
