#include "ui_RS232.h"
#include <QtWidgets/QMainWindow>

#include <QRegExp>

#include <qDebug>

// On inclus les d�pendances n�cessaires au port s�rie
#include <QSerialPort>
#include <QSerialPortInfo>

// On inclus les d�pendances pour SQL
#include <QtSql/QtSql>
#include <QSqlQuery>
#include <QtSql>

#include <QThread>




class RS232 : public QMainWindow
{
    Q_OBJECT

public:
    RS232(QWidget *parent = Q_NULLPTR);
	QString retour;

private:
    Ui::RS232Class ui;
	
	// On instancie le pointeur pour le port s�rie
	QSerialPort *port;

	// On instancie les pointeurs pour la base de donn�es
	QSqlDatabase *db;
	QSqlQuery *query;

	// on instancie la variable trame utilis�e dans la classe reception
	QString trame;

public slots:
	void serialPortRead();
	void decodeTrame(const QString trame);
	void addTrameDb(const QString latitude, const QString longitude, const QString horodatage);
	void pushPortButtonClicked();
};
