<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>List of classes</title>
</head>
<body style="background-color: plum">
<div class=" container bg-light mt-1 p-2 rounded-top shadow-lg ">
    <h1>All Classes</h1>
    <form method="get">
        <table id ='customers'>
            <tbody>
            <td>ID</td>
            <td>NAME</td>
            <td>LOCATION</td>
            <td>Class information</td>
            <?php foreach ($classes as $class): ?>
                <tr>
                    <td><?php echo $class['class_id'] ?></td>
                    <td><?php echo $class['class_name'] ?></td>
                    <td><?php echo $class['class_location']  ?></td>
                    <td><a href="?class=<?=$class["class_id"]?>"><button type="button" name="studentList" class="btn btn-primary"><?php echo $class['class_name']?></button></td></a>
                    <td><button type="submit" value="<?php echo $class['class_id'] ?>" name="AllClasses" class="btn btn-primary">Edit</button></td>
                    <td><button type="submit" formmethod="post" value="<?php echo $class['class_id'] ?>" name="delete" class="btn btn-primary">Delete</button></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form method="post">
        <button type="submit" name="addNewClass" class="btn btn-primary mt-1">Add Class</button>
        <button type="submit" name="backToMain" class="btn btn-primary mt-1">Go Back To Main Page</button>
    </form>
</div>
<style>
    .container {
        width: 50%;
    }
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
</style>
</body>
</html>
