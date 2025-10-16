<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
   

    <!-- Title Page-->
    <title>ajouter Employee | System Gestion de Distribution </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
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
        <h2>Menu Admin</h2><br><br><br>
        <ul>
            <li><a href="aloginwel.php">Accueil</a></li>
            <li <a class="homered"href="addemp.php">Ajouter un employé</a></li>
            <li><a href="viewemp.php">Voir les employés</a></li>
            <li><a href="assign.php">Assigner un rapport</a></li>
            <li><a href="assignproject.php">État des produits</a></li>
            <li><a href="salaryemp.php">Tableau des produits</a></li>
            <li><a href="empleave.php">Produits retournés</a></li>
            <li><a href="alogin.html">Se déconnecter</a></li>
        </ul>
    </div>
    <div class="divider"></div>




    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h3 class="title">Informations sur inscription</h3>
                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">


                        

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Prénom" name="firstName" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Nom" name="lastName" required="required">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" required="required">
                        </div>
                        <p>Date de Naissance</p>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="Date de Naissance" name="birthday" required="required">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Genre</option>
                                            <option value="Male">homme</option>
                                            <option value="Female">femme</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Numéro de contact" name="contact" required="required" >
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="NID" name="nid" required="required">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Adresse" name="address" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Department" name="dept" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Degré" name="degree" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Salaire" name="salary">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="fichier" name="file">
                        </div>







                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
