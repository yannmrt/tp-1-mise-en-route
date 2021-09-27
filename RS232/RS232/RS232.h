#include <QtWidgets/QMainWindow>
#include <QtSql/QtSql>
#include <QApplication>
#include <QDateTime>

#include "ui_RS232.h"
#include "database.h"

/* tvaira.free.fr/projets/activites/activite-port-serie-qt.html */

class RS232 : public QMainWindow
{
    Q_OBJECT

public:
    RS232(QWidget *parent = Q_NULLPTR);

private:
    Ui::RS232Class ui;

public slots:
	// PORT SERIE
	void issue();
	void openPort();
	void receive();

	// BASE DE DONNEE
	void getTrameDb();
	void addTrameDb();
	void delTrameDb();
};
