<?php

// Class Auto Load 

function classAutoLoad($classname){

    $directories = ["authentication","contents", "layouts", "menus"];

    foreach($directories AS $dir){
        $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $classname . ".php";
        if(file_exists($filename) AND is_readable($filename)){
            require_once $filename;
        }
    }
}

spl_autoload_register('classAutoLoad');

// Create instances of all classes
    $ObjLayouts = new layouts();
    $ObjMenus = new menus();
    $ObjHeadings = new headings();
    $ObjCont = new contents();
    $ObjSignup= new  signup();
    


require "includes/constants.php";
require "includes/dbConnection.php";

$conn = new dbConnection('PDO', '127.0.0.1', '3306', 'root', '#Gift@90210!', 'api_d');


// print 
// print "<br>";
// print "<br>";
// print $_SERVER["PHP_SELF"];
// print "<br>";
// print "<br>";
// print basename($_SERVER["PHP_SELF"]);
// print "<br>";
// print "<br>";
// if(file_exists("index.php") AND is_readable("index.php")){
//     print "yes";
// }else{
//     print "no";
// }