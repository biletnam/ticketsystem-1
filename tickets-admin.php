<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 08.11.2017
 * Time: 11:49
 */

include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];

$stmt = $DB_con->prepare("SELECT * FROM user WHERE userID=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$tickets = $DB_con->prepare("SELECT * FROM tickets");
$tickets->execute();

$ticketRow = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ticketsystem | Lite</title>

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
                <a class="nav-link" href="dashboard-admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tickets-admin.php">Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="createuser-admin.php">User anlegen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout=true">Logout<i class="glyphicon glyphicon-log-out"></i></a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="container">
        <h2>Alle Tickets</h2>

        <table class="table">
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
            <?php foreach ($tickets->fetchALL(PDO::FETCH_ASSOC) as $row) : ?>
            <tr class='clickable-row' data-href='www.test.de'>
                <td><?php echo $row['ticketsID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['isAssignedTo']; ?></td>
                <td><?php echo $row['isFinished']; ?></td>
            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"></script>
</body>
</html>