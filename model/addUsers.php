<?php

require_once 'db.php';
require_once 'checker.php';

if (isset($_POST['wight']) && $_POST['wight']==88) {

//Разбираем массив ретвитнувших который нам возвращает Twitter-API-PHP
    foreach ($ppl as $person){
//Чекаем на наличие id в базе данных
        $exist = $pdo->prepare("SELECT twitter_id FROM retwitters WHERE twitter_id =".$person['id']."");
        $exist->execute();
        $result = $exist->fetch();
//если exist говорит что такого id в базе нет, то записываем в базу
        if($result==false){
            $rec1 = $person['id'];
            $rec2 = $person['name'];
            $rec3 = $person['image'];
            $rec4 = $person['nick'];

            $record = $pdo->prepare("INSERT INTO retwitters (twitter_id, name, nick, photo) VALUES('$rec1','$rec2','$rec4','$rec3')");
            $record->execute();
        }

//если такой id в базе есть, ьл сравниваем его фотку с той которую отдал Twitter-API-PHP, если не совпадают, то перезаписываем
        if($result!=false){
            $existPhoto = $pdo->prepare("SELECT photo FROM retwitters WHERE twitter_id =".$person['id']."");
            $existPhoto->execute();
            $photo = $existPhoto->fetchall();

            if ($photo[0][0] != $person['image']){
                $recPhoto = $person['image'];
                $recordPhoto = $pdo->prepare("UPDATE retwitters SET photo = '$recPhoto' WHERE twitter_id =".$person['id']."");
                $recordPhoto->execute();
            }
        }
// Обновление имен
//        if($result!=false){
//            $existName = $pdo->prepare("SELECT name FROM retwitters WHERE twitter_id =".$person['id']."");
//            $existName->execute();
//            $name = $existPhoto->fetchall();
//
//            if ($name[0][0] != $person['name']){
//                $recName = $person['name'];
//                $recordName = $pdo->prepare("UPDATE retwitters SET name = '$recName' WHERE twitter_id =".$person['id']."");
//                $recordName->execute();
//            }
//        }

    }
}

//Получает всех ретвитнувших из базы
$query = $pdo->prepare("SELECT * FROM retwitters");
$query->execute();
if ($query->rowCount()!=0) {
    $retwrs = $query->fetchall(PDO::FETCH_ASSOC);
}

