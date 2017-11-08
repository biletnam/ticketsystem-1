<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 08.11.2017
 * Time: 11:34
 */

require_once 'dbconfig.php';

if (isset($_POST['createTicket'])) {
    $name = trim($_POST['tname']);
    $email = trim($_POST['temail']);
    $message = trim($_POST['tmessage']);

    try {
        $ticket->createTicket($name, $email, $message);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Ticket einsenden</h2>
    <form method="post">
        <div class="form-group">
            <label>Name:</label>
            <input name="tname" type="text" id="name">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input name="temail" type="text" id="email">
        </div>
        <div class="form-group">
            <label>Nachricht:</label>
            <textarea name="tmessage" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="createTicket">
                <i class="glyphicon glyphicon-open-file"></i> Ticket einsenden
            </button>
        </div>

    </form>
</div>

</body>
</html>
