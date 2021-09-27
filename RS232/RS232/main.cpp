#include "RS232.h"
#include <QDebug>
#include <QtWidgets/QApplication>
#include <QSerialPort>

#define PORT "/dev/ttyUSB0"

int main(int argc, char *argv[])
{
	QSerialPort *port;

	// instanciation du port 
	port = new QSerialPort(QLatin1String(PORT));

	// TODO : param�trer le port (d�bit, ...)

	// ouverture du port
	port->open(QIODevice::ReadWrite);
	qDebug("<debug> etat ouverture port : %d", port->isOpen());

	// TODO : r�ceptionner et/ou envoyer des donn�es

	// fermeture du port
	port->close();
	qDebug("<debug> etat ouverture port : %d", port->isOpen());

	delete port;

	return 0;
}
