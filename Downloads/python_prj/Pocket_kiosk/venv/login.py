import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel, QLineEdit
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import mainMenu
import user

class Login(QWidget):
    def __init__(self):
        super().__init__()
        self.u = user.User()
        self.initUi()

    def initUi(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 1, 851, 1201)
        self.pixmap = QPixmap("image/back_image/join_back.jpg")
        self.back.setPixmap(self.pixmap)

        self.ok_lb = QLabel(self)
        self.ok_lb.move(225, 850)
        self.pixmap = QPixmap("image/btn_image/login_check_btn.png")
        self.ok_lb.setPixmap(self.pixmap)

        Codemsg = QLabel("트레이너 코드", self)
        Codemsg.resize(300, 55)
        Codemsg.move(150, 300)
        Codemsg.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")
        font = Codemsg.font()
        font.setPointSize(15)
        Codemsg.setFont(font)

        self.inputCODE = QLineEdit(self)
        self.inputCODE.resize(500, 120)
        self.inputCODE.move(150, 380)
        self.inputCODE.setStyleSheet("font: 87 30pt \"Tmon몬소리 Black\";")

        PWmsg = QLabel("비밀번호", self)
        PWmsg.resize(150, 55)
        PWmsg.move(150, 550)
        PWmsg.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        self.inputPW = QLineEdit(self)
        self.inputPW.resize(500, 120)
        self.inputPW.move(150, 620)
        self.inputPW.setStyleSheet("font: 87 30pt \"Tmon몬소리 Black\";")

        loginbtn = QPushButton(self)
        loginbtn.clicked.connect(self.clickLogin)
        loginbtn.resize(400, 100)
        loginbtn.move(220, 850)
        loginbtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        self.resize(850, 1200)
        self.show()

    def clickLogin(self):
        self.u_code = self.inputCODE.text()
        self.u_pw = self.inputPW.text()
        #islogin은 로그인 되었는지 판별하는 것
        self.check = self.u.login(self.u_code, self.u_pw)

        if(self.check == 0) :
            self.u.updateAll()
            self.close()
            self.m = mainMenu.Lobi()
        elif(self.check != 0):
            pass
