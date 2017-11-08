<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 07.11.2017
 * Time: 11:07
 */

require_once 'dbconfig.php';

if (isset($_POST['signup'])) {
    $umail = trim($_POST['umail']);
    $upass = trim($_POST['upass']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $role = trim($_POST['role']);

    try {
        $stmt = $DB_con->prepare("SELECT email FROM user WHERE email=:umail");
        $stmt->execute(array(':umail' => $umail));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["email"] == §umail) {
            $error[] = "Die Mailadresse ist bereits registriert.";
        }
        else {
            if ($user->createUser($umail, $upass, $fname, $lname, $role)) {
                $user->redirect('dashboard.php');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up : cleartuts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Ticketsystem | Lite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tickets</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="createuser.php">User anlegen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout=true">Logout<i class="glyphicon glyphicon-log-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="form-container">
        <form method="post">
            <h2>Nutzer anlegen</h2><hr />
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            else if(isset($_GET['joined']))
            {
                ?>
                <div class="alert alert-info">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <input type="email" class="form-control" required name="umail" placeholder="E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" required name="upass" placeholder="Passwort"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" required name="fname" placeholder="Vorname"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" required name="lname" placeholder="Nachname" />
            </div>
            <div class="form-group">
                <!--<input type="text" class="form-control" required name="role" placeholder="Rolle" />-->
                <select name="role">
                    <option value="Supporter">Supporter</option>
                </select>
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" name="signup">
                    <i class="glyphicon glyphicon-open-file"></i> Nutzer anlegen
                </button>
            </div>
            <br />
        </form>
    </div>
</div>

</body>
</html>