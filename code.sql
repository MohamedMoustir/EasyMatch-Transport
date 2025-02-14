CREATE TYPE user_status AS ENUM ('Actif', 'Suspendu');
CREATE TYPE user_role AS ENUM ('Admin','Expediteur','Conducteur');
CREATE TYPE enum_status AS ENUM ('En attente', 'Validé', 'Refusé');
CREATE TYPE vehicule_type AS ENUM ('Voiture', 'Camion');
use Transport;

CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role user_role NOT NULL,
    status user_status DEFAULT 'Actif',
    isVerified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE conducteurs(
    id_conducteur INT PRIMARY KEY NOT NULL,
    permis VARCHAR(15) NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE vehicules(
    id_vehicule SERIAL PRIMARY KEY,
    immatriculation VARCHAR(25) NOT NULL,
    marque VARCHAR(50) NOT NULL,
    type vehicule_type NOT NULL,
    coffre INT NOT NULL,
    id_conducteur INT NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES conducteurs(id_conducteur) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE annonces(
    id_annonce SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    couverture VARCHAR(255) NOT NULL,
    status enum_status DEFAULT 'En attente',
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_conducteur INT NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES conducteurs(id_conducteur) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE reviews(
    id_review SERIAL PRIMARY KEY,
    rating INT NOT NULL,
    commentaire TEXT NOT NULL,
    status enum_status DEFAULT 'En attente',
    date_soumission TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_conducteur INT NOT NULL,
    id_expediteur INT NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES conducteurs(id_conducteur) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_expediteur) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE marchandises(
    id_marchandise SERIAL PRIMARY KEY,
    dimension REAL NOT NULL,
    id_expediteur INT NOT NULL,
    FOREIGN KEY (id_expediteur) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE villes(
    id_ville SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    region VARCHAR(50) NOT NULL
);

CREATE TABLE trajets(
    id_trajet SERIAL PRIMARY KEY,
    ville_depart INT NOT NULL,
    ville_arrivee INT NOT NULL,
    date_depart TIMESTAMP NOT NULL,
    date_arrivee TIMESTAMP NOT NULL,
    id_conducteur INT NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES conducteurs(id_conducteur) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ville_depart) REFERENCES villes(id_ville) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ville_arrivee) REFERENCES villes(id_ville) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE etapes(
    id_etape SERIAL PRIMARY KEY,
    id_trajet INT NOT NULL,
    ville_etape INT NOT NULL,
    ordre INT NOT NULL,
    FOREIGN KEY (id_trajet) REFERENCES trajets(id_trajet) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ville_etape) REFERENCES villes(id_ville) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE commandes(
    id_commande SERIAL PRIMARY KEY,
    id_marchandise INT NOT NULL,
    id_etape INT NOT NULL,
    status enum_status DEFAULT 'En attente',
    date_soumission TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_marchandise) REFERENCES marchandises(id_marchandise) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_etape) REFERENCES etapes(id_etape) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE notifications(
    id_notifictaion SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_recepteur INT NOT NULL,
    FOREIGN KEY (id_recepteur) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE villes 
ADD COLUMN lat DECIMAL(9,6) NOT NULL,
ADD COLUMN lon DECIMAL(9,6) NOT NULL;