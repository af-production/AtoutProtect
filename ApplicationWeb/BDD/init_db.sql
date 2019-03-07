
#------------------------------------------------------------
# Database : Licence_BDD
#------------------------------------------------------------

DROP DATABASE if EXISTS Licence_BDD;
CREATE DATABASE Licence_BDD;
USE Licence_BDD;




#------------------------------------------------------------
# Insertion : Licence
#------------------------------------------------------------

INSERT INTO Licence (Wording, Description, Price) VALUES
('Mensuelle', "Cette licence n'est active que durant 30 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '35'),
('Pontuelle 30j', "Cette licence consomme un jeton à chaque démmarage du logiciel. Chaque jeton consommé est valable pendant 10 heures. Au bout de 10 heures d'utilisation, le programme se ferme en sauvegardant votre travail", '60'),
('Annuelle', "Cette licence est active durant 360 jours à compter du jour de l'achat. Elle permet d'accéder à toutes les fonctionnalité pendant sa durée d'activation", '350');

#------------------------------------------------------------
# Insertion : User
#------------------------------------------------------------

INSERT INTO User (MailUser, UserName, MdpUser) VALUES
('toto@tata.fr', 'toto', 'tata'),
('user@mail.com', 'user', 'password');