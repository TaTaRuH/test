<?php
        $dbconn = pg_connect("host=localhost dbname =junior user = postgres password = 123456");
        $str = file_get_contents('https://lenta.ru/tags/organizations/yandeks/?ysclid=ldn3la46d8105119288');
        $query = pg_query($dbconn,"DELETE FROM news WHERE id > 0");
        $query1=pg_query($dbconn,"ALTER SEQUENCE news_id_seq RESTART WITH 1");
preg_match_all('/<h3[^>]*?>(.*?)<\/h3>/si', $str, $news);    // НОВОСТИ
preg_match_all('/<time class="card-full-news__info-item card-full-news__date[^>]*?>(.*?)<\/time>/si', $str, $date); // ВРЕМЯ НОВОСТЕЙ
//print_r($matches[1]);
//print_r($date[1]);

foreach($news[1] as $key =>$value){
    $keys= $date[1][$key];
    $result = substr($keys, 7);
    echo ($result);
    $result1 = pg_query($dbconn,"INSERT INTO news(string,date) VALUES('$value','$result')");
    if ($key===4){
        break;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            ВВЕДИТЕ ДАТУ
        </title>
    </head>
    <body>
        <form action ="index_view.php" method = "POST">
            <p>
                <label for ="date">
                    Дата:
                </label>
                <input type ="text" name ="date"/>
            </p>
        </form>
    </body>
</html>

