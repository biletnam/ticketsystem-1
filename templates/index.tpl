<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{$title}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="email" class="sr-only">E-Mail Adresse</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail Adresse" required
               autofocus>
        <label for="password" class="sr-only">Passwort</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Passwort" required>
        <div class="checkbox">
            <!-- <label>
                 <input type="checkbox" value="remember-me"> Eingeloggt bleiben
             </label>-->
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Anmelden</button>
        <a href="createticket.php">Oder Ticket einsenden!</a>
    </form>

</div> <!-- /container -->
</body>
</html>