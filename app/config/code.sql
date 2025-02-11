CREATE TYPE user_status AS ENUM ('Actif', 'Suspendu');

CREATE TABLE Users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(50),
    password VARCHAR(255),
    status VARCHAR(50),
    date_inscription DATETIME,
    isVerified BOOLEAN DEFAULT 0
);

CREATE TABLE Conducteur (
    id_conducteur INT PRIMARY KEY,
    permis VARCHAR(15),
    FOREIGN KEY (id) REFERENCES Users(id)
);

CREATE TABLE Vehicle (
    id INT PRIMARY KEY,
    matricule VARCHAR(255),
    marque VARCHAR(255),
    type VARCHAR(255),
    utilite INT,
    FOREIGN KEY (utilite) REFERENCES Conducteur(id)
);

CREATE TABLE Annonce (
    id INT PRIMARY KEY,
    titre VARCHAR(255),
    date_publication DATETIME,
    conducteur_id INT,
    FOREIGN KEY (conducteur_id) REFERENCES Conducteur(id)
);

CREATE TABLE Reviews (
    id INT PRIMARY KEY,
    commentaire TEXT,
    rating INT,
    date_soumission DATETIME,
    expediteur_id INT,
    FOREIGN KEY (expediteur_id) REFERENCES Expediteur(id)
);

CREATE TABLE Marchandise (
    id INT PRIMARY KEY,
    date_livraison DATETIME,
    dimension VARCHAR(255)
);

CREATE TABLE Commande (
    id INT PRIMARY KEY,
    date_ville VARCHAR(255),
    statut VARCHAR(50),
    date_envoi DATETIME,
    date_livraison DATETIME,
    marchandise_id INT,
    FOREIGN KEY (marchandise_id) REFERENCES Marchandise(id)
);

CREATE TABLE Trajet (
    id INT PRIMARY KEY,
    ville_depart VARCHAR(255),
    ville_arrive VARCHAR(255),
    date_depart DATETIME,
    date_arrive DATETIME,
    conducteur_id INT,
    FOREIGN KEY (conducteur_id) REFERENCES Conducteur(id)
);

CREATE TABLE Etape (
    id INT PRIMARY KEY,
    nom_ville VARCHAR(255),
    ordre INT,
    trajet_id INT,
    FOREIGN KEY (trajet_id) REFERENCES Trajet(id)
);

CREATE TABLE Ville (
    id INT PRIMARY KEY,
    code VARCHAR(50),
    region VARCHAR(255)
);

CREATE TABLE NotificationBehavior (
    id INT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    type VARCHAR(50),
    date_envoi DATETIME
);