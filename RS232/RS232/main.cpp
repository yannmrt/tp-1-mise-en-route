#include "RS232.h"
#include <QtWidgets/QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    RS232 w;
    w.show();
    return a.exec();
}
