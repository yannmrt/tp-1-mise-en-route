#include "RS232.h"
#define PORT "/dev/ttyUSB0"

RS232::RS232(QWidget *parent)
    : QMainWindow(parent)
{
    ui.setupUi(this);

	// instanciation du port
	QSerialPort *port = new QSerialPort(PORT);

	// configuration
	port->setBaudRate(QSerialPort::Baud9600);
	port->setDataBits(QSerialPort::Data8);
	port->setParity(QSerialPort::NoParity);
	port->setStopBits(QSerialPort::OneStop);
	port->setFlowControl(QSerialPort::NoFlowControl);

	// ouverture
	port->open(QIODevice::ReadWrite);

	// fermeture
	port->close();

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

	return nombresOctets;
}

// Cette fonction permet d'ouvrir le port série
void RS232::openPort()
{

}

// Cette fonction permet de recevoir des informations par le port série
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

// Cette fonction permet de découper la trame gps
void RS232::cutTrame(const QString &trame)
{
	//QString phrase = "$GPGGA,064036.289,4836.5375,N,00740.9373,E,1,04,3.2,200.2,M,,,,0000*0E";
	// Faire des essais :
	//QString phrase = "";
	//QString phrase = "GPGGA,064036.289,4836.5375,N,00740.9373,E,1,04,3.2,200.2,M,,,,0000*0E";
	//QString phrase = "$GPAAM,A,A,0.10,N,WPTNME*32";
	//QString phrase = "$GPGGA,064036.289,4836.5375,N,00740.9373,E,1,04,3.2,200.2,M,,,,0000";

	QString phrase = trame;

	QString checksum;
	const QString debutTrame = "$";
	const QString typeTrame = "GPGGA";
	const QString debutChecksum = "*";

	// phrase vide ?s
	if (phrase.length() != 0)
	{
		// est-ce une phrase NMEA 0183 ?
		if (phrase.startsWith(debutTrame))
		{
			// est-ce la bonne phrase ?
			if (phrase.startsWith(debutTrame + typeTrame))
			{
				// y-a-t-il un checksum ?
				if (phrase.contains(debutChecksum))
				{
					checksum = phrase.section(debutChecksum, 1, 1);
					qDebug() << "checksum : 0x" << checksum;
				}
				else
					qDebug() << "Attention : il n'y a pas de checksum dans cette phrase !";
			}
			else
				qDebug() << "Erreur : ce n'est pas une trame GGA !";
		}
		else
			qDebug() << "Erreur : ce n'est pas une trame NMEA 0183 !";
	}
	else
		qDebug() << "Erreur : phrase vide !";

}

// Cette fonction permet de convertir la découte vers un format numérique
void RS232::decode()
{

}

// Cette fonction permet de récupèrer les trames disponibles dans la base de données
void RS232::getTrameDb()
{

}

// Cette fonction permet d'ajouter une trame en base de donnée
void RS232::addTrameDb()
{

}

// Cette fonction permet de supprimer une trame en base de donnée
void RS232::delTrameDb()
{

}
