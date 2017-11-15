<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:templates\\base.tpl
if (!("1510754750" == filemtime('templates//base.tpl'))) { ob_end_clean(); return false; };?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Ticketsystem | Lite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tickets.php">Tickets</a>
            </li>
            <?php if ((isset($this->scope["user"]["role"]) ? $this->scope["user"]["role"]:null) == 'Admin' || (isset($this->scope["user"]["role"]) ? $this->scope["user"]["role"]:null) == 'Manager') {
?>
                <li class="nav-item">
                    <a class="nav-link" href="createuser.php">Nutzer erstellen</a>
                </li>
            <?php 
}?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout<i class="glyphicon glyphicon-log-out"></i></a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
        

    <div class="starter-template">
        <h1>Hallo <?php echo $this->scope["user"]["firstname"];?> <?php echo $this->scope["user"]["lastname"];?></h1>
        Sie sind angemeldet als <?php echo $this->scope["user"]["role"];?>. <br>
        Ihre UserID lautet: <?php echo $this->scope["user"]["userID"];?>. <br>
        <form method="post">
        <button name="getTicket" type="submit" class="btn btn-primary">Ticket erhalten</button>
        </form>
    </div>
</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"></script>
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>