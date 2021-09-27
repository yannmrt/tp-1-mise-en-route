/********************************************************************************
** Form generated from reading UI file 'RS232.ui'
**
** Created by: Qt User Interface Compiler version 5.14.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_RS232_H
#define UI_RS232_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_RS232Class
{
public:
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QWidget *centralWidget;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *RS232Class)
    {
        if (RS232Class->objectName().isEmpty())
            RS232Class->setObjectName(QString::fromUtf8("RS232Class"));
        RS232Class->resize(600, 400);
        menuBar = new QMenuBar(RS232Class);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        RS232Class->setMenuBar(menuBar);
        mainToolBar = new QToolBar(RS232Class);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        RS232Class->addToolBar(mainToolBar);
        centralWidget = new QWidget(RS232Class);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        RS232Class->setCentralWidget(centralWidget);
        statusBar = new QStatusBar(RS232Class);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        RS232Class->setStatusBar(statusBar);

        retranslateUi(RS232Class);

        QMetaObject::connectSlotsByName(RS232Class);
    } // setupUi

    void retranslateUi(QMainWindow *RS232Class)
    {
        RS232Class->setWindowTitle(QCoreApplication::translate("RS232Class", "RS232", nullptr));
    } // retranslateUi

};

namespace Ui {
    class RS232Class: public Ui_RS232Class {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_RS232_H
