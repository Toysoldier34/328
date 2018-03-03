<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 3/1/2018
 * Time: 5:21 PM
 */

/*
**** members table ****

CREATE TABLE `athompso_grc`.`members`(
    `member_id` INT NOT NULL AUTO_INCREMENT ,
    `fname` VARCHAR(255) NOT NULL ,
    `lname` VARCHAR(255) NOT NULL ,
    `age` INT NOT NULL ,
    `gender` VARCHAR(255) NOT NULL ,
    `phone` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `state` VARCHAR(255) NOT NULL ,
    `seeking` VARCHAR(255) NOT NULL ,
    `bio` MEDIUMTEXT NOT NULL ,
    `premium` TINYINT NOT NULL ,
    `image` VARCHAR(2000) NOT NULL ,
    `interests` MEDIUMTEXT NOT NULL ,
    PRIMARY KEY (`member_id`)
)
ENGINE = MyISAM;

*/

require("/home/athompso/config.php");


class dbfunctions
{

    //establishes server connection
    function connect()
    {
        try {
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }//end connect


    //adds members to database
    function addMember($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $premium, $image, $interests)
    {
        global $dbh;
        //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);


//        $sql = "INSERT INTO members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
//            VALUES ('g', 'g', 3, 'g', 'g', 'g', 'g', 'g', 'g', 0, 'g', 'g')";
//        $statement = $dbh->prepare($sql);

        //$statement->debugDumpParams();
        //print_r($statement);

        $success = $statement->execute();
        return $success;
    }//end addMember


    //gets members
    function getMembers()
    {
        global $dbh;
        $sql = "SELECT * FROM members ORDER BY lname";
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }//end getMembers






}//end dbfunctions











