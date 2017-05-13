<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page 3</title>
    </head>
    <body>
        <form name="form3" action="index.php" method="post" >
            First Name: <?php echo $data->firstname; ?> <br>
            Last Name: <?php echo $data->lastname; ?><br>
						Age: <?php echo $data->age; ?>
						<input type="text" name="data" hidden value='<?php echo json_encode($data); ?>' />
            <hr>
            <input type="submit" name="action" value="Page2" />
            <input type="submit" name="action" value="Finish" />
        </form>
    </body>
</html>
