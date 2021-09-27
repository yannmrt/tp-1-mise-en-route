#include <QtWidgets/QMainWindow>
#include <QtSql/QtSql>
#include <QApplication>
#include <QDateTime>

#include "ui_RS232.h"
#include "database.h"

#include <QSerialPort>

/* tvaira.free.fr/projets/activites/activite-port-serie-qt.html */

class RS232 : public QMainWindow
{
    Q_OBJECT

public:
    RS232(QWidget *parent = Q_NULLPTR);

	char nombresOctets();

private:
    Ui::RS232Class ui;
	BaseDeDonnees *bddMySQL;
	QSerialPort *port;

public slots:
	// PORT SERIE
	void issue(const QString &trame);
	void openPort();
	void receive();

	// BASE DE DONNEE
	void getTrameDb();
	void addTrameDb();
	void delTrameDb();
};
