import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QMessageBox, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap, QMovie
from time import sleep
import healMonster4

class heal3(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        self.close()
        self.h4 = healMonster4.heal4()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/healling.jpg")
        self.back.setPixmap(self.pixmap)

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 치료3")
        self.show()