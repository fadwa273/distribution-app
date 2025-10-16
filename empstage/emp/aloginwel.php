<?php 
require_once ('process/dbh.php');

// Récupérer le nombre total d'employés
$sql_emp = "SELECT COUNT(*) as total_employees FROM employee";
$result_emp = mysqli_query($conn, $sql_emp);
$row_emp = mysqli_fetch_assoc($result_emp);
$total_employees = $row_emp['total_employees'];

// Récupérer le nombre total de projets en cours
$sql_proj = "SELECT COUNT(*) as total_projects FROM produit WHERE status = 'Due'";
$result_proj = mysqli_query($conn, $sql_proj);
$row_proj = mysqli_fetch_assoc($result_proj);
$total_projects = $row_proj['total_projects'];

// Récupérer le nombre total de demandes de congé en attente
$sql_leave = "SELECT COUNT(*) as total_leaves FROM employee_leave WHERE status = 'Pending'";
$result_leave = mysqli_query($conn, $sql_leave);
$row_leave = mysqli_fetch_assoc($result_leave);
$total_leaves = $row_leave['total_leaves'];

// Récupérer le nombre total de produits retournés
$sql_return = "SELECT COUNT(*) as total_returns FROM employee_leave WHERE status = 'Approved'";
$result_return = mysqli_query($conn, $sql_return);
$row_return = mysqli_fetch_assoc($result_return);
$total_returns = $row_return['total_returns'];
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | System Gestion de Distribution</title>
    <link rel="stylesheet" type="text/css" href="styleemplogin.css">

    <style>
		 .top-border {
            width: 200%;
            height: 50px;
            background-color: blue;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        /* Style pour la barre latérale */
		
        
        .sidebar {
            width: 250px;
            background: blue;
            color: #fff;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
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
            background:#ef32bd;
        }

        /* Style pour le tableau de bord horizontal */
        .dashboard {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            margin-left: 270px; /* Pour éviter que le tableau de bord ne chevauche la barre latérale */
            flex-wrap: wrap;
        }
        .dashboard-item {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px blue;
            text-align: center;
            width: 22%;
            margin: 10px;
        }
        .dashboard-item h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .dashboard-item p {
            margin: 10px 0 0;
            font-size: 18px;
            color: #666;
        }
        .dashboard-item:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Style pour le contenu principal */
        .main-content {
            margin-left: 270px; /* Pour éviter que le contenu ne chevauche la barre latérale */
            padding: 20px;
        }
		h1 {
  font-weight: 400;
}
 h1 ,h2{
  display: inline;
  font-family: 'Lobster', cursive;
  font-weight: 400;
  font-size: 32px;
  float: left;
  margin-top: 0px;
  margin-right: 10px;
  color: #fff;
}
.homered {
    background-color: #ef32bd; /* Couleur de fond */
    color: #fff; /* Couleur du texte */
    padding: 15px; /* Espacement interne */
    border-radius: 5px; /* Bordures arrondies */
}

/* Style pour le lien à l'intérieur de l'élément li */
.homered a {
    color: #fff; /* Couleur du texte du lien */
    text-decoration: none; /* Supprimer le soulignement du lien */
}
    </style>

</head>

<body>
<div class="top-border">
<h1>SGD</h1><br>
</div>
</div>
    <!-- Barre latérale -->
    <div class="sidebar">
	<br><br><br>
        <h2>Menu Admin</h2><br><br>
        <ul>
            <li <a class="homered"href="aloginwel.php">Accueil</a></li>
            <li><a href="addemp.php">Ajouter un employé</a></li>
            <li><a href="viewemp.php">Voir les employés</a></li>
            <li><a href="assign.php">Assigner un rapport</a></li>
            <li><a href="assignproject.php">État des produits</a></li>
            <li><a href="salaryemp.php">Tableau des produits</a></li>
            <li><a href="empleave.php">Produits retournés</a></li>
            <li><a href="alogin.html">Se déconnecter</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <!-- Tableau de bord horizontal --><br><br>
        <div class="dashboard">
            <div class="dashboard-item">
                <h3><?php echo $total_employees; ?></h3>
                <p>Employés</p>
            </div>
            <div class="dashboard-item">
                <h3><?php echo $total_projects; ?></h3>
                <p>Projets en cours</p>
            </div>
            <div class="dashboard-item">
                <h3><?php echo $total_leaves; ?></h3>
                <p>Demandes de congé</p>
            </div>
            <div class="dashboard-item">
                <h3><?php echo $total_returns; ?></h3>
                <p>Produits retournés</p>
            </div>
        </div>

        <!-- Le reste du contenu de la page (classement, projets, etc.) -->
        <div id="divimg">
            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Classement Employé</h2>
            <table>
                <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Emp. ID</th>
                    <th align="center">Nom</th>
                    <th align="center">Point</th>
                </tr>
                <?php
                    $sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
                    $result = mysqli_query($conn, $sql);
                    $seq = 1;
                    while ($employee = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$seq."</td>";
                        echo "<td>".$employee['id']."</td>";
                        echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                        echo "<td>".$employee['points']."</td>";
                        $seq+=1;
                    }
                ?>
            </table>
        </div>
    </div>
	
</body>
</html>