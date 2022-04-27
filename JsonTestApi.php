<?php

//CORSを許可するためにワイルドカードでheaderに設置する。世界公開するAPIには必須。
header("Access-Control-Allow-Origin: * ");

//配列の形をそろえる　（scoreRankingに格納されているようにする(Wrapperaに対応するようにする)）
// $ranking_array =['scoreRanking' => $userData ];


$ranking_array3 =['scoreRanking' => 
[
                ['playerNumber'=>'1',
                'playerName'=>'笹木',
                'playerScore'=>'230',
                'playerAchivementDate'=>'2021-03-24',
                'playerAchivementTime'=>'23:34'
                ],
                ['playerNumber'=>'1',
                'playerName'=>'上田',
                'playerScore'=>'554',
                'playerAchivementDate'=>'2021-03-24',
                'playerAchivementTime'=>'23:34'
                ],
                ['playerNumber'=>'1',
                'playerName'=>'いとう',
                'playerScore'=>'2300',
                'playerAchivementDate'=>'2021-03-24',
                'playerAchivementTime'=>'23:34'
                ]
]
];


//配列をJSON形式に変換
$jsonstr =  json_encode($ranking_array3 , JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


echo $jsonstr;

/*
function timestamp2datetime($timestamp){
    
    //MySQLのdatetime型をPHPのタイムスタンプに変換。
   $aaas = date("Y-m-d H:i:s", $timestamp);
    
    return   $aaas ;
  }

*/

/*
 以下テスト用

*/
