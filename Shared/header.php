<?php session_start(); 
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::uar test::</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>reset.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>main.css">

</head>
<body>

    <div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo URL_ROOT.APP_ROOT; ?>" class="navbar-brand">UAR Test</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL_ROOT.APP_ROOT; ?>/form/new">Create new form</a></li>
                    <li> <a href="<?php echo URL_ROOT.APP_ROOT; ?>/forms">All forms</a></li>
                </ul>
               
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <div class="container">

        <div class="starter-template">
