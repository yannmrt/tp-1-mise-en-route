#include "ui_RS232.h"
#include <QtWidgets/QMainWindow>

#include <QRegExp>

#include <qDebug>

// On inclus les dépendances nécessaires au port série
#include <QSerialPort>
#include <QSerialPortInfo>

// On inclus les dépendances pour SQL
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
	
	// On instancie le pointeur pour le port série
	QSerialPort *port;

	// On instancie les pointeurs pour la base de données
	QSqlDatabase *db;
	QSqlQuery *query;

	// on instancie la variable trame utilisée dans la classe reception
	QString trame;

public slots:
	void serialPortRead();
	void decodeTrame(const QString trame);
	void addTrameDb(const QString latitude, const QString longitude, const QString horodatage);
	void pushPortButtonClicked();
};
