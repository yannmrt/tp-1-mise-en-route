#include <QtWidgets/QMainWindow>
#include <QtSql/QtSql>
#include <QApplication>
#include <QDateTime>

#include "ui_RS232.h"
#include "database.h"

#include <QSerialPort>
#include <QThread>

class RS232 : public QMainWindow
{
    Q_OBJECT

public:
    RS232(QWidget *parent = Q_NULLPTR);	
	char requete;
	char retour;
	char donnees;

private:
    Ui::RS232Class ui;
	BaseDeDonnees *bddMySQL;
	QSerialPort *port;

public slots:
	// PORT SERIE
	void issue(const QString &trame);
	void receive();
	void decodeTrame(const QString &trame);

	// BASE DE DONNEE
	void getTrameDb();
	void addTrameDb(QString latitude, QString longitude, QString horodatage, QString name, QString idBoat);
	void delTrameDb(QString id);
};
