import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QMessageBox, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import bagMonster2
import mainMenu
class bag(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/keep_main.JPG")
        self.back.setPixmap(self.pixmap)

        self.back_lb = QLabel(self)
        self.back_lb.move(50, 1090)
        self.pixmap = QPixmap("image/btn_image/gotolobi_btn.png")
        self.back_lb.setPixmap(self.pixmap)

        self.next_lb = QLabel(self)
        self.next_lb.move(550, 1090)
        self.pixmap = QPixmap("image/btn_image/next_btn.png")
        self.next_lb.setPixmap(self.pixmap)

        backbtn = QPushButton(self)
        backbtn.resize(250,100)
        backbtn.move(50, 1050)
        backbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        backbtn.clicked.connect(self.clickBack)
        nextbtn = QPushButton(self)
        nextbtn.resize(250, 100)
        nextbtn.move(550, 1050)
        nextbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        nextbtn.clicked.connect(self.clickNext)

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 보관")
        self.show()


    def clickBack(self):
        self.close()
        self.l1 = mainMenu.Lobi()

    def clickNext(self):
        self.close()
        self.b2 = bagMonster2.bag2()



