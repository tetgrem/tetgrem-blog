<?php
    use App\Services\Router;
    use App\Services\UserInfo;

    if ($_SESSION['user']['user_group'] == 5) {
        Router::redirect('/ban');
        die();
    }


$user_info = UserInfo::userInfo($_SESSION['user']);


?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$title . ' - Tetgrem.com'?></title>
<link rel="icon" href="http://tetgrem.com/img/icon.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="http://tetgrem.com/assets/css/style.css">