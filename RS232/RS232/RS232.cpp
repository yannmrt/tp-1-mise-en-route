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
