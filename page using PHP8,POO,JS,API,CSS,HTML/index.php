<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

  
      if(isset($_GET['page'])) {
          $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
      }
      if(empty($url[0])) {
          require "./controller/controllerHome.php";
      }
      else{
          switch($url[0]) {
                case "Home":
                    if(empty($url[1])) {
                    require "./controller/controllerHome.php";
                    break;
                    }
                case "LoginToPartyWithTheBest":
                    if (empty($url[1])) {
                    require "./controller/controllerVerifCompte.php";
                    break;
                    }
                case "connect":
                    if (empty($url[1])) {
                    require "./controller/controllerLogin.php";
                    break;
                    }
                case "ChoisirShooter":
                    if(empty($url[1])) {
                    require "./controller/controllerHave.php";
                    break;
                }
                case "SelectionnerIdea":
                    if(empty($url[1])) {
                    require "./controller/controllerIdea.php";
                    break;
                    }
                case "Create":
                    if(empty($url[1])) {
                    require "./controller/controllerCreateAccount.php";
                    break;
                    }
                case "verifyEmail":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "passwordReset":
                    if(empty($url[1])) {
                    require "./controller/controllerPassReset.php";
                    break;
                    }
                case "whoops!":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "TryAgain":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "AlreadyPartying!":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "Verified":
                    if(empty($url[1])){
                        require './controller/controllerGenErr.php';
                        break;
                    }
                case "NotPartying":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                        }
                case "TuEsPartiTôt!":
                    if(empty($url[1])) {
                    require "./controller/controllerLogoff.php";
                    break;
                        }
                case "685732145AdMinAreABossInDaHouse!":
                    if(empty($url[1])) {
                    require "controller/controllerCreatePartyItem.php";
                    break;
                    }
                case "sop489kh62375AdMinAreABossInDaHouse!":
                    if(empty($url[1])) {
                    require "./controller/controllerModifyParty.php";
                    break;
                    }
                case "Admin":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "admin":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                    }
                case "Login":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                        }
                case "login":
                    if(empty($url[1])) {
                    require "./controller/controllerGenErr.php";
                    break;
                        }
                case "PartyOn!":
                    if(empty($url[1])) {
                    require "./controller/controllerCurate.php";
                    break;
                        }
                    
                }
                
            }

        
            
 