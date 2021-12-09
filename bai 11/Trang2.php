<html>
    <head></head>
    <body>
        <?php
            $firstName = $_POST["fFirstname"] ?? null;
            $lastName = $_POST["fLastname"] ?? null;

            echo '<label>Your First name is: </label>' . $firstName . "<br/>"
            . '<label>Your Last name is: </label>' . $lastName;
        ?>
        
    </body>
</html>