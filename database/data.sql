CREATE DATABASE takalo;
USE takalo;

CREATE TABLE images (
    idImages INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20)
);
INSERT INTO images VALUES (null, 'im1.png');
INSERT INTO images VALUES (null, 'im2.png');
INSERT INTO images VALUES (null, 'im3.png');

CREATE TABLE categorie (
    idCategorie INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50)
);
INSERT INTO categorie VALUES (null, 'livre');
INSERT INTO categorie VALUES (null, 'vetement');
INSERT INTO categorie VALUES (null, 'sport');


CREATE TABLE user (
    idUser INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    mdp VARCHAR(16),
    idImages INTEGER,
    admin INTEGER,
    FOREIGN KEY (idImages) REFERENCES images (idImages)
);
INSERT INTO user VALUES (null, 'Tiavina', 'Malalaniaina', '1234', 1, 1);
INSERT INTO user VALUES (null, 'Tsiky', 'Aro', 'aro', 2, 0);


CREATE TABLE object (
    idObject INTEGER PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50),
    description BLOB,
    prix DOUBLE(10, 2),
    idUser INTEGER,
    idCategorie INTEGER,
    FOREIGN KEY (idUser) REFERENCES user (idUser),
    FOREIGN KEY (idCategorie) REFERENCES categorie (idCategorie)
);
INSERT INTO object VALUES (null, 'Blanche neige', 'Livre rouge', 5000, 2, 1);
INSERT INTO object VALUES (null, 'Short gris', 'Gris avec des taches blanche', 7000, 2, 1);
INSERT INTO object VALUES (null, 'Blanche neige', 'Livre rouge', 5000, 2, 1);
INSERT INTO object VALUES (null, 'Blanche neige', 'Livre rouge', 5000, 2, 1);

CREATE TABLE echange (
    idEchange INTEGER PRIMARY KEY AUTO_INCREMENT,
    idUser1 INTEGER,
    idUser2 INTEGER,
    etat VARCHAR(10),
    FOREIGN KEY (idUser1) REFERENCES user (idUser),
    FOREIGN KEY (idUser2) REFERENCES user (idUser)
);



CREATE TABLE proposition (
    idProposition INTEGER PRIMARY KEY AUTO_INCREMENT,
    idEchange INTEGER,
    idObject INTEGER,
    FOREIGN KEY (idEchange) REFERENCES echange (idEchange),
    FOREIGN KEY (idObject) REFERENCES object (idObject)
);

CREATE TABLE images_object (
    idImages_object INTEGER PRIMARY KEY AUTO_INCREMENT,
    idObject INTEGER,
    idImages INTEGER,
    FOREIGN KEY (idObject) REFERENCES object (idObject),
    FOREIGN KEY (idImages) REFERENCES images (idImages)
);
