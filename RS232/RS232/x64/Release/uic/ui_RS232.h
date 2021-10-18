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
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_RS232Class
{
public:
    QWidget *centralWidget;
    QPushButton *pushPortButton;
    QLineEdit *portTextEdit;
    QLabel *label;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *RS232Class)
    {
        if (RS232Class->objectName().isEmpty())
            RS232Class->setObjectName(QString::fromUtf8("RS232Class"));
        RS232Class->resize(600, 400);
        centralWidget = new QWidget(RS232Class);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        pushPortButton = new QPushButton(centralWidget);
        pushPortButton->setObjectName(QString::fromUtf8("pushPortButton"));
        pushPortButton->setGeometry(QRect(10, 40, 131, 23));
        portTextEdit = new QLineEdit(centralWidget);
        portTextEdit->setObjectName(QString::fromUtf8("portTextEdit"));
        portTextEdit->setGeometry(QRect(10, 10, 131, 20));
        label = new QLabel(centralWidget);
        label->setObjectName(QString::fromUtf8("label"));
        label->setGeometry(QRect(170, 10, 381, 41));
        QFont font;
        font.setPointSize(13);
        label->setFont(font);
        RS232Class->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(RS232Class);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 600, 21));
        RS232Class->setMenuBar(menuBar);
        mainToolBar = new QToolBar(RS232Class);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        RS232Class->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(RS232Class);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        RS232Class->setStatusBar(statusBar);

        retranslateUi(RS232Class);
        QObject::connect(pushPortButton, SIGNAL(clicked()), RS232Class, SLOT(pushPortButtonClicked()));

        QMetaObject::connectSlotsByName(RS232Class);
    } // setupUi

    void retranslateUi(QMainWindow *RS232Class)
    {
        RS232Class->setWindowTitle(QCoreApplication::translate("RS232Class", "RS232", nullptr));
        pushPortButton->setText(QCoreApplication::translate("RS232Class", "Configurer le port", nullptr));
        label->setText(QString());
    } // retranslateUi

};

namespace Ui {
    class RS232Class: public Ui_RS232Class {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_RS232_H
