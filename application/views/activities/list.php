<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <tr>
        <td> <?php var_dump($activities) ?></td>
        <td> <?php 
        echo "<pre>";
        var_dump($activities->$row["id"]);
        echo "</pre>"; ?></td>
        <!-- <td> <a href="<?php echo base_url('activities/edit/'.$activities->activities["id"]);?>">Edit</a></td> -->
    </tr>
</body>

</html>     