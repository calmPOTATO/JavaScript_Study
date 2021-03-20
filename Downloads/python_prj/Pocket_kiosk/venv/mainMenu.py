import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import healMonster1
import bagMonster1
import dealMonster1

class Lobi(QWidget):
    def __init__(self):
        super().__init__()
        self.initUi()

    def initUi(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/main_back.jpg")
        self.back.setPixmap(self.pixmap)

        self.exit_lb = QLabel(self)
        self.exit_lb.move(0, 1100)
        self.pixmap = QPixmap("image/btn_image/back_btn.png")
        self.exit_lb.setPixmap(self.pixmap)

        healbtn = QPushButton(self)
        healbtn.clicked.connect(self.clickHealbtn)
        healbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        healbtn.resize(550, 150)
        healbtn.move(165, 316)

        bagbtn = QPushButton(self)
        bagbtn.clicked.connect(self.clickBagbtn)
        bagbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        bagbtn.resize(550, 150)
        bagbtn.move(165, 580)

        dealbtn = QPushButton(self)
        dealbtn.clicked.connect(self.clickDealbtn)
        dealbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        dealbtn.resize(550, 150)
        dealbtn.move(165, 860)

        exitbtn = QPushButton(self)
        exitbtn.resize(200, 80)
        exitbtn.move(0, 1120)
        exitbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        exitbtn.clicked.connect(QCoreApplication.instance().quit)

        self.resize(850, 1200)
        self.show()

    def clickHealbtn(self):
        self.close()
        self.e = healMonster1.heal()

    def clickBagbtn(self):
        self.close()
        self.b = bagMonster1.bag()

    def clickDealbtn(self):
        self.close()
        self.d = dealMonster1.deal()

