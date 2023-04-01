<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$_SESSION["favcolor"] = "Green";
$_SESSION["favanimal"] = 1;

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>