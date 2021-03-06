#include "RS232.h"

RS232::RS232(QWidget *parent)
    : QMainWindow(parent)
{
    ui.setupUi(this);

	// On instancie la base de donnée
	QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
	db.setHostName("192.168.64.201");
	db.setUserName("superuser");
	db.setPassword("superuser");
	db.setDatabaseName("TP1");
}

void RS232::serialPortRead()
{
	// On lit tout ce que le port série reçois
	QByteArray receiveTrame = port->readAll();

	// On met les données dans la variable trame
	trame = trame + receiveTrame.toStdString().c_str();

	// On va vérifier que la trame n'est pas vide
	if (trame.size() > 0) {


		QString checksum;
		const QString typeTrame = "GPGGA";
		const QString debutChecksum = "*";

		if (trame.startsWith(typeTrame)) {
			if (trame.contains(debutChecksum)) {

				QThread::usleep(100000);

				ui.listWidget->addItem(trame);

				// On lance la fonction decodeTrame(const QString trame) qui nous decode la trame
				decodeTrame(trame);

				QThread::usleep(100000);


			}
		}
	}
}

void RS232::decodeTrame(const QString trame)
{
	// Decodage de la trame
	QString horodatage;
	unsigned int heure, minute;
	double seconde;

	// découpe la trame avec le délimiteur ',' et récupère le deuxième champ
	horodatage = trame.section(',', 1, 1);

	// découpe une chaine à partir d'une position et un nombre de caractères
	heure = horodatage.mid(0, 2).toInt();
	minute = horodatage.mid(2, 2).toInt();
	seconde = horodatage.mid(4, 2).toDouble();

	// On passe les valeurs dans des variables
	QString latitude;
	latitude = trame.section(',', 2, 2);

	QString longitude;
	longitude = trame.section(',', 4, 4);

	horodatage = QString::number(heure) + ":" + QString::number(minute)
		+ ":" + QString::number(seconde);

	// On affiche les données
	qDebug() << "latitude : " << latitude;
	qDebug() << "longitude : " << longitude;
	qDebug() << "Horodatage : " << horodatage;

	// On affiche dans la zone de texte la trame décodée
	QString text = "latitude:" + latitude + "; longitude = " + longitude + "; horodatage: " + horodatage + ";";
	ui.label->setText(text);

	// On va lancer inclure les données en base de donnée
	addTrameDb(latitude, longitude, horodatage);
} 

void RS232::addTrameDb(const QString latitude, const QString longitude, const QString horodatage)
{
	// On va vérifier que les données ne sont pas vides
	if (latitude.size() > 0, longitude.size() > 0, horodatage.size() > 0) {

		// On initialise le query bdd
		QSqlDatabase db = QSqlDatabase::database();
		QSqlQuery query(db);

		// On définie des valeurs de tests
		QString name = "nametest";
		QString idBoat = "1";

		QString requete = "INSERT INTO gps (latitude, longitude, horodatage, name, idBoat) VALUES ('" + latitude + "', '" + longitude + "', '" + horodatage + "', '" + name + "', '" + idBoat + "')";
		retour = query.exec(requete);

	}
	trame = "";
}

void RS232::pushPortButtonClicked()
{
	QString PORT = ui.portTextEdit->text();

	// On instancie le Port Série
	port = new QSerialPort(this);
	QObject::connect(port, SIGNAL(readyRead()), this, SLOT(serialPortRead()));
	port->setPortName(PORT);
	port->open(QIODevice::ReadWrite);
	port->setBaudRate(QSerialPort::Baud9600);
	port->setDataBits(QSerialPort::DataBits::Data8);
	port->setParity(QSerialPort::Parity::NoParity);
	port->setStopBits(QSerialPort::StopBits::OneStop);
	port->setFlowControl(QSerialPort::NoFlowControl);

}