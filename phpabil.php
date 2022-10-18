<?php
//lissamine
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $file = "tooted.json";
    $data = json_decode(file_get_contents($file),TRUE);
    $newdata=$_POST;
    $data[] = $newdata;
    file_put_contents($file, json_encode($data,JSON_PRETTY_PRINT));

    echo "Andmed lisatud";
}
?>
<!DOCTYPE html>
<html>
<style>
    * {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0 auto;
    }
    h1 {
        color: #b0935f;
        font-size: 2em;
        margin-bottom: 0;
        text-align: center;
        padding-top: 20px;
    }
    .zigzag-table {
        border-collapse: separate;
        border-spacing: 0.25em 1em;
    }
    th,
    td {
        padding: 0.25em 0.5em;
        text-align: left;
    }
    td:nth-child(3) {
        text-align: center;
    }
    td {
        background-color: #d6e9ff;
    }
    th {
        background-color: #718eb0;
        color: #fff;
    }
    tbody tr:nth-child(even) {
        transform: rotate(1.5deg);
    }
    tbody tr:nth-child(odd) {
        transform: rotate(-1.5deg);
    }

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toote lisamine</title>
</head>
<body>
<h2>Toote sisestamine</h2>
<table>
    <form action="" method="post" name="vorm1">
        <tr>
            <td><label for="nimetus">Toote nimetus:</label></td>
            <td><input type="text" name="nimetus" id="nimetus" autofocus></td>
        </tr>
        <tr>
            <td><label for="kirjeldus">Kirjeldus:</label></td>
            <td><input type="text" name="kirjeldus" id="kirjeldus"></td>
        </tr>
        <tr>
            <td><label for="hind">Hind:</label></td>
            <td><input type="text" name="hind" id="hind"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" value="Sisesta"></td>
            <td></td>
        </tr>
    </form>
</table>
<table class="zigzag-table">
    <tr>
        <th>nimetus</th>
        <th>kirjeldus</th>
        <th>hind</th>
    </tr>
    <?php
    $file=file_get_contents("tooted.json");
    $data=json_decode($file,TRUE);
    foreach ($data as $voti=>$vaartus){
        $nimetus= $vaartus['nimetus'];
        $kirjeldus= $vaartus['kirjeldus'];
        $hind= $vaartus['hind'];
        echo "<tr>";
        echo "<td>".$nimetus."</td>";
        echo "<td>".$kirjeldus."</td>";
        echo "<td>".$hind."</td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="tooted.json"> JSON fail</a>
</body>
</html>