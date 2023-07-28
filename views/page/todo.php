<?php
    use App\Services\Select;

    $items = Select::selectTodo('1');
    $items_done = Select::selectTodo('0');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'views/components/header.php';
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            passCheck()
        });
    </script>
</head>
<body class="main__body">
<!-- Header -->
<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <?php
                require_once 'views/components/navbar.php';
                ?>
            </div>
        </div>
    </div>
</header>
<!-- Main Page -->
<main class="container">
    <section class="todo__section">
        <form action="/todo/add" method="post">
            <div class="mb-3">
                <label for="todo" class="form-label">Завдання:</label>
                <input type="text" name="todo" class="form-control" id="todo" required>
                <div class="invalid-feedback">
                    Будь ласка, введіть завдання.
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Добавити</button>
        </form>
       <div class="todo__now">
           <h1>Зробити:</h1>
           <ol class="list-group list-group-numbered" >
               <?php foreach ($items as $el) { ?>
               <li class="list-group-item list-group-item-todo" aria-disabled="true">
                   <span><?=$el['text']?></span>
                   <div class="todo__btns">
                       <form action="/todo/done?id=<?=$el['id']?>" method="post">
                           <button type="submit" class="btn btn-success">Зроблено</button>
                       </form>
                       <form action="/todo/delete?id=<?=$el['id']?>" method="post">
                           <button type="submit" class="btn btn-danger">Видалити</button>
                       </form>
                   </div>
               </li>
               <? } ?>
           </ol>
       </div>


        <div class="todo__done">
            <h1>Зроблено:</h1>
            <ol class="list-group list-group-numbered">
               <?php foreach ($items_done as $el) { ?>
                <li class="list-group-item list-group-item-todo list-group-item-todo-done" aria-disabled="true">
                    <span><?=$el['text']?></span>
                    <div class="todo__btns">
                        <form action="/todo/delete?id=<?=$el['id']?>" method="post">
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                    </div>
                </li>
                <?php } ?>
            </ol>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>

</html>