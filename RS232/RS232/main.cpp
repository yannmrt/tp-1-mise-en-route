#include "RS232.h"
#include <QDebug>
#include <QtWidgets/QApplication>
#include <QSerialPort>

int main(int argc, char *argv[])
{
	QApplication a(argc, argv);
	RS232 w;
	w.show();
	return a.exec();
}
