<?php
include_once "funkcije.php";

session_start();
if (isset($_SESSION["posjete"])){
    $_SESSION['posjete'] += 1;
}else{
    $_SESSION['posjete'] = 1;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Omiljeno jelo</title>


</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['ime']) && !empty($_POST['jelo']) ){
        $ime=htmlentities($_POST['ime']);
        $jelo=htmlentities($_POST['jelo']);
        setcookie("jelo", $jelo, time() + (86400 * 30), "/",false,true); // 86400 = 1 day

        dodajSlog($ime,$jelo);
        header("Location:" .$_SERVER['PHP_SELF']);
        $_SESSION['posjete'] -= 1;
       
       
    }
  
?>
    <table>
        <h1>Omiljena jela</h1>
        
        <p>Posjetili ste ovu stranicu <b><?php if (isset($_SESSION["posjete"])){echo $_SESSION["posjete"];} ?> </b> puta.</p>
        <td>
            
        <form action="" method="POST">
            <tr>
                <td>
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jelo">Jelo:</label>   
                    <input type="text" name="jelo" id="jelo" value="<?php if (isset($_COOKIE["jelo"])){ echo $_COOKIE["jelo"];}else{echo '';} ?>" required>  
                </td>
            </tr>
            <tr>
                <td>
                    <button class="button" type="submit">Dodaj jelo</button>
                </td>
            </tr>
        </form>
        </td>
    </table>


</body>
</html>
