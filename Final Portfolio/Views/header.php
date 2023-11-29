
<!DOCTYPE html>
<html>
    <head>
        <title>Warcraft Things</title>
        <link rel="stylesheet" type="text/css" href="views/resetStylesheet.css">
    </head>
        <nav>
            <div><a href=".?action=home">Home</a></div>
            <div><a href=".?action=list">Character</a></div>
            <?php 
                if($_SESSION['userName'])
                {
                    echo('<div class="login"><a href=".?action=login">'. $_SESSION['userName'] .'</a></div>' );
                }
                else
                    echo('<div class="login"><a href=".?action=login">Login</a></div>');
            ?>
        </nav>
    <body>
    <header><h1>Warcraft Things</h1></header>
