<?php echo $book['User']['name']; ?>さん

<?php echo $book['Book']['title']; ?> 、の結果発表がタイムオーバーになりました。
http://bookbookmaker.com/books/<?php echo $book['Book']['id']; ?>


Betポイント合計 : <?php echo $book['Book']['bet_all_total']; ?> point
Betユーザー合計 : <?php echo $book['Book']['user_all_count']; ?> 人

結果発表の予定時間から24時間経過しても結果が選択されなかった場合、該当Bookは無効となります。
無効になったBookにBetがあった場合、タイムオーバーがカウントされます。

[Book詳細]
<?php echo $book['Book']['title']; ?>

Book URL : http://bookbookmaker.com/books/<?php echo $book['Book']['id']; ?>

Bet スタート： <?php echo CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M'); ?>

Bet 終了 ： <?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M'); ?>

結果発表 ： <?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M'); ?>

詳細 :
<?php echo $book['Book']['details']; ?>

結果確認　：　<?php echo $book['Book']['announcement_type']; ?>

<?php echo $book['Book']['announcement_name']; ?>

<?php echo $book['Book']['announcement']; ?>


