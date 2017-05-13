
<?php
$j = 0;
$string = file_get_contents('./record.json');
$json = json_decode($string, true);
$i = 0;
$j = 0;
echo "json file record";
echo "<pre>";
print_r($json);
echo "</pre>";
//creating one array unique array for row from json array
foreach ($json as $key => $value) {
    if (is_array($value)) {
        $s = serialize($key);
        $data = explode("\"", $s);
        $row[$i] = $data[1];
        $i += 1;
    }
}
//creating one array unique array for coloumn from json array
foreach ($json as $key => $value) {
    foreach ($value as $key => $val) {

        $s = serialize($val);
        $data = explode("\"", $s);
        $col[$j] = $data[1];
        $j += 1;
    }
}

//Check function to check it contain facility then return 1 other wise return 0 
function check($cat, $subcat, $json) {
    foreach ($json as $key => $values) {
        if (is_array($values)) {
            $s = serialize($key);
            $data = explode("\"", $s);
            if ($cat === $data[1]) {
                foreach ($values as $keys => $subs) {
                    if ($json[$key][$keys] === $subcat) {
                        return 1;
                        ;
                    }
                }
            }
        }
    }
}
?>
<html>
    <head>
        <title>:: Home Test ::</title>
    </head>
    <body>
        <?php echo "Generated Table from Json record to write cvs file <br/>";
        echo "<br/>";?>
        <table border="1" cellspacing ="5" cellpadding="5" id="k"> 

            <tr>
                <th>&nbsp;</th>
                <?php
                // dynamically displaying row coloumn tile in html table from using col array
                //finalrecord array is used to generate array to write cvs file.
                $finalrecord = array();
                $i = 0;
                $s = "All Records";
                foreach (array_unique($col) as $key => $val) {
                    echo "<th>" . $val . "</th>";
                }
                $finalrecord[$i] = $s . implode(' , ', (array_unique($col)));
                $i += 1;
                ?>
            </tr>
            <?php
            $ss = "";
            // dynamically displaying row coloumn tile in html table from using col array
            foreach (array_unique($row) as $key => $val) {

                echo "<tr>" . "<td>" . $val . "</td>";
                $k = 0;
                $j = 0;
                $ss = $row[$key];
                $subsubstr = array();
                foreach (array_unique($col) as $key => $val1) {
                    echo "<td>";
                    // calling function to check row and column match to json array or not
                    $j = check($val, $val1, $json);
                    if ($j === 1) {
                        echo $j;
                        $subsubstr[$k] = $j;
                        $k += 1;
                    } else {
                        echo "0";
                        $subsubstr[$k] = 0;
                        $k += 1;
                    }
                    echo "</td>";
                }
                echo "</tr>";
                $finalrecord[$i] = $ss . " , " . implode(' , ', ($subsubstr));
                $i+= 1;
                $ss = "";
            }
            ?>
        </table>
        <?php
        //created final record array to write cvs file
        /*echo "<br/>Content which I will write in cvs file <br/>";
        foreach ($finalrecord as $key => $re) {
            echo $re . "<br/>";
        }*/
        ?>
        <?php
        $file = fopen("result.csv", "w");
        foreach ($finalrecord as $key => $re) {
            fputs($file, $re . "\n");
        }

        fclose($file);
        echo "<br/> open resule.csv file";
        exit;
        ?>
    </table>
</body>
</html>