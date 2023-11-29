<?php 
//this is the index page that is the controller for this project. It tells everything what to do and where to go
    include("Models/session.php");
    include("Models/database.php");
    include("Models/charactersDB.php");

    $action = filter_input(INPUT_GET,"action");

    include("Views/header.php");

    if($action == null)
    {
        $action = "home";
    }

    switch($action){
        //basic actions 
        case "home": 
            include("Views/home.html"); 
            break;
        //login actions
        case "login": 
            include("Views/login.html"); 
            if($userName != "root" && $password != 'YES')
            {
                include("Errors/databaseError.php");
            }
            break;
        case "loginAttempt": 
            $userName = filter_input(INPUT_POST, "userName");
            $password = filter_input(INPUT_POST, "password");
            $_SESSION['userName'] = $userName;
            $_SESSION['password'] = $password;
            header("Location:.?action=list"); 
            exit();
            break;
        //db actions 
        case "list": 
            if(!empty($e))
            {
                header("Location:.?action=login");
                exit();
            }

            $characters = get_characters();
        
            include("Views/list.php");
            break;
        // adding, deleting, and editing db
        case "showAddForm":
            include('Views/add.php');
            $error = filter_input(INPUT_GET,"error");
            if(!empty($error))
            {
                include('Errors/addingError.php');
            }
            break;
        case "add":
            $characterName = filter_input(INPUT_POST, 'characterName');
            $Level = filter_input(INPUT_POST, 'Level');
            $RaiderIO = filter_input(INPUT_POST, 'RaiderIO');
            $ItemLevel =filter_input(INPUT_POST, 'ItemLevel');
            if($characterName == null || $Level == null || $RaiderIO == null || $ItemLevel == null)
            {
                header("Location:.?action=showAddForm&error=something");  
                exit();
            }
            else
            {
                add_characters($characterName,$Level);
                add_scores($RaiderIO, $ItemLevel, $characterName);
                header("Location:.?action=list");
                exit();
            }
            break;
        case "delete":
            $characterName = filter_input(INPUT_POST, 'characterName');
            delete_character($characterName);
            delete_score($characterName);
            header("Location:.?action=list");
            break;
        case "showEditForm":
            include("Views/edit.php");
            break;
        case "edit":
            $characterName = filter_input(INPUT_POST, 'characterName');
            $Level = filter_input(INPUT_POST, 'Level');
            $RaiderIO = filter_input(INPUT_POST, 'RaiderIO');
            $ItemLevel =filter_input(INPUT_POST, 'ItemLevel');

            edit_character($characterName, $Level);
            edit_scores($RaiderIO, $ItemLevel, $characterName);
            header("Location:.?action=list");
            exit();

        
    }

    include("Views/footer.php");

?>