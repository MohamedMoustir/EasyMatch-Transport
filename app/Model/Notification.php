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

    public  function Notification($Notifi)
    {
        try {

            $query = "INSERT INTO public.notifications( titre, contenu, id_recepteur)
	VALUES (:titre, :contenu, :id_recepteur);";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':titre' => $Notifi->getTitre(),
                ':contenu' => $Notifi->getContenu(),
                ':id_recepteur' => $Notifi->getIdRecepteur()
            ]);

            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de la création de l'annonce: " . $e->getMessage());
            return false;
        }
    }

}
