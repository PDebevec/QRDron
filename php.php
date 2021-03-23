<html>
    <head>
        <title>QRdroni</title>
        <?php
        if(isset($_GET["id"])){
            include 'url.php';
            include 'db.php';
            $povezava = odpriDB();
            if($povezava->connect_error)
                die("neki je narobe " . $povezava->connect_error);
            
            $table = dobiPod($povezava, $params);

            if($table->num_rows > 0){
                while($row = $table->fetch_assoc()){
                    echo $row["id"] . $row["ime"] . $row["priimek"] . $row["lastnik"] . $row["dron"];
                }
            }else{ echo "nc"; }

            $povezava->close();
        }
        ?>
    </head>
        
    <body>
    </body>
</html>