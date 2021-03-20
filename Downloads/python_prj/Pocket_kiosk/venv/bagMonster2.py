import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QMessageBox, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import bagMonsterOut, bagMonsterIn

class bag2(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/keep_2.JPG")
        self.back.setPixmap(self.pixmap)

        self.out = QLabel(self)
        self.out.move(150, 350)
        self.pixmap = QPixmap("image/btn_image/output_btn.png")
        self.out.setPixmap(self.pixmap)

        self.in_lb = QLabel(self)
        self.in_lb.move(150, 600)
        self.pixmap = QPixmap("image/btn_image/input_btn.png")
        self.in_lb.setPixmap(self.pixmap)

        outbtn = QPushButton(self)
        outbtn.clicked.connect(self.clickOut)
        outbtn.resize(550,150)
        outbtn.move(150, 350)
        outbtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        inbtn = QPushButton(self)
        inbtn.resize(550, 150)
        inbtn.move(150, 600)
        inbtn.clicked.connect(self.clickIn)
        inbtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 보관")
        self.show()

    def clickOut(self):
        self.close()
        self.bout = bagMonsterOut.outMonster()

    def clickIn(self):
        self.close()
        self.bin = bagMonsterIn.inMonster()
        