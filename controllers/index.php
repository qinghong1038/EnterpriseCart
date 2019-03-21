<?php
/*
  Name of Page: Index

  Method: This is controller for index page.

  Date created: Nikita Zaharov, 13.04.2019

  Use: controller is used by index.php, load by GET request parameter - page=index.

  The controller is responsible for:
  + loading user and translation models
  + render index page

  Input parameters:
  $app : application instance, object

  Output parameters:
  $scope: object, used by view, most like model
  $translation: model, it is responsible for translation in view

  Called from:
  + index.php

  Calls:
  models/translation.php
  app from index.php

  Last Modified: 13.04.2019
  Last Modified by: Nikita Zaharov
*/

//require 'models/users.php';
require 'models/translation.php';
//require 'models/security.php';
//require 'models/drillDowner.php';
//require 'models/linksMaker.php';

class controller{
    public $user = false;
    public $interface = "default";
    public $interfaceType = "ltr";
    public $dashboardTitle = "Enterprise X Cart";
    public $breadCrumbTitle = "Enterprise X Cart";
    public $config;
    public $defaultCompany;
    
    public function process($app){
        $user;
        if(key_exists("user", $_SESSION))
            $user = Session::get("user");
        else
            Session::set("user",$user = [
                "language" => "English"
            ]);
        $this->user = $user;
        $this->config = config();
        //        if(Session::get("defaultCompany");
        if(key_exists("CompanyID", $_GET))
            Session::set("defaultCompany", $this->defaultCompany = [
                "CompanyID" => key_exists("CompanyID", $_GET) ? $_GET["CompanyID"] : $this->config["defaultCompanyID"],
                "DivisionID" => key_exists("DivisionID", $_GET) ? $_GET["DivisionID"] : $this->config["defaultDivisionID"],
                "DepartmentID" => key_exists("DepartmentID", $_GET) ? $_GET["DepartmentID"] : $this->config["defaultDepartmentID"],            
            ]);
        else if(!Session::get("defaultCompany"))
            Session::set("defaultCompany", $this->defaultCompany = [
                "CompanyID" => $this->config["defaultCompanyID"],
                "DivisionID" => $this->config["defaultDivisionID"],
                "DepartmentID" => $this->config["defaultDepartmentID"],            
            ]);
            
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }else if($_SERVER['REQUEST_METHOD'] === 'GET') {
            //$drill = new drillDowner();
            //$linksMaker = new linksMaker();
            //$this->user = $user = $_SESSION["user"];
               
            //$security = new Security($this->user["accesspermissions"], []);
            //$translation = new translation($this->user["language"]);
            $translation = new translation($user["language"]);
            $this->dashboardTitle = $translation->translateLabel($this->dashboardTitle);
            $this->breadCrumbTitle = $translation->translateLabel($this->breadCrumbTitle);
            $scope = json_decode(json_encode($scope), true);
            //$keyString = $this->user["CompanyID"] . "__" . $this->user["DivisionID"] . "__" . $this->user["DepartmentID"];
            if(key_exists("action", $_GET))
                require "views/pages/{$_GET["action"]}.php";
            else
                require 'views/index.php';
        }
    }
}
?>