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
        Wording     Varchar (25) NOT NULL ,
        Description Text NOT NULL ,
        Price       Float NOT NULL
	,CONSTRAINT Licence_PK PRIMARY KEY (IdLicence)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        IdUser         Int Auto_increment NOT NULL ,
        HashSerialDisk Varchar (150) NOT NULL ,
        MailUser       Varchar (120) NOT NULL ,
        UserName       Varchar (30) NOT NULL ,
        MdpUser        Varchar (150) NOT NULL ,
        IdLicence      Int
	,CONSTRAINT User_PK PRIMARY KEY (IdUser)

	,CONSTRAINT User_Licence_FK FOREIGN KEY (IdLicence) REFERENCES Licence(IdLicence)
)ENGINE=InnoDB;

INSERT INTO Licence (Wording, Description, Price) VALUES
('Mensuelle', "Cette licence n'est active que durant 30 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '35'),
('Pontuelle 30j', "Cette licence consomme un jeton à chaque démmarage du logiciel. Chaque jeton consommé est valable pendant 10 heures. Au bout de 10 heures d'utilisation, le programme se ferme en sauvegardant votre travail", '60'),
('Annuelle', "Cette licence est active durant 360 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '350');


INSERT INTO User (MailUser, UserName, MdpUser) VALUES
('toto@tata.fr', 'toto', 'tata'),
('user@mail.com', 'user', 'password');
