<?php
$xml=simplexml_load_file("reisida.xml");
function getRiiks($xml){
    $array=getMaakonds($xml);
    return $array;
}

function getMaakonds($riik){
    $result=array($riik);
    $childs=$riik -> maakond;

    if(empty($childs))
        return $result;

    foreach ($childs as $child){
        $array=getMaakonds($child);
        $result=array_merge($result, $array);
    }
    return $result;
}

$riiks=getRiiks($xml);
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Rikk</title>
</head>
<body>
    <h1>Reisida ja ringreis madalate hindadega</h1>

<table border="1">
    <tr>
        <th>Riik</th>
        <th>Maakond</th>
        <th>Linn</th>
        <th>Linn pindala</th>
    </tr>
    <?php
    foreach ($riiks as $riik){
    echo '<tr>';
        //echo '<td>'.($).'</td>';
        echo '<td>'.($riik -> nimi).'</td>';
        echo '<td>'.($riik -> nimi).'</td>';
        echo '<td>'.($riik -> linn -> nimi).'</td>';
        echo '<td>'.($riik -> pindala).'</td>';


        //echo '<td>' . (int)($yearNow - $childrenYear) . '</td>';
        echo '</tr>';

    }
    ?>
</table>
</body>
</html>