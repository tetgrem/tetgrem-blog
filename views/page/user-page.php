<?php
    use App\Services\Select;
    use App\Services\UserInfo;
    use App\Services\Router;

    $user = substr($_GET['q'], 1);



    if ($user === $_SESSION['user']['username']) Router::redirect('/profile');

    $user_query = Select::selectOneUser($user);
    $user_array = mysqli_fetch_assoc($user_query);
    $user_page_info = UserInfo::userInfo($user_array);



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
    <section class="profile__section">
        <h1>Сторінка профілю коричтувача</h1>
        <?php if (isset($_SESSION['message'])) {


            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast fide show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message'] . '
                </div>
            </div>
        </div>';
            $_SESSION['message'] = null;
        }
        ?>
        <div class="profile__block">
            <?php if ($user_page_info['group'] === 'Забанений') { ?>
                <div class="ban__block">
                    <span>Забанений!</span>
                </div>
            <?php } ?>
            <img src="<?=$user_page_info['avatar']?>" alt="avatar">
            <div class="profile__info">
                <div class="top__item">
                    <h2><?=$user_page_info['full_name']?></h2>
                    <h3>@<?=$user_array['username']?></h3>
                    <h3><?=$user_array['email']?></h3>
                    <h4>Група: <b><?=$user_page_info['group']?></b></h4>
                    <h4>Кількість постів: <b><?=$user_page_info['count']?></b></h4>
                    <a href="/posts/<?=$user_array['username']?>" class="btn btn-success" style="margin-top: 25px; margin-bottom: 25px">Дивитись пости цього користувача</a>



                </div>

               <?php if ($user_array['user_group'] != 3 && $_SESSION['user']['user_group'] == 2 || $_SESSION['user']['user_group'] == 3):?>
                   <div class="bottom__item">

                       <?php if ($user_page_info['avatar'] != '/img/avatar-placeholder.png'): ?>

                       <button type="button"  class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal11">
                           Видалити аватар
                       </button>

                       <!-- Modal -->
                       <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити аватар цього користувача?</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>

                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                       <form action="/user/admin-delete-avatar?user=<?=$user_array['username']?>" method="post">
                                           <button type="submit"  class="btn btn-danger">Видалити</button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <?php endif; ?>

                       <?php if ($_SESSION['user']['user_group'] == 3) { ?>

                       <a href="/admin/user-edit?user=<?=$user_array['username']?>" class="btn btn-warning" style="color: white">Редагувати</a>
                       <?php } ?>
                       <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                           Видалити
                       </button>

                       <!-- Modal -->
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити цього користувача?</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       Ви збираєтесь видалити <?=$user_array['username']?>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                       <form action="/user-delete?user=<?=$user_array['username']?>" method="post">
                                           <button type="submit"  class="btn btn-danger">Видалити</button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>

</html>