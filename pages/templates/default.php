<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= App::getInstance()->titre_page;?></title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/persoStyle.css">
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1024px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>


<body>
  <?php
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
  ?>
    <div class="wrapper">
        <div class="container-fluid">
          
          <?php if($auth->logged()){ ?>
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="?p=accueil">Accueil</a>
              </div>
              <ul class="nav navbar-nav">
                <!-- <li><a href="?p=commercial.all">Commerciaux</a></li> -->
                <li><a href="?p=client.all">Clients</a></li>
                <li><a href="?p=prestataire.all">Prestataires</a></li>
                <li><a href="?p=contrat.all">Contrats</a></li>
                <li><a href="?p=intervention.all">Interventions</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="?p=info_user"><span class="glyphicon glyphicon-user"></span>  <?= $auth->get_pseudo() ?></a></li>
                <li><a href="index.php?p=delogin"><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
              </ul>
            </div>
          </nav>
          <?php }
          ?>

         
          <div class="starter-template">
              <?= $content; ?>
          </div>


        </div>
    </div>
</body>