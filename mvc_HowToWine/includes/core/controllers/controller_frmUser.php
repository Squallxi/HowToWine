<?php
	switch ($action){
        case 'enregistrer':{
            require_once "includes/core/models/dao/daoLesson.php";
            require_once "includes/core/models/dao/daoPerson.php";
            require_once "includes/core/models/dao/daoAvatar.php";

			$lessons = getAllLessons();
			$avatars = getAllAvatar();
				
			if (empty($_POST)){
				// J'arrive sur le formulaire et je l'initie à vide
				$unePersonne = new Person();
				
			}else{
                
			// Je viens de valider le formulaire : j'ai cliqué sur Submit
            $login = htmlspecialchars($_POST['champLogin'], ENT_QUOTES,'UTF-8');
            $mail = htmlspecialchars($_POST['champMail'], ENT_QUOTES,'UTF-8');
            $mdp = trim($_POST['champMdp']);

            // Diverse verification de sécurité sur les champs saisies dans le formulaire
            if(!empty($login) && !empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL) && !empty($mdp) && 
            strlen($login) <= 20 && preg_match("/^[a-zA-Z]+$/", $login) && 
            strcmp($_POST['champMdp'], $_POST['champVerifyMdp']) == 0 && strlen($mdp) >= 10){

                $unePersonne = new Person(
                    $login,
                    $mail,
                    $_POST['champPath'],
                    // Encryptage du mot de passe avant envoi dans la bdd
                    password_hash($mdp, PASSWORD_ARGON2ID),
                );
                if(newAccount($unePersonne)){
					header('Location: ?page=index');
				}else{
					$message = "Veuillez renseigner les champs requis !";
				}
            } 
        }
            require_once "includes/core/views/frm_inscription.phtml";
            break;
        }
        case 'profil':{
            require_once "includes/core/models/dao/daoLesson.php";
            require_once "includes/core/models/dao/daoPerson.php";

            $_SESSION['iduser'] = getUserIdByLogin($_SESSION['login']);

            $informationsProfil = getAllInformationsForProfil($_SESSION['iduser']);

            // Correction à apporter sur les valeurs 1,1 pour rendre la fonction dynamique
            $answersProfil = getAllAnswersForProfil($_SESSION['iduser'],1,1);
            $lessons = getAllLessons();
            require_once "includes/core/views/view_profil.phtml";
            break;
        }
        case 'login':{
            require_once "includes/core/models/dao/daoPerson.php";
            if (!empty($_POST)){
                $loginSaisi = $_POST['champLogin'];
                $mdpSaisi = $_POST['champMdp'];
    
                if (userExists($loginSaisi)){
                    print('Mon login existe :-)');
                    if (checkAuth($loginSaisi, $mdpSaisi)){
                        $_SESSION['login'] = $loginSaisi;
                        $_SESSION['iduser'] = getUserIdByLogin($loginSaisi);
                        header('Location: index.php');
                    }else{
                        $message = "Mauvaises informations d'identification !";
                    }
                }else{
                    $message = "Cet utilisateur n'existe pas !";
                }
            }
            
            break;
        }
    
        case 'logout':{
            if (isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
            header('Location: index.php');
            break;
        }
    
        default:{
    
        }
    }