<?php
    include "db.php";
    $ime = $geslo = "";
    $db = odpriDB();
?>
<html>
<head>
    <title>Prijava</title>
</head>
<body>
    <form action="">
        <label for="ime">Ime</label>
        <br>
        <input id="ime" type="text" value="<?php echo $ime ?>">
        <br><br>
        <label for="geslo">Geslo</label>
        <br>
        <input type="password" id="geslo" value="<?php echo $geslo ?>">
        <br><br>
        <button>prijava</button>
    </form>
</body>
</html>