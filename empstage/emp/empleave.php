<?php
require_once('process/dbh.php');

$sql = "SELECT employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token 
        FROM employee, employee_leave 
        WHERE employee.id = employee_leave.id 
        ORDER BY employee_leave.token";

$result = mysqli_query($conn, $sql);
?>

<html>
<head>
    <title>Demandes de Congé | Admin Panel | System Gestion de Distribution</title>
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

		.sidebar h2,h1 {
		
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

        .options a {
            margin: 0 5px;
            color: white;
            background-color: blue;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .options a:hover {
            background-color: #ef32bd;
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
        <h2>Menu Admin</h2><br><br><br>
        <ul>
            <li><a href="aloginwel.php">Accueil</a></li>
            <li><a href="addemp.php">Ajouter un employé</a></li>
            <li><a href="viewemp.php">Voir les employés</a></li>
            <li><a href="assign.php">Assigner un rapport</a></li>
            <li><a href="assignproject.php">État des produits</a></li>
            <li><a href="salaryemp.php">Tableau des produits</a></li>
            <li <a class="homered" href="empleave.php">Produits retournés</a></li>
            <li><a href="alogin.html">Se déconnecter</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <h2>Produits retournés</h2>
        <table>
            <tr>
                <th>Emp. ID</th>
                <th>produit.ID</th>
                <th>Nom</th>
                <th>Date </th>
                <th>Nomber de produit</th>
                <th>Raison</th>
                <th>Statut</th>
                <th>Options</th>
            </tr>

            <?php
            while ($employee = mysqli_fetch_assoc($result)) {
                $date1 = new DateTime($employee['start']);
                $date2 = new DateTime($employee['end']);
                $interval = $date1->diff($date2);

                echo "<tr>";
                echo "<td>" . $employee['id'] . "</td>";
                echo "<td>" . $employee['token'] . "</td>";
                echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";
                echo "<td>" . $employee['start'] . "</td>";
                echo "<td>" . $employee['end'] . "</td>";
                echo "<td>" . $employee['reason'] . "</td>";
                echo "<td>" . $employee['status'] . "</td>";
                echo "<td class='options'>
                        <a href=\"approve.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Êtes-vous sûr de vouloir approuver cette demande ?')\">Approuver</a>
                        <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Êtes-vous sûr de vouloir annuler cette demande ?')\">Annuler</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>