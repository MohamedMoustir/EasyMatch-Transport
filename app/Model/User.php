<?php

class User{
    // Properties
    protected ?int $id;
    protected ?string $nom;
    protected ?string $prenom;
    protected ?string $email;
    protected ?string $phone;
    protected ?string $password;
    protected ?string $role;
    protected ?string $date_creation;
    protected ?string $status = 'Actif';
    protected ?bool $isVerified = false;
    private $database;

    // Constructor
    public function __construct($id,$nom,$prenom,$email,$phone,$password,$role,$date_creation,$status,$isVerified){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
        $this->date_creation = $date_creation;
        $this->status = $status;
        $this->isVerified = $isVerified;
    }


    // Getters
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getDateCreation(){
        return $this->date_creation;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getIsVerified(){
        return $this->isVerified;
    }


    // Setters
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setDateCreation($date_creation){
        $this->date_creation = $date_creation;
    }
    public function setStatus($status){
        $this->status = $status;
    }


    // Methods
    
}