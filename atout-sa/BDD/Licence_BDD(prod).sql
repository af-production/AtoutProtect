#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database : Licence_BDD
#------------------------------------------------------------

CREATE DATABASE Licence_BDD;
USE Licence_BDD;

#------------------------------------------------------------
# Table: Licence
#------------------------------------------------------------

DROP TABLE IF EXISTS Licence;
CREATE TABLE Licence(
        IdLicence   Int  Auto_increment  NOT NULL ,
        Wording     Varchar (50) NOT NULL ,
        Description Text NOT NULL ,
        Price       Float NOT NULL
	,CONSTRAINT Licence_PK PRIMARY KEY (IdLicence)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

DROP TABLE IF EXISTS User;
CREATE TABLE User(
        IdUser         Int NOT NULL ,
        HashSerialDisk Varchar (400) NULL ,
        MailUser       Varchar (120) NOT NULL ,
        IdLicence      Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (IdUser)

	,CONSTRAINT User_Licence_FK FOREIGN KEY (IdLicence) REFERENCES Licence(IdLicence)
)ENGINE=InnoDB;


INSERT INTO Licence (Wording, Description, Price) 
VALUES
("Mensuelle", "Cette licence est valide durant un mois. Passé cette période, le logiciel que vous utilisez deviendra indisponnible.", 35),
("Dégressive 30", "La licence propose 30 jetons d'utilisation. Un jeton consommé active le logiciel à partir de la premiere utilisation de la journée, jusqu'à 23h59 du jour courant.", 50),
("Dégressive 90", "La licence propose 90 jetons d'utilisation. Un jeton consommé active le logiciel à partir de la premiere utilisation de la journée, jusqu'à 23h59 du jour courant.", 130),
("Annuelle", "Achat d'une licence à l'année, le logiciel proposé sera disponnible durant 12 mois à compter du jour de la validation de la plateforme de paiement.", 350);



INSERT INTO User (HashSerialDisk, MailUser, IdLicence) 
VALUES
(NULL, "toto@mail.usr", 1);