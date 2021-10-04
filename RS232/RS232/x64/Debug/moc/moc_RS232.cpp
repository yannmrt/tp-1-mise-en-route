/****************************************************************************
** Meta object code from reading C++ file 'RS232.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.14.2)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include <memory>
#include "../../../RS232.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'RS232.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.14.2. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
QT_WARNING_PUSH
QT_WARNING_DISABLE_DEPRECATED
struct qt_meta_stringdata_RS232_t {
    QByteArrayData data[15];
    char stringdata0[117];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_RS232_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_RS232_t qt_meta_stringdata_RS232 = {
    {
QT_MOC_LITERAL(0, 0, 5), // "RS232"
QT_MOC_LITERAL(1, 6, 5), // "issue"
QT_MOC_LITERAL(2, 12, 0), // ""
QT_MOC_LITERAL(3, 13, 5), // "trame"
QT_MOC_LITERAL(4, 19, 7), // "receive"
QT_MOC_LITERAL(5, 27, 11), // "decodeTrame"
QT_MOC_LITERAL(6, 39, 10), // "getTrameDb"
QT_MOC_LITERAL(7, 50, 10), // "addTrameDb"
QT_MOC_LITERAL(8, 61, 8), // "latitude"
QT_MOC_LITERAL(9, 70, 9), // "longitude"
QT_MOC_LITERAL(10, 80, 10), // "horodatage"
QT_MOC_LITERAL(11, 91, 4), // "name"
QT_MOC_LITERAL(12, 96, 6), // "idBoat"
QT_MOC_LITERAL(13, 103, 10), // "delTrameDb"
QT_MOC_LITERAL(14, 114, 2) // "id"

    },
    "RS232\0issue\0\0trame\0receive\0decodeTrame\0"
    "getTrameDb\0addTrameDb\0latitude\0longitude\0"
    "horodatage\0name\0idBoat\0delTrameDb\0id"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_RS232[] = {

 // content:
       8,       // revision
       0,       // classname
       0,    0, // classinfo
       6,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    1,   44,    2, 0x0a /* Public */,
       4,    0,   47,    2, 0x0a /* Public */,
       5,    1,   48,    2, 0x0a /* Public */,
       6,    0,   51,    2, 0x0a /* Public */,
       7,    5,   52,    2, 0x0a /* Public */,
      13,    1,   63,    2, 0x0a /* Public */,

 // slots: parameters
    QMetaType::Void, QMetaType::QString,    3,
    QMetaType::Void,
    QMetaType::Void, QMetaType::QString,    3,
    QMetaType::Void,
    QMetaType::Void, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::QString,    8,    9,   10,   11,   12,
    QMetaType::Void, QMetaType::QString,   14,

       0        // eod
};

void RS232::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        auto *_t = static_cast<RS232 *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->issue((*reinterpret_cast< const QString(*)>(_a[1]))); break;
        case 1: _t->receive(); break;
        case 2: _t->decodeTrame((*reinterpret_cast< const QString(*)>(_a[1]))); break;
        case 3: _t->getTrameDb(); break;
        case 4: _t->addTrameDb((*reinterpret_cast< QString(*)>(_a[1])),(*reinterpret_cast< QString(*)>(_a[2])),(*reinterpret_cast< QString(*)>(_a[3])),(*reinterpret_cast< QString(*)>(_a[4])),(*reinterpret_cast< QString(*)>(_a[5]))); break;
        case 5: _t->delTrameDb((*reinterpret_cast< QString(*)>(_a[1]))); break;
        default: ;
        }
    }
}

QT_INIT_METAOBJECT const QMetaObject RS232::staticMetaObject = { {
    QMetaObject::SuperData::link<QMainWindow::staticMetaObject>(),
    qt_meta_stringdata_RS232.data,
    qt_meta_data_RS232,
    qt_static_metacall,
    nullptr,
    nullptr
} };


const QMetaObject *RS232::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *RS232::qt_metacast(const char *_clname)
{
    if (!_clname) return nullptr;
    if (!strcmp(_clname, qt_meta_stringdata_RS232.stringdata0))
        return static_cast<void*>(this);
    return QMainWindow::qt_metacast(_clname);
}

int RS232::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QMainWindow::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 6)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 6;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 6)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 6;
    }
    return _id;
}
QT_WARNING_POP
QT_END_MOC_NAMESPACE
