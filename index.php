<?php
    require "db.php";
    if(isset($_POST['send'])) {
        if(trim($_POST['name']) == "" || trim($_POST['message']) == ""){
            $err = 'Заполните все поля';
        } else {
            $comments = R::dispense('comments');
            $comments->name = $_POST['name'];
            $comments->time = date('H:m');
            $comments->date = date('d.m.Y');
            $comments->message = $_POST['message'];
        
            R::store($comments);
            header('location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Internet Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="align-items-end flex-column" >
                        <p><strong>Телефон: (499) 340-94-71</strong></p>
                        <p><strong>E-mail: <u>info@future-group.ru</u></strong></p>
                        <div class="pt-5 title"><h1>Комментарии</h1></div>
                      </div>
                </div>
                <div class="col-2 p-0">
                    <div class="header-logo">
                        <img src="./src/assets/logo.png" alt="Future Internet Agency" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="canva"></div>
    <main class="main">
        <div class="container">
            <div class="comments"> 
            <?php 
	                $all_comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC") ?> 	
	                <?php while($comment = mysqli_fetch_assoc($all_comments)) { ?> 
                        <div class="comments-block">
                            <div class="row">
                                <div class="col-1">
                                    <span><strong><?php echo $comment['name'] ?></strong></span>
                                </div>
		                        <div class="col-3">
			                        <span class="comments__time"><?php echo $comment['time'] ?></span>
			                        <span class="comments__date"><?php echo $comment['date'] ?></span>
		                        </div>
                            </div>
                            <p class="comment">Если включить мозги, то все элементарно Ватсон!</p>
                        </div>
                    <?php } ?>
            </div>
            <div class="comment-form-block">
                <div class="row">
                    <div class="col-6">
                        <form action="" name="commentForm" method="post">
                            <fieldset>
                                <legend>
                                    Оставить комментарий
                                </legend>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ваше имя</label>
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Введите ваше имя" name="name" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Ваш комментарий</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea" rows="5" name="message" required></textarea>
                                  </div>
                                  <div class="justify-content-md-end">
                                    <input type="submit" class="btn btn-outline-dark float-right bordered" name="send">
                                  </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer p-3">
        <div class="container">
            <div class="row">
                <div class="col-2 p-0">
                    <div class="footer-logo">
                        <img src="./src/assets/logo.png" alt="Future Internet Agency" class="img-fluid">
                    </div>
                </div>
                <div class="col-8 p-0 align-self-center">
                    <div class="footer-info pt-2">
                        <p><strong>Телефон: (499) 340-94-71<br>
                                   E-mail: <u>info@future-group.ru</u><br>
                                   Адрес: <u>115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</u></strong>
                        </p>
                        <div class="footer-info__c pt-4">
                        <?php 
                        $current_year = date ( 'Y' );
                        echo "© 2010-".$current_year; ?>
                            Future. Все права защищены
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>