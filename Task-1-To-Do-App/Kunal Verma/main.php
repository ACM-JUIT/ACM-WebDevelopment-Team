<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="wrapper">
        <header>Todo App</header>
        <form class="whole-form" action="main.php" method="POST">
            <div class="inputField">
                <input type="text" name="item" placeholder="Add your new todo">
                <button><i class="fas fa-plus"></i>
                </button>
            </div>
        </form>


</body>

</html>

<?php

echo "List Of Tasks To Be Done:". "<br>";
$fptr = fopen("new.txt", "a") or die("Unable to open");
$task_store = $_POST['item'];

while (! feof($fptr)) {

    $count = 1;
    # to write something in the file
    fwrite($fptr, $task_store."\n");
    # closing the file
    fclose($fptr);
    break;
}
# appending the above file to add content

$fptr = fopen("new.txt", "r") or die("Unable to open");

while(! feof($fptr)){
    echo fgets($fptr);
    echo "<br>";
}

fclose($fptr);
?>