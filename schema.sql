CREATE DATABASE IF NOT EXISTS insea_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE insea_site;

CREATE TABLE annees_scolaires (
    id_annee INT AUTO_INCREMENT PRIMARY KEY,
    annee_libelle VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE filieres (
    id_filiere INT AUTO_INCREMENT PRIMARY KEY,
    filiere_nom VARCHAR(120) NOT NULL,
    filiere_code VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE niveaux (
    id_niveau INT AUTO_INCREMENT PRIMARY KEY,
    niveau_nom VARCHAR(80) NOT NULL,
    niveau_code VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE semestres (
    id_semestre INT AUTO_INCREMENT PRIMARY KEY,
    semestre_nom VARCHAR(80) NOT NULL,
    semestre_code VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE classes (
    id_classe INT AUTO_INCREMENT PRIMARY KEY,
    id_filiere INT NOT NULL,
    id_niveau INT NOT NULL,
    id_semestre INT NOT NULL,
    classe_code VARCHAR(40) NOT NULL UNIQUE,
    FOREIGN KEY (id_filiere) REFERENCES filieres(id_filiere),
    FOREIGN KEY (id_niveau) REFERENCES niveaux(id_niveau),
    FOREIGN KEY (id_semestre) REFERENCES semestres(id_semestre)
);

CREATE TABLE periodes (
    id_periode INT AUTO_INCREMENT PRIMARY KEY,
    id_semestre INT NOT NULL,
    periode_nom VARCHAR(80) NOT NULL,
    periode_code VARCHAR(20) NOT NULL UNIQUE,
    nb_semaines INT NOT NULL DEFAULT 7,
    FOREIGN KEY (id_semestre) REFERENCES semestres(id_semestre)
);

CREATE TABLE semaines (
    id_semaine INT AUTO_INCREMENT PRIMARY KEY,
    id_periode INT NOT NULL,
    semaine_numero INT NOT NULL,
    FOREIGN KEY (id_periode) REFERENCES periodes(id_periode)
);

CREATE TABLE modules (
    id_module INT AUTO_INCREMENT PRIMARY KEY,
    id_semestre INT NOT NULL,
    module_nom VARCHAR(120) NOT NULL,
    module_code VARCHAR(30) NOT NULL UNIQUE,
    module_nb_credits INT NOT NULL,
    FOREIGN KEY (id_semestre) REFERENCES semestres(id_semestre)
);

CREATE TABLE matieres (
    id_matiere INT AUTO_INCREMENT PRIMARY KEY,
    id_module INT NOT NULL,
    matiere_nom VARCHAR(120) NOT NULL,
    matiere_code VARCHAR(30) NOT NULL UNIQUE,
    matiere_coef DECIMAL(4,2) NOT NULL,
    FOREIGN KEY (id_module) REFERENCES modules(id_module)
);

CREATE TABLE types_enseignement (
    id_type INT AUTO_INCREMENT PRIMARY KEY,
    type_nom VARCHAR(40) NOT NULL,
    type_code VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE matiere_enseignement (
    id_matiere INT NOT NULL,
    id_type INT NOT NULL,
    volume_horaire INT NOT NULL DEFAULT 0,
    PRIMARY KEY (id_matiere, id_type),
    FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere),
    FOREIGN KEY (id_type) REFERENCES types_enseignement(id_type)
);

CREATE TABLE professeurs (
    id_professeur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(80) NOT NULL,
    prenom VARCHAR(80) NOT NULL,
    email VARCHAR(160) UNIQUE
);

CREATE TABLE affectations (
    id_affectation INT AUTO_INCREMENT PRIMARY KEY,
    id_professeur INT NOT NULL,
    id_matiere INT NOT NULL,
    id_classe INT NOT NULL,
    id_annee INT NOT NULL,
    FOREIGN KEY (id_professeur) REFERENCES professeurs(id_professeur),
    FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere),
    FOREIGN KEY (id_classe) REFERENCES classes(id_classe),
    FOREIGN KEY (id_annee) REFERENCES annees_scolaires(id_annee)
);

CREATE TABLE emplois_temps (
    id_emploi INT AUTO_INCREMENT PRIMARY KEY,
    id_affectation INT NOT NULL,
    jour VARCHAR(20) NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    salle VARCHAR(30),
    FOREIGN KEY (id_affectation) REFERENCES affectations(id_affectation)
);

CREATE TABLE groupes (
    id_groupe INT AUTO_INCREMENT PRIMARY KEY,
    id_classe INT NOT NULL,
    groupe_code VARCHAR(30) NOT NULL,
    FOREIGN KEY (id_classe) REFERENCES classes(id_classe)
);

CREATE TABLE etudiants (
    id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
    cne VARCHAR(30) NOT NULL UNIQUE,
    nom VARCHAR(80) NOT NULL,
    prenom VARCHAR(80) NOT NULL,
    email VARCHAR(160) UNIQUE
);

CREATE TABLE inscriptions (
    id_inscription INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT NOT NULL,
    id_classe INT NOT NULL,
    id_groupe INT,
    id_annee INT NOT NULL,
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id_etudiant),
    FOREIGN KEY (id_classe) REFERENCES classes(id_classe),
    FOREIGN KEY (id_groupe) REFERENCES groupes(id_groupe),
    FOREIGN KEY (id_annee) REFERENCES annees_scolaires(id_annee)
);

CREATE TABLE evaluations (
    id_evaluation INT AUTO_INCREMENT PRIMARY KEY,
    id_matiere INT NOT NULL,
    evaluation_nom VARCHAR(80) NOT NULL,
    coefficient DECIMAL(4,2) NOT NULL,
    FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere)
);

CREATE TABLE notes (
    id_note INT AUTO_INCREMENT PRIMARY KEY,
    id_evaluation INT NOT NULL,
    id_etudiant INT NOT NULL,
    note DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (id_evaluation) REFERENCES evaluations(id_evaluation),
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id_etudiant)
);

CREATE TABLE messages_contact (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(160) NOT NULL,
    sujet VARCHAR(180) NOT NULL,
    message TEXT NOT NULL,
    copie_email TINYINT(1) NOT NULL DEFAULT 0,
    date_envoi DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO annees_scolaires (annee_libelle) VALUES ('2025-2026'), ('2026-2027');
INSERT INTO filieres (filiere_nom, filiere_code) VALUES ('Data and Software Engineering', 'DSE'), ('Data Science', 'DS');
INSERT INTO niveaux (niveau_nom, niveau_code) VALUES ('Première année', '1A'), ('Deuxième année', '2A'), ('Troisième année', '3A');
INSERT INTO semestres (semestre_nom, semestre_code) VALUES ('Semestre 1', 'S1'), ('Semestre 2', 'S2'), ('Semestre 3', 'S3'), ('Semestre 4', 'S4'), ('Semestre 5', 'S5'), ('Semestre 6', 'S6');
INSERT INTO types_enseignement (type_nom, type_code) VALUES ('Cours', 'CR'), ('Travaux dirigés', 'TD'), ('Travaux pratiques', 'TP');
