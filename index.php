<?php 
    $connection = mysqli_connect("localhost", "root", "", "wedkowanie");
    $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
    $result1 = $connection->query($query);
    $query = "SELECT nazwa, wojewodztwo, akwen FROM `ryby` INNER JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE wystepowanie LIKE '%rzeki%'";
    $result2 = $connection->query($query);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="Lewo1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
                <?php
                    while ($row = mysqli_fetch_assoc($result2))
                    {
                ?>
                <li><?php echo $row['nazwa']; ?> pływa w rzece <?php echo $row['akwen']; ?>, <?php echo $row['wojewodztwo']; ?></li>
                <?php
                    }
                ?>
        </ol>
    </div>
    <div id="Lewo2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result1))
                {
            ?>
            <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nazwa']; ?></td>
                    <td><?php echo $row['wystepowanie']; ?></td>
            </tr>
            <?php
                    }
            ?>
        </table>
    </div>
    <div id="Prawo">
        <figure>
            <img src="pliki1/ryba1.jpg" alt="Sum">
            <figcaption><a href="kwerendy.txt">Pobierz kwerendy</a></figcaption>
        </figure>
    </div>
    <footer>
        <p>Stonę wykonał: 13</p>
    </footer>
</body>
</html>
<?php 
    $connection -> close();
?>
