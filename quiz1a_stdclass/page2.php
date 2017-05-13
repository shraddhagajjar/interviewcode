<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page 2</title>
    </head>
    <body>
        <form name="form3" action="index.php" method="post" >
            Your age: <input type="text" name="age" value="<?php echo $data->age; ?>" />
            <input type="text" name="data" hidden value='<?php echo json_encode($data); ?>' />
            <hr>
            <input type="submit" name="action" value="Page1" />
            <input type="submit" name="action" value="Page3" />
        </form>
    </body>
</html>
