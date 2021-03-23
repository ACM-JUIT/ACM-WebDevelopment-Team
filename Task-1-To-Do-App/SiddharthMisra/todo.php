<?php
        $errors = "";

        $db=mysqli_connect('localhost','root','','todo');

        if(isset($_POST['submit'])){
            $task=$_POST['task'];
                if(empty($task)){
                $errors="You ,must fill in the task";
            }else{
                $task = $_POST['task'];
                $sql="INSERT INTO tasks (tasks) VALUES ('$task')";
                mysqli_query($db,$sql);
                header('location: todo.php');
            }
        }

        if(isset($_GET['del_task'])){
            $id = $_GET['del_task'];
            mysqli_query($db,"DELETE FROM tasks WHERE id=$id");
            header('location: todo.php');
        }

        $tasks = mysqli_query($db,"SELECT * FROM tasks ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo</title>
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <div class="heading">
        <h2>Todo list</h2>
    </div>

    <form method="POST" action="todo.php">
    <?php if (isset($errors)){?>
        <p> <?php echo $errors; ?> </p>
        <?php } ?>

        <input type="text" name="task" class="task-input">
        <button type="submit" class="task_btn" name="submit">Add task</button>
   
    
    </form>

    <table>
        <thread>
            <tr>
                <th>No.</th>
                <th>Task</th>
                <th>Remove</th>
            </tr>
        </thread>
    
        <tbody>
            <?php

            $i = 1; while($row = mysqli_fetch_array($tasks)){ ?>
            <tr>
                <td class="Number"><?php echo $i; ?></td>
                <td class="task"> <?php echo $row['tasks']; ?> </td>
                <td class="delete">
                    <a href=" todo.php?del_task=<?php echo $row['id']; ?>">x</a>
                </td>
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>
