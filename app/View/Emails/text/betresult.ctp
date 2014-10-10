<?php echo $user['User']['name']; ?>さん

Betの結果が発表されました。

<?php
foreach($books as $book_id=>$bets){
    echo $bets['Book']['Book']['title']."\n";
    echo 'http://bookbookmaker.com/books/'.$bets['Book']['Book']['id']."\n";
    foreach($bets['Bet'] as $bet){
        echo $bet['content_title'].' : Bet '.$bet['betpoint'].' : Get '.$bet['result_point']."\n";
    }
    echo "\n";
}
?>

<?php echo $user['User']['name']; ?> さんのポイント残高は、「<?php echo $user['User']['point']; ?> point」 です。
詳細はこちら、
http://bookbookmaker.com/users/<?php echo $user['User']['id']; ?>

