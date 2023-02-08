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
    image VARCHAR(10),
    admin INTEGER
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
    dateProposition DATE,
    dateEchange DATE,
    FOREIGN KEY (idUser1) REFERENCES user (idUser),
    FOREIGN KEY (idUser2) REFERENCES user (idUser)
);
INSERT INTO echange VALUES (null, 1, 2, 1);
INSERT INTO echange VALUES (null, 1, 2, 1);



CREATE TABLE proposition (
    idProposition INTEGER PRIMARY KEY AUTO_INCREMENT,
    idEchange INTEGER,
    idObject INTEGER,
    FOREIGN KEY (idEchange) REFERENCES echange (idEchange),
    FOREIGN KEY (idObject) REFERENCES object (idObject)
);
INSERT INTO proposition VALUES (null, 1, 3);
INSERT INTO proposition VALUES (null, 1, 2);

CREATE TABLE historiqueEchange (
    idHistoriqueEchange INTEGER PRIMARY KEY AUTO_INCREMENT,
    idObject INTEGER,
    idUser INTEGER,
    dateEchange DATE,
    FOREIGN KEY (idObject) REFERENCES object (idObject),
    FOREIGN KEY (idUser) REFERENCES user (idUser)
);


CREATE TABLE images_object (
    idImages_object INTEGER PRIMARY KEY AUTO_INCREMENT,
    idObject INTEGER,
    image VARCHAR(10),
    FOREIGN KEY (idObject) REFERENCES object (idObject)
);

CREATE VIEW transaction AS
SELECT e.idEchange,e.idUser1,e.idUser2,p.idProposition,o.idObject,o.idUser
FROM proposition p
JOIN echange e ON e.idEchange=p.idEchange
JOIN object o ON p.idObject=o.idObject;

CREATE VIEW objectDetailled AS
SELECT o.idObject,o.idCategorie, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image
FROM object o
JOIN user u
ON o.idUser=u.idUser;

CREATE VIEW propositionDetailled AS
SELECT p.idProposition, e.idEchange, o.idObject, e.idUser1, e.idUser2, e.etat, o.titre, o.description, o.prix, o.idUser, o.idCategorie, c.nom nomCategorie, u.nom, u.prenom
FROM proposition p
JOIN echange e ON p.idEchange=e.idEchange
JOIN object o ON p.idObject=o.idObject
JOIN user u ON o.idUser=u.idUser
JOIN categorie c ON o.idCategorie=c.idCategorie

CREATE VIEW echangeDetailled AS
SELECT e.*,u1.nom nom1, u1.prenom prenom1, u2.nom nom2, u2.prenom prenom2 
FROM echange e
JOIN user u1 ON e.idUser1=u1.idUser
JOIN user u2 ON e.idUser2=u2.idUser;


CREATE VIEW historiqueEchangeDetailled AS
SELECT he.*, o.titre, o.description, o.prix, u.nom, u.prenom 
FROM historiqueEchange he
JOIN object o ON he.idObject=o.idObject
JOIN user u ON he.idUser=u.idUser;