<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 08.11.2017
 * Time: 11:34
 */

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
    <form>
        <div class="form-group">
            <label name="name">Name:</label>
            <input type="text" id="name">
        </div>
        <div class="form-group">
            <label name="email">E-Mail</label>
            <input type="text" id="email">
        </div>
        <div class="form-group">
            <label name="comment">Nachricht:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="sendticket">
                <i class="glyphicon glyphicon-open-file"></i> Ticket einsenden
            </button>
        </div>

    </form>
</div>

</body>
</html>
