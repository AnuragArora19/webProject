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
        $(document).ready(function() {

            $("#uid").blur(function() {
                var uidValue = $("#uid").val();


                var url = "project-ajaxdoctor.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    alert(response);

                });

            });

            $("#btnFetch").click(function() {
                var user = $("#uid").val();
                $.getJSON("project-jsonrecord.php?uid=" + user, function(jsonAryResponse) {
                    if (jsonAryResponse.length == 0)
                        alert("Invalid ID");
                    else {
                        $("#name").val(jsonAryResponse[0].name);
                        $("#mob").val(jsonAryResponse[0].mobile);
                        $("#email").val(jsonAryResponse[0].email);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#state").val(jsonAryResponse[0].state);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#qualification").val(jsonAryResponse[0].qualification);
                        $("#exp").val(jsonAryResponse[0].exp);
                        $("#spl").val(jsonAryResponse[0].spl);
                        $("#prev1").prop("src", "uploads/" + jsonAryResponse[0].ppic);
                        $("#prev2").prop("src", "uploads/" + jsonAryResponse[0].certpic);
                        $("#hdnBox1").val(jsonAryResponse[0].ppic);
                        $("#hdnBox2").val(jsonAryResponse[0].certpic);
                    }

                });

            });

        });

    </script>



</head>

<body>
   <div style="background-color:#EDF5E1 ">
   <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 mx-md-auto">DOCTORS PROFILE</span>
</nav><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="project-logout.php" class="btn btn-link float-right">LogouT</a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="project-docprofile-process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdnBox1" name="hdnBox1">
            <input type="hidden" id="hdnBox2" name="hdnBox2">

            <div class="form-row">
                <div class="form-group col-md-4">


                    <label for="uid">User id</label>
                    <input type="text" required class="form-control" id="uid" name="uid" value="<?php echo $_SESSION['active_user']?>" readonly>

                </div>
                <div class="form-group col-md-2 ">
                    <label for="fetch"><br></label>
                    <input type="button" id="btnFetch" value="FETCH" class="form-control btn btn-primary">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="mob">MOBILE NUMBER</label>
                    <input type="text" class="form-control" id="mob" name="mob" required>
                </div>
                <div class="form-group col-md-4 ">
                    <label for="email">EMAIL ID</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group col-md-3 ">
                    <label for="state">STATE</label>
                    <select class="form-control" id="state" name="state" >
                        <option>NONE</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-3 ">
                    <label for="city">CITY/LOCALITY</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 ">
                    <label for="qualification">HIGHEST-QUALIFICATION</label>
                    <select class="form-control" id="qualification" name="qualification">
                       <option>NONE</option>
                        <option >Bachelor of Veterinary Science & Animal Husbandry (B.V.Sc & AH)</option>
                        <option >BV. Sc. in Animal Genetics and Breeding</option>
                        <option>BV. Sc. in Animal Production & Management</option>
                        <option>BV. Sc. in Veterinary Surgery & Radiology</option>
                        <option>BV. Sc. in Veterinary Medicine, Public Health & Hygiene</option>
                        <option>Master of Veterinary Science (M.V.Sc) </option>
                        <option>MV. Sc in Veterinary Medicine</option>
                        <option>MV. Sc in Veterinary Pharmacology & Toxicology</option>
                        <option>MV. Sc in Veterinary Surgery & Radiology</option>
                        <option>Doctor of Philosophy (Ph.D) in Veterinary Medicine</option>
                        <option>Doctor of Philosophy (Ph.D) in Veterinary Pathology</option>
                        <option>Doctor of Philosophy (Ph.D) in Veterinary Pharmacology & Toxicology</option>
                    </select>
                </div>
                <div class="form-group col-md-3 ">
                    <label for="exp">Exp.(years)</label>
                    <input type="number" class="form-control" id="exp" name="exp">
                </div>
                <div class="form-group col-md-4 ">
                    <label for="spl">SPECIALIZATION</label>
                    <select class="form-control" id="spl" name="spl">
                        <option>NONE</option>
                        <option> Anaesthesiology</option>
                        <option> Animal behavior</option>
                        <option> Animal welfare</option>
                        <option> Birds (pet and ornamental)</option>
                        <option> Bovine</option>
                        <option> Canine</option>
                        <option> Cardiology</option>
                        <option> Clinical pathology</option>
                        <option> Clinical pharmacology</option>
                        <option> Dentistry</option>
                        <option> Dermatology (veterinary dermatology)</option>
                        <option> Diagnostic imaging (diagnostic imaging of animals)</option>
                        <option> Equine</option>
                        <option> Emergency and critical care (veterinary intensive care and veterinary emergency medicine)</option>
                        <option> Honey bee</option>
                        <option> Fish</option>
                        <option> Food Agro diagnostics in veterinary</option>
                        <option> Forensic veterinary</option>
                        <option> Feline</option>
                        <option> Veterinary immunology</option>
                        <option> Internal medicine</option>
                        <option> Laboratory animal medicine</option>
                        <option> Microbiology (veterinary microbiology; clinical microbiology of animals)</option>
                        <option> Neurology and neurosurgery (veterinary neurology; veterinary neurosurgery)</option>
                        <option> Nutrition</option>
                        <option> Oncology (cancer in animals)</option>
                        <option> Ophthalmology (veterinary ophthalmology)</option>
                        <option> Orthopaedics (veterinary orthopaedics)</option>
                        <option> Parasitology</option>
                        <option> Pathology (veterinary pathology)</option>
                        <option> Porcine</option>
                        <option> Poultry</option>
                        <option> Preventive medicine</option>
                        <option> Radiology (veterinary radiology)</option>
                        <option> Reptile and amphibian</option>
                        <option> Shelter medicine</option>
                        <option> Sports medicine</option>
                        <option> Surgery</option>
                        <option> Theriogenology</option>
                        <option> Toxicology</option>
                        <option> Zoological medicine (includes zoo, wildlife, aquatics, and exotic pet species)</option>


                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="ppic">PROFILE PIC:</label>
                    <input type="file" id="ppic" name="ppic" onchange="showpreview(this,prev1);" accept="image/x">
                    <center>
                        <img width="200" height="200" id="prev1">
                    </center>
                </div>

                <div class="form-group">
                    <label for="certpic">CERTICATE PIC:</label>
                    <input type="file" id="certpic" name="certpic" onchange="showpreview(this,prev2);" accept="image/x">
                    <center>
                        <img width="200" height="200" id="prev2">
                    </center>
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary col-md-2" value="save" name="btn" id="btn">Submit</button>
                <button type="submit" class="btn btn-primary col-md-2" value="update" name="btn" id="btn">Update</button>
            </center>
        </form>
    </div>
    </div>
</body>

</html>
