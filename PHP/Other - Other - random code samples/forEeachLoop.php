<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $num = 0;
    $favNum = array(1, 2, 3, 4, 6, 89, 964, 9549874, 9646847864);
    $sum = 0;
    foreach ($favNum as $num){
        $sum += $num;
        echo "my favorite number is $sum <br />";
    };
?>
</body>
</html>