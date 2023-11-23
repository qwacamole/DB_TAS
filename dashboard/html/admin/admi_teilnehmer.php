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
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM teilnehmer");
        $stmt->execute();
    ?>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> Anrede </th>
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> E - Mail </th>
                    <th> Telefonnummer </th>
                    <th> Geburtsdatum </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        ?>
                        <tr>
                            <td> <?php echo $row["ID_Teilnehmer"]?></td>
                            <td> <?php echo $row["Anrede"]?></td>
                            <td> <?php echo $row["Vorname"]?></td>
                            <td> <?php echo $row["Nachname"]?></td>
                            <td> <?php echo $row["Email"]?></td>
                            <td> <?php echo $row["Telefonnummer"]?></td>
                            <td> <?php echo $row["Geburtsdatum"]?></td>
                            <td> <?php echo $row["Strasse"]?></td>
                            <td> <?php echo $row["Hausnummer"]?></td>
                            
                            <td style="display:flex;"> 
                                <form action="admi_teilnehmer_löschen.php" method="POST">
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" style="width:28px; height:28px; background-color: #ececec;">
                                        </button>
                                </form>
                            </td>
                        </tr>

                        <tr> 
                        <form action="admi_teilnehmer_aendern.php" method="POST">
                            <td> <input name="id" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="anrede" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="vorname" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="nachname" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="email" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="telnummer" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="geburtsdatum" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="strasse" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            <td> <input name="hausnr" type="text" style="text-align: center; border-radius: 12px; border: 1px solid Black; width: 90% !important;"></td>
                            
                            <td>  
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;"> 
                                            <img src="../../res/recycling.png" style="width:28px; height:28px;">
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