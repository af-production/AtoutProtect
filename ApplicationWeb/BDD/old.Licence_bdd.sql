#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Database : Licence_BDD
#------------------------------------------------------------

DROP DATABASE if EXISTS Licence_BDD;
CREATE DATABASE Licence_BDD;
USE Licence_BDD;

#------------------------------------------------------------
# Table: Licence
#------------------------------------------------------------

CREATE TABLE Licence(
        IdLicence   Int  Auto_increment  NOT NULL ,
        Libelle     Varchar (25) NOT NULL ,
        Description Text NOT NULL ,
        Prix       Float NOT NULL
	,CONSTRAINT Licence_PK PRIMARY KEY (IdLicence)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        Idutilisateur         Int Auto_increment NOT NULL ,
        HashSerialDisk Varchar (150) NOT NULL ,
        MailUtilisateur       Varchar (120) NOT NULL ,
        NomUtilisateur       Varchar (30) NOT NULL ,
        MdpUtilisateur        Varchar (150) NOT NULL ,
        IdLicence      Int
	,CONSTRAINT utilisateur_PK PRIMARY KEY (Idutilisateur)

	,CONSTRAINT utilisateur_Licence_FK FOREIGN KEY (IdLicence) REFERENCES Licence(IdLicence)
)ENGINE=InnoDB;

INSERT INTO Licence (Libelle, Description, Prix) VALUES
('Mensuelle', "Cette licence n'est active que durant 30 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '35'),
('Pontuelle 30j', "Cette licence consomme un jeton à chaque démmarage du logiciel. Chaque jeton consommé est valable pendant 10 heures. Au bout de 10 heures d'utilisation, le programme se ferme en sauvegardant votre travail", '60'),
('Annuelle', "Cette licence est active durant 360 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '350');


INSERT INTO utilisateur (MailUtilisateur, NomUtilisateur, MdpUtilisateur) VALUES
('toto@tata.fr', 'toto', 'tata'),
('utilisateur@mail.com', 'utilisateur', 'password');
