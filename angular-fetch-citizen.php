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
                $http.get("json-fetch-citizen.php?pet="+$scope.selpet).then(okfn, notokfn);
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
            $scope.petArray= [];
            $scope.selpet = "none";
            $scope.loadpet = function() {
                $http.get("json-fetch-city-citizen.php").then(okfn, notOkfn);

                function okfn(result) //call back function
                {
//                    alert(JSON.stringify(result.data));
                    $scope.petArray = result.data; //local to global assignment

                }

                function notOkfn(result) {
                    alert(result.data);
                }


            }
            
        });

    </script>
</head>

<body ng-app="kuchbhimodule" ng-controller="mycontroller" ng-init="loadpet();"style="background-color:#EDF5E1 ">
    <div style="background-color:#EDF5E1 ">
    <center>
       <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 mx-md-auto">BUY PETS</span>
</nav><br>
        
            <div class="row">
                <div class="col-md-12">
                    Select city:
                    <select ng-model="selpet">
                        <option value="none" selected>Select</option>
                        <option value={{obj.pet}} ng-repeat="obj in petArray">{{obj.pet}}</option>
                    </select>&nbsp;

                    <input type="button" value="Fetch All" ng-click="fetchjsondata();" class="btn btn-warning">
                </div>
            </div>
            <br>
            <div class="container">
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArray">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{obj.name}}</h5>
                            <h5 class="card-text">Contact No: {{obj.mobile}}</h5>
                            <h5 class="card-text">Address: {{obj.address}}</h5>
                            <h5 class="card-text">Pet: {{obj.pet}}</h5>
                            <h5 class="card-text">Other Information: {{obj.info}}</h5>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </center>
    </div>
</body>

</html>
