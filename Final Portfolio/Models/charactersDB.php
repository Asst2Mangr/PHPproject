<?php
    //gets all the characters from the database 
    function get_characters() {
        global $db;
        $query = 'SELECT * FROM characters JOIN scores 
                        ON characters.characterName = scores.heldBy';
        $statement = $db->prepare($query);
        $statement->execute();
        $characters = $statement->fetchAll();
        return $characters;    
    }
    //updates selected character in the database
    function edit_character($characterName, $Level) {
        global $db;
        $query = 'UPDATE characters
                    SET Level = :Level
                    WHERE characterName = :characterName';
        $statement = $db->prepare($query);
        $statement->bindValue(':characterName', $characterName);
        $statement->bindValue(':Level', $Level);
        $statement->execute();
        $statement->closeCursor();
    }
    //updates selected scores in the database
    function edit_scores($RaiderIO, $ItemLevel, $characterName) {
        global $db;
        $query = 'UPDATE scores
                  SET RaiderIO = :RaiderIO,
                  ItemLevel = :ItemLevel
                  WHERE heldBy = :heldBy';
        $statement = $db->prepare($query);
        $statement->bindValue(':RaiderIO', $RaiderIO);
        $statement->bindValue(':ItemLevel', $ItemLevel);
        $statement->bindValue(':heldBy', $characterName);
        $statement->execute();
        $statement->closeCursor();
    }
    //adds a new character to the database 
    function add_characters($characterName, $Level) {
        global $db;
        $query = 'INSERT INTO characters (characterName, Level)
        VALUES
           (:characterName,:Level)';
        $statement = $db->prepare($query);
        $statement->bindValue(':characterName', $characterName);
        $statement->bindValue(':Level', $Level);
        $statement->execute();
        $statement->closeCursor();
    }
    //adds scores to the database 
    function add_scores($RaiderIO, $ItemLevel, $characterName) {
        global $db;
        $query = 'INSERT INTO scores (RaiderIO, ItemLevel, heldBy)
        VALUES
           (:RaiderIO,:ItemLevel, :heldBy)';
        $statement = $db->prepare($query);
        $statement->bindValue(':RaiderIO', $RaiderIO);
        $statement->bindValue(':ItemLevel', $ItemLevel);
        $statement->bindValue(':heldBy', $characterName);
        $statement->execute();
        $statement->closeCursor();
    }
    //deletes a character from the database
    function delete_character($characterName) {
        global $db;
        $query = 'DELETE FROM characters
        WHERE characterName = :characterName';
        $statement = $db->prepare($query);
        $statement->bindValue(':characterName', $characterName);
        $success = $statement->execute();
        $statement->closeCursor();  
        
    }
    function delete_score($characterName) {
        global $db;
        $query = 'DELETE FROM scores
        WHERE heldBy = :characterName';
        $statement = $db->prepare($query);
        $statement->bindValue(':characterName', $characterName);
        $success = $statement->execute();
        $statement->closeCursor();  
        
    }

?>