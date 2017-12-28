<?php
require_once 'model/addUsers.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Retweeters</title>
    <link rel="shortcut icon" href="//abs.twimg.com/favicons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
          crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<section>
    <div class="container d-flex control-buttons">
        <button id="update" type="submit" class="update_form btn " name="update" value="1">Обновить таблицу</button>
        <button id="random" class="btn " data-toggle="modal" data-target="#myModal" name="random" value="2">Крутить барабан!</button>
    </div>
</section>
<section>
    <div class=" users">
        <?php foreach ($retwrs as $user) : ?>
            <div class="user" data-number="<?= $user['id']?>">
                <div class="user__photo">
                    <p><?= $user['id']?></p>
                    <img src="<?= $user['photo']?>" alt="user photo" width="100%" height="300">
                </div>
                <div class="user__info">
                    <p class="display-4" ><?= $user['name']?></p>
                    <a href="https://twitter.com/<?= $user['nick'] ?>" target="_blank">Профиль</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <h1 class="modal__title">Победитель</h1>
            <div class="getWinner"></div>
        </div>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
<script>
    $('#random').on('click', function () {
        //let max = '<?php //echo count($retwrs)+1?>//';
        function randomInteger() {
            let rand = 1 - 0.5 + Math.random() * ('<?php echo count($retwrs)+1?>' - 1 + 1);
            rand = Math.round(rand);
            return rand;
        };
        let content = $('[data-number='+randomInteger()+']').find('.user__photo, .user__info');
        $('.getWinner').html(content);
    })

</script>
<script>
 $('#update').on('click', function () {
        $.ajax({
            type: 'POST',
            url: '/model/addUsers.php',
            data: 'wight=88',
            success: function () {
                location.reload();
            }
        });
    });
</script>

</html>