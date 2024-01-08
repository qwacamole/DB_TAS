<!DOCTYPE html>
<html lang="de">
<head>
    <title>Beastmode | TAS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="header">
        <h2> Teilnehmerverwaltung

        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    </div>
    <?php
        include 'dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM betrieb");
        $stmt->execute();
    ?>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> BetriebsName </th>
                    <th> Telefonnummer </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th> Rechnungsmail </th>
                    <th> PLZ </th>
                    <th> Stadt </th>
                    <th> Land </th>
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        ?>

                        <tr> 
                        <form action="admi_betrieb_aendern.php" method="POST">
                            <td> <input value="<?php echo $row["ID_Betrieb"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["BetriebsName"]?>" name="betriebsname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" name="telefonnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Strasse"]?>" name="strasse" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Hausnummer"]?>" name="hausnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Rechnungsmail"]?>" name="rechnungsmail" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["PLZ"]?>" name="plz" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["stadt"]?>" name="stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["land"]?>" name="land" type="text" class="edit"></td>
                            
                            <td>  
                                    <button type="submit" name="id_betrieb" value="<?php echo $row["ID_Betrieb"]?>" style="border:none; background-color: #ececec;"> 
                                            <img src="../res/recycling.png" style="width:24px; height:24px;">
                                    </button>
                                    </form>
                            </td>
                            <td>
                                <form action="admi_betrieb_löschen.php" method="POST">
                                    <button type="submit" name="id_betrieb" value="<?php echo $row["ID_Betrieb"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../res/entfernen.png" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
        </table>
    </div>
</body>
</html>