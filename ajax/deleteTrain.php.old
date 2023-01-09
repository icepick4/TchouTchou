<!DOCTYPE html>
<html>

<body>

    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_TEXTES . LANG . '.php');
    require_once(PATH_MODELS . 'StaffDAO.php');
    require_once(PATH_MODELS . 'TrainDAO.php');
    $staff = new StaffDAO();
    $train = new TrainDAO();

    if ($staff->isService(intval($_GET['user_id'])) || $staff->isAdministrator(intval($_GET['user_id']))) {
        if ($train->getNbrTravelPlanned(intval($_GET['train_id']))['NBR'] == 0) {
            $train->deleteTrain(intval($_GET['train_id']));
        }
    } else {
        header("Location: index.php?page=maintenance");
        die();
    }
