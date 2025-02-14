<?php

class Review {
    private $id_review;
    private $rating;
    private $commentaire;
    private $status;
    private $date_soumission;
    private $id_conducteur;
    private $id_expediteur;

    public function __construct( $rating, $commentaire, $status = 'En attente', $date_soumission = null, $id_conducteur, $id_expediteur) {
        $this->rating = $rating;
        $this->commentaire = $commentaire;
        $this->status = $status;
        $this->date_soumission = $date_soumission ? $date_soumission : date('Y-m-d H:i:s');
        $this->id_conducteur = $id_conducteur;
        $this->id_expediteur = $id_expediteur;
    }

    public function getIdReview() {
        return $this->id_review;
    }

    public function setIdReview($id_review) {
        $this->id_review = $id_review;
    }

    public function getRating() {
        return $this->rating;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getDateSoumission() {
        return $this->date_soumission;
    }

    public function setDateSoumission($date_soumission) {
        $this->date_soumission = $date_soumission;
    }

    public function getIdConducteur() {
        return $this->id_conducteur;
    }

    public function setIdConducteur($id_conducteur) {
        $this->id_conducteur = $id_conducteur;
    }

    public function getIdExpediteur() {
        return $this->id_expediteur;
    }

    public function setIdExpediteur($id_expediteur) {
        $this->id_expediteur = $id_expediteur;
    }

    public function addReview() {
        $stmt =Database::getInstance()->prepare("INSERT INTO reviews (rating, commentaire, date_soumission, id_conducteur, id_expediteur) 
                               VALUES (:rating, :commentaire, :date_soumission, :id_conducteur, :id_expediteur)");

        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':commentaire', $this->commentaire);
        $stmt->bindParam(':date_soumission', $this->date_soumission);
        $stmt->bindParam(':id_conducteur', $this->id_conducteur);
        $stmt->bindParam(':id_expediteur', $this->id_expediteur);

        return $stmt->execute();
    }

   
   
}

?>
