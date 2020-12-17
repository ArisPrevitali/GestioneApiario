DROP DATABASE IF EXISTS gestione_apiario;
CREATE DATABASE gestione_apiario;
USE gestione_apiario;
CREATE TABLE utente(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nome_utente VARCHAR(40) NOT NULL,
password_utente VARCHAR(40) NOT NULL,
email_utente VARCHAR(40) NOT NULL
);
CREATE TABLE regina(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
anno_nascita DATE NOT NULL,
id_utente INT NOT NULL
);
CREATE TABLE calendario(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY
);
CREATE TABLE trattamento(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
data_inizio DATE NOT NULL,
data_fine DATE NOT NULL,
testo TEXT,
id_arnia INT NOT NULL
);
CREATE TABLE meteo(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
clima VARCHAR(50) NOT NULL,
temperatura INT(2) NOT NULL,
nome_luogo varchar(40) NOT NULL
);
CREATE TABLE luogo(
/**id INT AUTO_INCREMENT NOT NULL,*/
luogo VARCHAR(40) NOT NULL,
PRIMARY KEY(luogo)
);
CREATE TABLE arnia(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
colore ENUM('Bianco', 'Grigio', 'Rosso', 'Giallo', 'Verde', 'Azzurro', 'Blu', 'Rosa', 'Viola', 'Marrone', 'Arancione'),
testo TEXT,
abitata BOOLEAN NOT NULL,
nome_luogo varchar(40) NOT NULL,
id_regina INT NOT NULL,
id_utente INT NOT NULL
);
CREATE TABLE annotazione(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
data_ann DATE NOT NULL,
testo TEXT,
id_arnia INT NOT NULL
);
ALTER TABLE regina ADD FOREIGN KEY (id_utente) REFERENCES utente(id);
ALTER TABLE trattamento ADD FOREIGN KEY (id_arnia) REFERENCES arnia(id);
ALTER TABLE meteo ADD FOREIGN KEY (nome_luogo) REFERENCES luogo(luogo);
ALTER TABLE arnia ADD FOREIGN KEY (id_regina) REFERENCES regina(id);
ALTER TABLE arnia ADD FOREIGN KEY (id_utente) REFERENCES utente(id);
ALTER TABLE arnia ADD FOREIGN KEY (nome_luogo) REFERENCES luogo(luogo);
ALTER TABLE annotazione ADD FOREIGN KEY (id_arnia) REFERENCES arnia(id);