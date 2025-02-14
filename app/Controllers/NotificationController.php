<?php
require_once  '../Model/Notification.php'; 
require_once '../../Core/Database.php';
require_once '../../Core/Controller.php';
require_once '../../Core/Router.php';
class NotificationController {
    use Controller;
    private  Notification $notificationModel;

  

    public function affichageNotification() {

        $id_conducteur = isset($_SESSION["id"]) ? $_SESSION["id"] : 5;
        $notificationModel = new Notification('','',$id_conducteur);
        $notificat = $notificationModel->affichageNotifications($notificationModel);

         require_once '../../View/conducteur/dashbard.php';
        
    }
}

?>
