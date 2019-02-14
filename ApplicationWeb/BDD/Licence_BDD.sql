#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database : Licence_BDD
#------------------------------------------------------------

USE Database;

#------------------------------------------------------------
# Table: Licence
#------------------------------------------------------------

DROP TABLE Licence IF EXIST;
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

DROP TABLE User IF EXIST;
CREATE TABLE User(
        IdUser         Int NOT NULL ,
        HashSerialDisk Varchar (400) NOT NULL ,
        MailUser       Varchar (120) NOT NULL ,
        IdLicence      Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (IdUser)

	,CONSTRAINT User_Licence_FK FOREIGN KEY (IdLicence) REFERENCES Licence(IdLicence)
)ENGINE=InnoDB;

