<?php

header("Access-Control-Allow-Origin: *");


//データベースと接続をする　　
try{
    // DateTimeをつかって既に登録されているか確認する。

    $floga = 0 ;
    // $dbh = new PDO($dsn, $user, $password);
    $db = new PDO('mysql:dbname=ranking_cat;charset=utf8mb4;host=127.0.0.1','root', 'QzhmpN54QeHv');

    

    //クリエの実行内容
    $sql = 'select * from scoreranking';

    foreach ($db->query($sql) as $row) {


        if($row['id'] == $_POST['idP']){

            $floga = 1 ;
        }
    }

    if($floga == 1){

        
        $stt2 = $db->prepare( 'UPDATE scoreranking SET playerName  = :nam WHERE id = :idpo');

        $stt2->bindparam(':nam' , $_POST['nameP']);
        $stt2->bindparam(':idpo' , $_POST['idP']);
       //実行は最後に選択する
       $stt2->execute();

    }else if($floga == 0){

             //prepareでSQL命令を準備する
             $stt = $db->prepare('INSERT INTO scoreranking (playerName , playerScore , DateTime )
             VALUES (:nam , :sco , :da )');
     
             $stt->bindparam(':nam' , $_POST['nameP']);
             $stt->bindparam(':sco' , $_POST['scoreP']);
             $stt->bindparam(':da' , $_POST['dayP']);
             //実行は最後に選択する
             $stt->execute();

             echo"接続に成功した";

    }
                
    

}catch(PDOException $e){
    print("データベースの接続に失敗しました".$e->getMessage());
    die();
}

// 接続を閉じる
$db = null;

echo"post";
