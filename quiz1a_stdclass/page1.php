<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page 1</title>
    </head>
    <body>
        <form name="form1" action="index.php" method="post" >
            Last Name: <input type="text" name="lastname" value="<?php echo $data->lastname ?>" /><br>
						First Name: <input type="text" name="firstname" value="<?php echo $data->firstname ?>" />
            <input type="text" name="data" hidden value='<?php echo json_encode($data); ?>' />
            <hr>
            <input type="submit" name="action" value="Page2" />
        </form>
    </body>
</html>
