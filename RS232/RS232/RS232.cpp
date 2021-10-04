#include "RS232.h"
#define PORT "/dev/ttyUSB0"

RS232::RS232(QWidget *parent)
    : QMainWindow(parent)
{
    ui.setupUi(this);

	// Connexion à la bdd
	bddMySQL = BaseDeDonnees::getInstance("QMYSQL");
	bddMySQL->connecter("TP1", "superuser", "superuser", "192.168.64.201");

	// Connexion au port série 
	port = new QSerialPort(QLatin1String(PORT));

	// ouverture du port
	port->open(QIODevice::ReadWrite);
	qDebug("<debug> etat ouverture port : %d", port->isOpen());

	// TODO : réceptionner et/ou envoyer des données

	// fermeture du port
	port->close();
	qDebug("<debug> etat ouverture port : %d", port->isOpen());
}

// Cette fonction permet d'émettre une trame en port série
void RS232::issue(const QString &trame)
{
	int nombresOctets = -1;

	if (port == NULL || !port->isOpen())
	{
		return -1;
	}

	nombresOctets = port->write(trame.toLatin1());
}

// Cette fonction permet de recevoir des informations par le port série
void RS232::receive()
{

	QByteArray donnees;

	while (port->bytesAvailable())
	{

		donnees += port->readAll();
		QThread::usleep(100000); // cf. timeout

	}

	QString trameRecue = QString(donnees.data());

}

// Cette fonction permet de découper la trame gps
void RS232::decodeTrame(const QString &trame)
{
	// On créer les variables nécessaires pour définir l'heure de la trame en bdd
	QString horodatage;
	unsigned int heure, minute;
	double seconde;

	// On créer les variables nécessesaires pour définir la latitude et longitude en bdd
	QString latitude;
	QString longitude;

	// Découpage de la trame horaire
	horodatage = trame.section(',', 1, 1);
	heure = horodatage.mid(0, 2).toInt();
	minute = horodatage.mid(2, 2).toInt();
	seconde = horodatage.mid(4, 2).toDouble();

	// On envoie afficher les informations de l'heure disponible dans la variable -> hordatage
	horodatage = QString::number(heure) + ":" + QString::number(minute)
		+ ":" + QString::number(seconde);

	qDebug() << "Horodatage : " << horodatage;

	// On récupère la latitude dans la trame : variable -> latitude
	latitude = trame.section(',', 2, 2);
	qDebug() << "latitude : " << latitude;

	// On récupére la longitude dans la trame : variable -> longitude
	longitude = trame.section(',', 4, 4);
	qDebug() << "longitude : " << longitude;

	QString name = "nom";
	QString idBoat = 1;

	
	QString requete;
	requete = "INSERT INTO gps (latitude, longitude, heure, name, idBoat) VALUES ('" + latitude + "', '" + longitude + "', '" + heure + "', '" + name + "', '" + idBoat + "')";
	retour = bddMySQL->executer(requete);

	RS232::addTrameDb(latitude, longitude, horodatage, name, idBoat);

}

// Cette fonction permet de récupèrer les trames disponibles dans la base de données
void RS232::getTrameDb()
{
	QString requete;

	requete = "SELECT (latitude, longitude, heure, name, idBoat) FROM gps ";

	while (query.requete()) {

		QString latitude = query("latitude").toString();

		QString longitude = query("longitude").toString();

		QString horodatage = query("heure").toString();

		QString name = query("name").toString();

		QString idBoat = query("idBoat").toString();
	}
	retour = bddMySQL->executer(requete);

	RS232::getTrameDb(latitude, longitude, horodatage, name, idBoat);
}

// Cette fonction permet d'ajouter une trame en base de donnée
void RS232::addTrameDb(QString latitude, QString longitude, QString horodatage, QString name, QString idBoat)
{
	QString requete;
	requete = "INSERT INTO gps (latitude, longitude, heure, name, idBoat) VALUES ('" + latitude + "', '" + longitude + "', '" + horodatage + "', '" + name + "', '" + idBoat + "')";
	retour = bddMySQL->executer(requete);
}

// Cette fonction permet de supprimer une trame en base de donnée
void RS232::delTrameDb(QString id)
{
	QString requete;
	requete = "DELETE FROM gps WHERE id = '" + id + "' ";
	retour = bddMySQL->executer(requete);
}