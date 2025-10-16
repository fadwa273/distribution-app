<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('process/dbh.php');
$sql = "SELECT * FROM `produit` WHERE eid = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($conn));
}
?>

<html>
<head>
    <title>Employee Panel | System Gestion de Distribution</title>
    <link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
    <header>
        <nav>
            <h1>Gestion de Distribution</h1>
            <ul id="navli">
                <li><a class="homeblack" href="eloginwel.php?id=<?php echo $id ?>">Home</a></li>
                <li><a class="homeblack" href="myprofile.php?id=<?php echo $id ?>">Me Profile</a></li>
                <li><a class="homered" href="empproject.php?id=<?php echo $id ?>">Produit</a></li>
                <li><a class="homeblack" href="applyleave.php?id=<?php echo $id ?>">Rapport</a></li>
                <li><a class="homeblack" href="elogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="divider"></div>
    <div id="divimg">
        <table>
            <tr>
                <th align="center">ID du produit</th>
                <th align="center">Nom rapport</th>
                <th align="center">Échéance</th>
                <th align="center">Nombre de produit</th>
                <th align="center">nomber</th>
                <th align="center">Status</th>
                <th align="center">Option</th>
            </tr>

            <?php
            while ($employee = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $employee['pid'] . "</td>";
                echo "<td>" . $employee['pname'] . "</td>";
                echo "<td>" . $employee['duedate'] . "</td>";
				echo "<td>" . $employee['product_type'] . "</td>"; // Vérification avec isset()
                echo "<td>" . $employee['mark'] . "</td>";
                echo "<td>" . $employee['status'] . "</td>";
                echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>