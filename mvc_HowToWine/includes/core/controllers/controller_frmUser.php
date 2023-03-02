<?php
	switch ($action){
        case 'enregistrer':{
            require_once "includes/core/models/dao/daoLesson.php";
            require_once "includes/core/models/dao/daoPerson.php";
            require_once "includes/core/models/dao/daoAvatar.php";
			$lessons = getAllLessons();
			$avatars = getAllAvatar();
			// J'arrive sur le formulaire
			$unePersonne = new Personne();
				
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unePersonne = new Personne();
				
			}else{
			// Je viens de valider le formulaire : j'ai cliqué sur Submit
			$unePersonne = new Personne(
                //La méthode post récupère les valeurs par l'attribut name
				$_POST['champLogin'],
				$_POST['champMail'],
                $_POST['champPath'],
				$_POST['champMdp']);

				if (newAccount($unePersonne)){
					header('Location: ?page=index');
				}else{
					$message = "Veuillez renseigner les champs requis !";
				}
            }

            require_once "includes/core/views/frm_inscription.phtml";
            break;
        }
        case 'profil':{
            require_once "includes/core/models/dao/daoLesson.php";
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
            
            //require_once "includes/core/views/form_auth.phtml";
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