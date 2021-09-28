#include "RS232.h"
#define PORT "/dev/ttyUSB0"

RS232::RS232(QWidget *parent)
    : QMainWindow(parent)
{
    ui.setupUi(this);

	//connection a la BDD
	try {

		//variables sql

		sql::Driver* driver;
		sql::Connection* con;
		sql::Statement* stmt;
		sql::ResultSet* res;

		//connexion a la BDD
		driver = get_driver_instance();

		con = driver->connect("tcp://192.168.64.201", "root", "root");

		//s�l�ction de la base
		con->setSchema("TP1");

		//cr�ation des requ�tes
		req = con->createStatement();
	}
	catch (sql::SQLException &e) {
		//retour des erreurs
		cout << "(code erreur MySQL:" << e.getErrorCode();
		cout << ", EtatSQL:" << e.getSQLState() << ")" << endl;
	}

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

// Cette fonction permet d'�mettre une trame en port s�rie
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

// Cette fonction permet d'ouvrir le port s�rie
void RS232::openPort()
{
	for (int i = 0; i < listePorts.size(); i++)
	{
		QSerialPortInfo info = listePorts.at(i);
		
		if(!infomanufacturer().isEmpty())
		{
			listePortsDisponibles << info.manufacturer() + "(" + info.portName() + ")";

		}
		else 
		{
			listePortsDipsonibles << info.portName();
		}
	}

	return listePortsDipsonibles;

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

// Cette fonction permet de convertir la d�coute vers un format num�rique
void RS232::decode()
{
	l
}

// Cette fonction permet de r�cup�rer les trames disponibles dans la base de donn�es
void RS232::getTrameDb()
{

}

// Cette fonction permet d'ajouter une trame en base de donn�e
void RS232::addTrameDb(req, a, b, c, d)
{
	prep_req = con->prepareStatement("INSERT INTO gps(latitude, longiude, name, idBoat) VALUES (?, ?, ?, ?)");

	prep_req->setInt(1, 1);
	prep_req->setString(2, "a");
	prep_req->execute();

	prep_req->setInt(1, 2);
	prep_req->setString(2, "b");
	prep_req->execute();

	prep_req->setInt(1, 3);
	prep_req->setString(2, "c");
	prep_req->execute();

	prep_req->setInt(1, 4);
	prep_req->setString(2, "d");
	prep_req->execute();

	delete prep_req;
	delete con;
}

// Cette fonction permet de supprimer une trame en base de donn�e
void RS232::delTrameDb(req, a)
{
	prep_req = con->prepareStatement("DELETE FROM gps WHERE 'id'= a ");

	prep_req->setInt(1, 1);
	prep_req->setString(1, "a");
	prep_req->execute();

	delete prep_req;
	delete con;

}