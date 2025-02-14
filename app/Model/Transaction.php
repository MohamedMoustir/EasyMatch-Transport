<?php

require_once __DIR__ . '/../../Core/Database.php';

class Transaction {
    private ?int $id;
    private int $expediteur_id;
    private int $conducteur_id;
    private int $annonce_id;
    private float $montant;
    private string $status;

    public function __construct($expediteur_id, $conducteur_id, $annonce_id, $montant, $status = 'En attente') {
        $this->expediteur_id = $expediteur_id;
        $this->conducteur_id = $conducteur_id;
        $this->annonce_id = $annonce_id;
        $this->montant = $montant;
        $this->status = $status;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getExpediteurId() { return $this->expediteur_id; }
    public function getConducteurId() { return $this->conducteur_id; }
    public function getAnnonceId() { return $this->annonce_id; }
    public function getMontant() { return $this->montant; }
    public function getStatus() { return $this->status; }

    // Setters
    public function setStatus($status) { $this->status = $status; }

    // Methods
    public function save($db) {
        $stmt = $db->prepare("INSERT INTO transactions (expediteur_id, conducteur_id, annonce_id, montant, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$this->expediteur_id, $this->conducteur_id, $this->annonce_id, $this->montant, $this->status]);
    }
}
