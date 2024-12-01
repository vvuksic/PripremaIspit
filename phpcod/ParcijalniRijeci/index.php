<?php
include_once "funkcije.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riječi</title>
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" ){
        if($_POST['rijec'] != NULL) {
            
            $rijec=htmlentities($_POST['rijec']);
            brojiSlova($rijec);
            header("Location:" .$_SERVER['PHP_SELF']);
       } 
       else {
            echo "Molim upišite riječ"; 
       }
}
  
?>

    <table border="1">
    <td width="50%">
    <form action="" method="POST">
        
       
        <p><label for="rijec">Unesite riječ:</label></p>
        <p><input type="text" name="rijec" id="rijec"></p>
        <p><button class="button" type="submit">Dodaj rijec</button></p>
        
    </form>
    </td>   
        <td width="50%">
        <h1>Riječi</h1>
                <?php
                $rijeci = otvoriDatoteku();
                if($rijeci): 
                ?>
                <table>
               
                    <tr>
                        <th>Riječ</th>
                        <th>Duljina</th>
                        <th>Suglasnici</th>
                        <th>Samoglasnici</th>
                    </tr>
                    <?php foreach($rijeci as $rijec): ?>
                        <tr>
                            <td><?php echo  $rijec ['rijec']?></td>
                            <td><?php echo $rijec['brojslova'] ?></td>
                            <td><?php echo $rijec['brsugl'] ?></td>
                            <td><?php echo $rijec['brsamo'] ?></td>
  
                        </tr>
                    <?php endforeach ?>
                  
                </table>
                <?php else: ?>
                    <p>Nema riječi u datoteci!</p>
                <?php endif ?>
        </td>

    </table>
   

   
    
</body>
</html>