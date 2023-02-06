<?php
if (isset ($_POST['date'])){?>
<div class ="date">
    <b>
        Новости:
    </b>
    <span>
        <?php 
        $get =$_POST['date'];
        $dbconn = pg_connect("host=localhost dbname =junior user = postgres password = 123456");
        $query= "select string from news where date ='$get'";
        $result = pg_query($dbconn,$query);
        while ($row = pg_fetch_assoc($result)){
            echo $row["string"];
        }
}?>
    </span>
</div>
   

