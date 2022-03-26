<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);
$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
$class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
$addMake = filter_input(INPUT_POST, 'addMake', FILTER_UNSAFE_RAW);
$addType = filter_input(INPUT_POST, 'addType', FILTER_UNSAFE_RAW);
$addClass = filter_input(INPUT_POST, 'addClass', FILTER_UNSAFE_RAW);
$year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);
$sort = filter_input(INPUT_POST, 'sort', FILTER_UNSAFE_RAW);
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);

require_once("../model/adminFunctions.php");
if($action == "deleteCar") {
    if (!$id) {
        $error = "No ID given, try again.";
        include("../view/error.php");
    }
    else {
        deleteCar($id);
    }
} else if ($action == "addCar") {
    if (!$year || !$addMake || !$model || !$addType || !$addClass || !$price) {
        $error = "Invalid item data. Check all fields and try again.";
        include("../view/error.php");
    }
    else {
        addCar($year, $addMake, $model, $addType, $addClass, $price);
    } 
} else if($action == "addType") {
    if (!$name) {
        $error = "No name given, try again.";
        include("../view/error.php");
    }
    else {
        addType($name);
    }
} else if ($action == "deleteType") {
    if (!$id) {
        $error = "No type ID given, try again.";
        include("../view/error.php");
    }
    else {
        deleteType($id);
    }
} else if ($action == "addMake") {
    if (!$name) {
        $error = "No make name given, try again.";
        include("../view/error.php");
    }
    else {
        addMake($name);
    }
} else if ($action == 'deleteMake') {
    if (!$id) {
        $error = 'No make ID given, try again.';
        include("../view/error.php");
    } else {
        deletemake($id);
    }
} else if ($action == "addClass") {
    if (!$name) {
        $error = "No class name given, try again.";
        include("../view/error.php");
    }
    else {
        addClass($name);
    }
} else if ($action == 'deleteClass') {
    if (!$id) {
        $error = 'No class ID given, try again.';
        include("../view/error.php");
    } else {
        deleteClass($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Zippy Used Autos</title>
</head>
<?php include_once("../view/header.php"); ?>
<body class="d-flex flex-column min-vh-100">
    <div class="p-3 d-flex justify-content-center bg-secondary">
        <?php include_once("../../model/listSearchFunctions.php") ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="search">
            <div class=row>
                <div class=col-md>
                    <select name="make" id="make">
                        <option value=''>View All Makes</option>
                        <?php 
                        $itemsM = listMakes(); 
                        if ($itemsM) { 
                            foreach($itemsM as $item) : ?>
                                <option value="<?php echo $item['ID']; ?>">
                                <?php echo $item['make']?></option>
                        <?php endforeach ; } ?>
                    </select>
                </div>
                <div class=col-md>
                    <select name="type" id="type">
                        <option value=''>View All Types</option>
                        <?php 
                        $itemsT = listTypes(); 
                        if ($itemsT) { 
                            foreach($itemsT as $item) : ?>
                                <option value="<?php echo $item['id']; ?>">
                                <?php echo $item['type']?></option>
                        <?php endforeach ; } ?>
                    </select>
                </div>
                <div class=col-md>
                    <select name="class" id="class">
                        <option value=''>View All Classes</option>
                        <?php 
                        $itemsC = listClasses(); 
                        if ($itemsC) { 
                            foreach($itemsC as $item) : ?>
                                <option value="<?php echo $item['ID']; ?>">                        
                                <?php echo $item['class']?></option>
                        <?php endforeach ; } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text-light">Order By:</label>
                </div>
                <div class=col-sm>
                    <input type="radio" id="price" name="sort" value="price" class="form-check-input">
                    <label for="price" class="text-light">Price</label>
                </div>
                <div class=col-sm>
                    <input type="radio" id="year" name="sort" value="year" class="form-check-input">
                    <label for="year" class="text-light">Year</label>
                </div>
            </div>
            <div class=row>
                <div class=text-center>
                    <input type="submit" id="submit" name="submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
    <?php
    $vehicles = listCars($make, $type, $class, $sort);
    if ($vehicles) { ?>
        <div class="w-75 p-3 mx-auto">
            <table class=table>
                <tr>
                    <th>Year</th><th>Make</th><th>Model</th>
                    <th>Type</th><th>Class</th><th>Price</th> 
                </tr>
                <?php 
                    foreach($vehicles as $item) : ?>
                        <tr>
                            <td><?php echo $item['year']; ?></td>
                            <td><?php echo $item['make']; ?></td>
                            <td><?php echo $item['model']; ?></td>
                            <td><?php echo $item['type']; ?></td>
                            <td><?php echo $item['class']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td>
                                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="deleteCar">
                                    <input type="hidden" name="id" id="id" value="<?php echo $item['id']; ?>">
                                    <button type='submit' name='action' value='deleteCar' class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                <?php endforeach ; ?>
            </table>
        </div>
    <?php } ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
<?php include_once("../view/footer.php"); ?>
</html>