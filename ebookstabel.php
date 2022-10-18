<?php
//lissamine
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $file = "ebooks.json";
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
<h2>ebook adding</h2>
<table>
    <form action="" method="post" name="vorm1">
        <tr>
            <td><label for="language">language:</label></td>
            <td><input type="text" name="language" id="language" autofocus></td>
        </tr>
        <tr>
            <td><label for="edition">edition:</label></td>
            <td><input type="text" name="edition" id="edition"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" value="Sisesta"></td>
            <td></td>
        </tr>
    </form>
</table>
<table class="zigzag-table">
    <tr>
        <th>language</th>
        <th>edition</th>
    </tr>
    <?php
    $file=file_get_contents("ebooks.json");
    $data=json_decode($file,TRUE);
    foreach ($data as $book){
        echo "<tr>";
        echo "<td>".$book['language']."</td>";
        echo "<td>".$book['edition']."</td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="ebooks.json"> JSON fail</a>
</body>
</html>
