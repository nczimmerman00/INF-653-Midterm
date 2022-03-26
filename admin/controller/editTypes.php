<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Types</title>
</head>
<?php include_once("../view/header.php"); ?>
<header class="d-flex justify-content-center bg-secondary">
        <h1 class=text-light>Remove Vehicle Type</h1>
</header>
<body class="d-flex flex-column min-vh-100">
<div class="container p-3 d-flex justify-content-center">
    <br>
    <table class=table-condensed>
        <tr><th>Name</th></tr>
        <?php 
        require_once("../../model/listSearchFunctions.php");
        $types = listTypes();
        foreach($types as $item) : ?>
            <tr>
                <td><?php echo $item['type']; ?></td>
                <td>
                    <form action="index.php" method="POST" id="deleteType">
                        <input type="hidden" name="id" id="id" value="<?php echo $item['id']; ?>">
                        <button type='submit' name='action' value='deleteType' class="btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ; ?>
    </table>    
</div>
<div class="container-fluid bg-secondary p-2">
    <h1 class="text-light text-center">Add Vehicle Type</h1></header>
</div>
<div class="container d-flex justify-content-center p-3">
    <form action="index.php" method="POST" id="addType">
        <label for="name">Name: </label>
        <input type="text" id='name' name='name'>
        <button type='submit' name="action" value="addType" class=btn-success>Submit</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</div>
</body>
<?php include_once("../view/footer.php") ?>
</html>