<?php

class Annonce {
    private ?int $id;
    private int $conducteur_id;
    private string $depart;
    private string $destination;
    private string $date_depart;
    private float $prix;
    private string $status;

    public function __construct($conducteur_id, $depart, $destination, $date_depart, $prix, $status = 'Disponible') {
        $this->conducteur_id = $conducteur_id;
        $this->depart = $depart;
        $this->destination = $destination;
        $this->date_depart = $date_depart;
        $this->prix = $prix;
        $this->status = $status;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getConducteurId() { return $this->conducteur_id; }
    public function getDepart() { return $this->depart; }
    public function getDestination() { return $this->destination; }
    public function getDateDepart() { return $this->date_depart; }
    public function getPrix() { return $this->prix; }
    public function getStatus() { return $this->status; }

    // Setters
    public function setStatus($status) { $this->status = $status; }

    // Methods
    public function save($db) {
        $stmt = $db->prepare("INSERT INTO annonces (conducteur_id, depart, destination, date_depart, prix, status) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$this->conducteur_id, $this->depart, $this->destination, $this->date_depart, $this->prix, $this->status]);
    }
}
?>