CREATE DATABASE gestione_apiario;
USE gestione_apiario;
CREATE TABLE utente(
id INT NOT NULL PRIMARY KEY,
nome_utente VARCHAR(40) NOT NULL,
password_utente VARCHAR(40) NOT NULL,
email_utente VARCHAR(40) NOT NULL
);
CREATE TABLE regina(
id INT NOT NULL PRIMARY KEY,
anno_nascita DATE NOT NULL,
id_arnia INT NOT NULL
);
CREATE TABLE calendario(
id INT NOT NULL PRIMARY KEY
);
CREATE TABLE annotazione(
id INT NOT NULL PRIMARY KEY,
data_inizo DATE NOT NULL,
data_fine DATE NOT NULL,
testo TEXT NOT NULL,
id_arnia INT NOT NULL
);
CREATE TABLE meteo(
id INT NOT NULL PRIMARY KEY,
clima VARCHAR(50) NOT NULL,
temperatura INT(2) NOT NULL,
id_luogo INT NOT NULL
);
CREATE TABLE luogo(
id INT NOT NULL PRIMARY KEY
);
CREATE TABLE arnia(
id INT NOT NULL PRIMARY KEY,
colore BOOLEAN NOT NULL,
id_regina INT NOT NULL,
id_utente INT NOT NULL,
id_luogo INT NOT NULL
);

ALTER TABLE regina
ADD FOREIGN KEY (id_arnia) REFERENCES arnia(id);
ALTER TABLE annotazione
ADD FOREIGN KEY (id_arnia) REFERENCES arnia(id);
ALTER TABLE meteo
ADD FOREIGN KEY (id_luogo) REFERENCES luogo(id);
ALTER TABLE arnia
ADD FOREIGN KEY (id_regina) REFERENCES regina(id);
ALTER TABLE arnia
ADD FOREIGN KEY (id_utente) REFERENCES utente(id);
ALTER TABLE arnia
ADD FOREIGN KEY (id_luogo) REFERENCES luogo(id);