import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import login
import join

class startApp(QWidget):
    def __init__(self):
        super().__init__()
        self.initUi()

    def initUi(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 1, 851, 1201)
        self.pixmap = QPixmap("image/back_image/start_back.jpg")
        self.back.setPixmap(self.pixmap)

        self.login_lb = QLabel(self)
        self.login_lb.move(220, 500)
        self.pixmap = QPixmap("image/btn_image/login_btn.png")
        self.login_lb.setPixmap(self.pixmap)

        self.join_lb = QLabel(self)
        self.join_lb.move(220, 750)
        self.pixmap = QPixmap("image/btn_image/join_btn.png")
        self.join_lb.setPixmap(self.pixmap)

        loginbtn = QPushButton(self)
        loginbtn.clicked.connect(self.clickLoginBtn)
        loginbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        loginbtn.resize(550, 150)
        loginbtn.move(220, 500)

        joinbtn = QPushButton(self)
        joinbtn.clicked.connect(self.clickJoinBtn)
        joinbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        joinbtn.resize(550, 150)
        joinbtn.move(220, 750)

        self.resize(850, 1200)
        self.show()

    def clickLoginBtn(self):
        self.close()
        self.l = login.Login()

    def clickJoinBtn(self):
        self.close()
        self.l = join.Join()