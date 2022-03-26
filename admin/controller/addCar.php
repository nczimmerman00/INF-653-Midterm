<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<header>
    <?php include_once("../view/header.php"); ?>
    <div class="d-flex justify-content-center bg-secondary">
        <h1 class=text-light>Add Vehicle</h1>
    </div>
</header>
<body class="d-flex flex-column min-vh-100">
    <div class="container p-3 d-flex justify-content-center">
        <?php require_once("../../model/listSearchFunctions.php") ?>
        <form action="index.php" method="POST" id="addCar">
            <div class="row p-3">
                <div class=col-md-4>
                    <label for="addMake">Make: </label><br>
                    <select name="addMake" id="addMake">
                    <?php 
                    $itemsM = listMakes(); 
                    if ($itemsM) { 
                        foreach($itemsM as $item) : ?>
                            <option value="<?php echo $item['ID']; ?>">
                            <?php echo $item['make']?></option>
                        <?php endforeach ; } ?>
                    </select>
                </div>
                <div class=col-md-4>
                    <label for="addType">Type: </label><br>
                    <select name="addType" id="addType">
                    <?php 
                    $itemsT = listTypes(); 
                    if ($itemsT) { 
                        foreach($itemsT as $item) : ?>
                            <option value="<?php echo $item['id']; ?>">
                            <?php echo $item['type']?></option>
                        <?php endforeach ; } ?>
                    </select>
                </div>
                <div class=col-md-4>
                    <label for="addClass">Class: </label><br>
                    <select name="addClass" id="addClass">
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
            <div class="row p-3">
                <div class=col-md>
                    <label for="year">Year: </label><br>
                    <input type='number' min='1940' max='2023' id='year' name='year'>
                </div>
                <div class=col-md>
                    <label for='model'>Model: </label><br>
                    <input type='text' id='model' name='model'>
                </div>
                <div class=col-md>
                    <label for='price'>Price: </label><br>
                    <input type="number" min='0' max="999999" id='price' name='price'>
                </div>              
            </div>
            <div class="row p-3">
                <div class=text-center>
                    <button type="submit" name="action" value="addCar" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
<?php include_once("../view/footer.php"); ?>
</html>