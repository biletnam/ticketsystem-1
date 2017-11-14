<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:templates\\base.tpl
if (!("1510692184" == filemtime('templates//base.tpl'))) { ob_end_clean(); return false; };?><!doctype html>
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
    <main role="main" class="container">
    <div class="container">
        <h2>Alle Tickets</h2>
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Nachricht</th>
                <th>Zugewiesen an</th>
                <th>Beendet</th>
            </tr>
            </thead>
            <tbody>
            <?php 
$_fh0_data = (isset($this->scope["tickets"]) ? $this->scope["tickets"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['ticket'])
	{
/* -- foreach start output */
?>
            <tr>
                <td><a href="/ticketdetail.php?id=<?php echo $this->scope["ticket"]["ticketsID"];?>"><?php echo $this->scope["ticket"]["ticketsID"];?></td>
                <td><?php echo $this->scope["ticket"]["name"];?></td>
                <td><?php echo $this->scope["ticket"]["email"];?></td>
                <td><?php echo $this->scope["ticket"]["message"];?></td>
                <td><?php echo $this->scope["ticket"]["isAssignedTo"];?></td>
                <td><?php echo $this->scope["ticket"]["isFinished"];?></td>
            </tr>
            <?php 
/* -- foreach end output */
	}
}?>
            </tbody>
        </table>
</main><!-- /.container -->
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