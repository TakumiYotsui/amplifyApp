<?php



header("Access-Control-Allow-Origin: *");

//データベースと接続をする　　
try{
    // $dbh = new PDO($dsn, $user, $password);
    $db = new PDO('mysql:dbname=ranking_cat;charset=utf8mb4;host=127.0.0.1','root', 'QzhmpN54QeHv');

    
    //PHPで変数として保存できる形に書き込む
    $userData = array();

    //クリエの実行内容
    $sql = 'select * from scoreranking';

    foreach ($db->query($sql) as $row) {

        //DateTimeは強制的にstringになるのでstringとして送る
            $userData[]=array(
                'playerId'=>$row['id'],
                'playerName'=>$row['playerName'],
                'playerScore'=>$row['playerScore'],
                'dateTimeOfString'=>$row['DateTime']
                );
                
    }

}catch(PDOException $e){
    print("データベースの接続に失敗しました".$e->getMessage());
    die();
}

// 接続を閉じる
$db = null;


//配列の形をそろえる　（scoreRankingに格納されているようにする(Wrapperaに対応するようにする)）
$ranking_array =['scoreRanking' => $userData ];

//配列をJSON形式に変換
$jsonstr =  json_encode($ranking_array , JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo $jsonstr;
