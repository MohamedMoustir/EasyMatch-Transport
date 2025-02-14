<?php
require_once __DIR__ . '/../../Core/Database.php';

class Notification
{
    private $id_notification;
    private $titre;
    private $contenu;
    private $date_envoi;
    private $id_recepteur;
    private $pdo ;
    public function __construct($titre, $contenu, $id_recepteur, $date_envoi = null)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->id_recepteur = $id_recepteur;
        $this->date_envoi = $date_envoi;
        $this->pdo=Database::getInstance();
    }

    // 🔹 Getters
    public function getIdNotification()
    {
        return $this->id_notification;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getDateEnvoi()
    {
        return $this->date_envoi;
    }

    public function getIdRecepteur()
    {
        return $this->id_recepteur;
    }

    // 🔹 Setters

    public function setTitre($titre)
    {
        $this->titre = $titre;

    }

    public function setContenu($contenu)
    {

        $this->contenu = $contenu;

    }
    public function affichageNotifications($notif)
    {
        try {
           $id_conducteur = $notif->getIdRecepteur();
            $query = "SELECT * FROM notifications s JOIN conducteurs c ON s.id_recepteur = c.id_conducteur WHERE c.id_conducteur = :id_conducteur";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_conducteur', $id_conducteur, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($results)) {
                error_log("No notifications found in database");
            } else {
                error_log("Found " . count($results) . " notifications");
            }

            return $results;
        } catch (PDOException $e) {
            error_log("Error in affichageNotifications: " . $e->getMessage());
            return false;
        }
    }
}
?>