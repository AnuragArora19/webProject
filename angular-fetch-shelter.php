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
    </script>
    <script>
        var module = angular.module("kuchbhimodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray = [];
            $scope.fetchjsondata = function() {
                loadjson();
            }

            function loadjson() {
                $http.get("json-fetch-shelter.php?city="+$scope.selcity).then(okfn, notokfn);

                function okfn(result)
                {
//                   alert(JSON.stringify(result.data));
                    $scope.jsonArray = result.data;
                }

                function notokfn(result)
                {
                    alert(result.data);
                }

            }
            $scope.cityArray= [];
            $scope.selcity = "none";
            $scope.loadCity = function() {
                $http.get("json-fetch-city-shel.php").then(okfn, notOkfn);

                function okfn(result) //call back function
                {
//                    alert(JSON.stringify(result.data));
                    $scope.cityArray = result.data; //local to global assignment

                }

                function notOkfn(result) {
                    alert(result.data);
                }


            }

            $scope.selobj;
            $scope.showdetails = function(index) {
                $scope.selobj = $scope.jsonArray[index];
            }

        });

    </script>
</head>

<body ng-app="kuchbhimodule" ng-controller="mycontroller" ng-init="loadCity();"style="background-color:#EDF5E1 ">
    <div style="background-color:#EDF5E1 ">
    <center>
       <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 mx-md-auto">Find a Shelter</span>
</nav><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Select city:
                    <select ng-model="selcity">
                        <option value="none" selected>Select</option>
                        <option value={{obj.city}} ng-repeat="obj in cityArray">{{obj.city}}</option>

                    </select>

                    <input type="button" value="Fetch All" ng-click="fetchjsondata();" class="btn btn-warning">

                </div>
                
            </div><br>
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArray">
                    <div class="card">
                        <img class="card-img-top" src="uploads/{{obj.pic1}}" height="150" width="150" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{obj.name}}</h5>
                            <h5 class="card-title">City: {{obj.city}}</h5>
                            <h5 class="card-title">Pet type: {{obj.selpet}}</h5>
                            <h5 class="card-title">Days: {{obj.days}} days</h5>
                            <a href="#" class="btn btn-warning" ng-click="showdetails($index);" data-toggle="modal" data-target="#modaldetail">Other Details</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="modaldetail">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header btn-warning" >
                        <h5 class="modal-title">Other Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        
                        <h5> Mobile Number: {{selobj.contact}}</h5>
                        <h5> Address: {{selobj.address}}</h5>
                        <h5>Any other Information: {{selobj.info}}</h5>
                        <h5> <img src="uploads/{{selobj.pic2}}" width="150" height="150"> &nbsp;&nbsp;<img src="uploads/{{selobj.pic3}}" width="150" height="150"> </h5>

                    </div>
                </div>

            </div>
        </div>

    </center>
    </div>
    

</body>

</html>
