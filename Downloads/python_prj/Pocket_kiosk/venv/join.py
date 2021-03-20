import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton,QLineEdit, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import user
import appStart

class Join(QWidget):
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
        self.ok_lb.move(225, 800)
        self.ok_lb.resize(400, 100)
        self.pixmap = QPixmap("image/btn_image/join_check.png")
        self.ok_lb.setPixmap(self.pixmap)

        Codemsg = QLabel("트레이너 코드", self)
        Codemsg.resize(300, 50)
        Codemsg.move(225, 250)
        font = Codemsg.font()
        Codemsg.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")
        font.setPointSize(15)
        Codemsg.setFont(font)

        self.inputCODE = QLineEdit(self)
        self.inputCODE.resize(400, 80)
        self.inputCODE.move(225, 300)
        self.inputCODE.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        PWmsg = QLabel("비밀번호", self)
        PWmsg.resize(150, 50)
        PWmsg.move(225, 400)
        font1 = PWmsg.font()
        font1.setPointSize(15)
        PWmsg.setFont(font)
        PWmsg.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        self.inputPW = QLineEdit(self)
        self.inputPW.resize(400, 80)
        self.inputPW.move(225, 450)
        self.inputPW.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        self.inputPW_check = QLineEdit(self)
        self.inputPW_check.resize(400, 80)
        self.inputPW_check.move(225, 600)
        self.inputPW_check.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        Chkmsg = QLabel("비밀번호 재확인", self)
        Chkmsg.resize(300, 50)
        Chkmsg.move(225, 550)
        Chkmsg.setStyleSheet("font: 87 20pt \"Tmon몬소리 Black\";")

        joinbtn = QPushButton(self)
        joinbtn.resize(400, 100)
        joinbtn.move(225, 800)
        joinbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        joinbtn.clicked.connect(self.clickJoinbtn)

        self.resize(850, 1200)
        self.show()

    def clickJoinbtn(self):
        self.u_code = self.inputCODE.text()
        self.u_pw = self.inputPW.text()
        self.u_chk = self.inputPW_check.text()
        #비밀번호와 비밀번호 재확인이 맞다면
        if(self.u_pw==self.u_chk):
            self.u.join(self.u_code, self.u_pw)

        self.close()
        self.start = appStart.startApp()




