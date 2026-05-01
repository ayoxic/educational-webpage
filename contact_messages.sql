USE insea_site;

CREATE TABLE IF NOT EXISTS messages_contact (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(160) NOT NULL,
    sujet VARCHAR(180) NOT NULL,
    message TEXT NOT NULL,
    copie_email TINYINT(1) NOT NULL DEFAULT 0,
    date_envoi DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);