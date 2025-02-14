<?php
require_once __DIR__ . '/../Model/Notification.php'; 
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Controller.php';
require_once __DIR__ . '/../../Core/Router.php';
class NotificationController {
    
   

  

    public function affichageNotification() {

  
        $id_conducteur = isset($_SESSION["id"]) ? $_SESSION["id"] : null;
        $notificationModel = new Notification('','',$id_conducteur);
        $notificat = $notificationModel->affichageNotifications($notificationModel);


  
        require_once __DIR__ . '/../View/conducteur/dashboard.php';
            
    }
}

?>
