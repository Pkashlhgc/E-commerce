<?php
### INCLUDE VIEW CLASS
include("app/Http/Controllers/View.php");

## [O]bject Defined 
$view = new View;

## [M]ethod Execute | VIEW CLASS
if(isset($_SESSION['SMC_login_admin_type'])){
$view->loadContent("include", "session");
$view->loadContent("include", "top");
$view->loadContent("content", "create-admin");
$view->loadContent("include", "tail");

}
else{
    $view->loadContent("content", "create-admin");
}

?>