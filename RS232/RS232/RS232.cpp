#include "RS232.h"
#define PORT "/dev/ttyUSB0"

RS232::RS232(QWidget *parent)
    : QMainWindow(parent)
{
    ui.setupUi(this);

	// Connexion � la bdd
	bddMySQL = BaseDeDonnees::getInstance("QMYSQL");
	bddMySQL->connecter("TP1", "root", "root", "192.168.64.201");

	// Connexion au port s�rie 
	port = new QSerialPort(QLatin1String(PORT));

	// ouverture du port
	port->open(QIODevice::ReadWrite);
	qDebug("<debug> etat ouverture port : %d", port->isOpen());

	// TODO : r�ceptionner et/ou envoyer des donn�es

	// fermeture du port
	port->close();
	qDebug("<debug> etat ouverture port : %d", port->isOpen());
}

// Cette fonction permet d'�mettre une trame en port s�rie
void RS232::issue(const QString &trame)
{
	int nombresOctets = -1;

	/*if (port == NULL || !port->isOpen())
	{
		return -1;
	}*/

	nombresOctets = port->write(trame.toLatin1());
}

// Cette fonction permet de recevoir des informations par le port s�rie
void RS232::receive()
{
	QByteArray donnees;

	while (port->bytesAvailable())
	{
		donnees += port->readAll();
		usleep(100000); // cf. timeout
	}

	QString trameRecue = QString(donnees.data());

}

// Cette fonction permet de d�couper la trame gps
void RS232::decodeTrame(const QString &trame)
{
	// On cr�er les variables n�cessaires pour d�finir l'heure de la trame en bdd
	QString horodatage;
	unsigned int heure, minute;
	double seconde;

	// On cr�er les variables n�cessesaires pour d�finir la latitude et longitude en bdd
	QString latitude;
	QString longitude;

	// D�coupage de la trame horaire
	horodatage = trame.section(',', 1, 1);
	heure = horodatage.mid(0, 2).toInt();
	minute = horodatage.mid(2, 2).toInt();
	seconde = horodatage.mid(4, 2).toDouble();

	// On envoie afficher les informations de l'heure disponible dans la variable -> hordatage
	horodatage = QString::number(heure) + ":" + QString::number(minute)
		+ ":" + QString::number(seconde);

	qDebug() << "Horodatage : " << horodatage;

	// On r�cup�re la latitude dans la trame : variable -> latitude
	latitude = trame.section(',', 2, 2);
	qDebug() << "latitude : " << latitude;

	// On r�cup�re la longitude dans la trame : variable -> longitude
	longitude = trame.section(',', 4, 4);
	qDebug() << "longitude : " << longitude;

	QString name = "nom";
	QString idBoat = 1;

	/*
	QString requete;
	requete = "INSERT INTO gps (latitude, longitude, heure, name, idBoat) VALUES ('" + latitude + "', '" + longitude + "', '" + heure + "', '" + name + "', '" + idBoat + "')";
	retour = bddMySQL->executer(requete);*/

	RS232::addTrameDb(latitude, longitude, horodatage, name, idBoat);

}

// Cette fonction permet de r�cup�rer les trames disponibles dans la base de donn�es
void RS232::getTrameDb()
{

}

// Cette fonction permet d'ajouter une trame en base de donn�e
void RS232::addTrameDb(QString latitude, QString longitude, QString horodatage, QString name, QString idBoat)
{
	QString requete;
	requete = "INSERT INTO gps (latitude, longitude, heure, name, idBoat) VALUES ('" + latitude + "', '" + longitude + "', '" + horodatage + "', '" + name + "', '" + idBoat + "')";
	retour = bddMySQL->executer(requete);
}

// Cette fonction permet de supprimer une trame en base de donn�e
void RS232::delTrameDb(QString id)
{
	QString requete;
}