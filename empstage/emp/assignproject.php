<?php
require_once('process/dbh.php');

$sql = "SELECT * FROM `produit` ORDER BY `duedate` DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($conn));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>État des Produits | Admin Panel | System Gestion de Distribution</title>
    <link rel="stylesheet" type="text/css" href="styleview.css">
    <style>
        /* Style pour la barre supérieure */
        .top-border {
            width: 100%;
            height: 50px;
            background-color: blue;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            color: #fff;
            line-height: 50px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Style pour la barre latérale */
        .sidebar {
            width: 250px;
            background: blue;
            color: #fff;
            position: fixed;
            height: 100%;
            top: 50px;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h2, h1 {
            display: inline;
            font-family: 'Lobster', cursive;
            font-weight: 400;
            font-size: 32px;
            float: left;
            margin-top: 0px;
            margin-right: 10px;
            color: #fff;
        }

        h1 {
            font-weight: 400;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar ul li:hover {
            background: #ef32bd;
        }

        /* Style pour le contenu principal */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            margin-top: 70px;
        }

        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: blue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .homered {
            background-color: #ef32bd;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
        }

        .homered a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Barre supérieure -->
    <div class="top-border">
        <h1>SGD</h1>
    </div>

    <!-- Barre latérale -->
    <div class="sidebar">
        <h2>Menu Admin</h2><br><br>
        <ul>
            <li><a href="aloginwel.php">Accueil</a></li>
            <li><a href="addemp.php">Ajouter un employé</a></li>
            <li><a href="viewemp.php">Voir les employés</a></li>
            <li><a href="assign.php">Assigner un rapport</a></li>
            <li <a class="homered" href="assignproject.php">État des produits</a></li>
            <li><a href="salaryemp.php">Tableau des produits</a></li>
            <li><a href="empleave.php">Produits retournés</a></li>
            <li><a href="alogin.html">Se déconnecter</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <h2>État des Produits</h2>
        <table>
            <tr>
                <th>ID Rapport</th>
                <th>Emp. ID</th>
                <th>Nom du Rapport</th>
                <th>Date</th>
                <th>Nom de produits</th>
                <th>Nombre</th>
                <th>Statut</th>
                <th>Option</th>
            </tr>

            <?php
            while ($employee = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $employee['pid'] . "</td>";
                echo "<td>" . $employee['eid'] . "</td>";
                echo "<td>" . $employee['pname'] . "</td>";
                echo "<td>" . $employee['duedate'] . "</td>";
                echo "<td>" . $employee['product_type'] . "</td>"; // Correction ici
                echo "<td>" . $employee['mark'] . "</td>";
                echo "<td>" . $employee['status'] . "</td>";
                echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Marquer</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>