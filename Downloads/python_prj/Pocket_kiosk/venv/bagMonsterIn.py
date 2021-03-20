import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import bagMonster3
import user
import bagMonster
import mainMenu

class inMonster(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        self.inMonster = ""
        self.bag = bagMonster.BagMonster()

    def initUI(self):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        sql = "SELECT * FROM user WHERE id = "+str(user.id)
        cursor.execute(sql)
        rows = cursor.fetchall()

        print(sql)

        for row in rows:
            myMonster = row[6]  # 내가 지닌 포켓몬
            allHp = row[5]  # 모든 생명
            allMonster = row[4]  # 모든 몬스터

        print(myMonster)
        print(allMonster)
        print(allHp)

        myMonsterList = str(myMonster).split(",")
        allMonsterList = str(allMonster).split(",") #모든 포켓몬
        allHpList = str(allHp).split(",")

        myHp = ""

        for i in range(0, len(myMonsterList) - 1):
            for j in range(0, len(allMonsterList) - 1):
                if myMonsterList[i] == allMonsterList[j]:
                    myHp += str(allHpList[i])+","

        self.usermon = str(myMonster).split(",")  # 내가 가진 포켓몬
        self.userhp = myHp.split(",")  # 포켓몬 생명 배열
        self.length = len(self.usermon) - 1  # 포켓몬 개수

        self.img = {"고라파덕": "image/btn_image/gorapaduck_btn.png",
                    "푸린": "image/btn_image/purin_btn.png",
                    "잠만보": "image/btn_image/jammambo_btn.png",
                    "파이리": "image/btn_image/pieri_btn.png",
                    "이상해씨": "image/btn_image/esangheasee_btn.png",
                    "메타몽": "image/btn_image/metamong_btn.png"}

        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/heal_2.jpg")
        self.back.setPixmap(self.pixmap)

        if self.length >= 1:
            #포켓몬1
            self.moster1 = QLabel(self)
            self.moster1.move(100, 150)
            self.moster1.resize(150, 150)
            self.pixmap = QPixmap(self.img[self.usermon[0]])
            self.moster1.setPixmap(self.pixmap)

            monster1btn = QPushButton(self)
            monster1btn.setStyleSheet("background-color:rgb(0,0,0,0);")
            monster1btn.clicked.connect(self.clickBtn1)

            monster1name = QLabel(self.usermon[0], self)
            monster1hp = QLabel(self.userhp[0], self)
            monster1name.resize(100, 50)
            monster1hp.resize(100, 50)
            monster1btn.resize(150, 150)
            monster1name.move(260, 150)
            monster1hp.move(260, 180)
            monster1btn.move(100, 150)

        if self.length >= 2:
            # 포켓몬2
            self.moster2 = QLabel(self)
            self.moster2.move(450, 150)
            self.moster2.resize(150, 150)
            self.pixmap = QPixmap(self.img[self.usermon[1]])
            self.moster2.setPixmap(self.pixmap)

            monster2btn = QPushButton(self)
            monster2btn.setStyleSheet("background-color:rgb(0,0,0,0);")
            monster2btn.clicked.connect(self.clickBtn2)

            monster2name = QLabel(self.usermon[1], self)
            monster2hp = QLabel(self.userhp[1], self)
            monster2name.resize(100, 50)
            monster2hp.resize(100, 50)
            monster2btn.resize(150, 150)
            monster2name.move(610, 150)
            monster2hp.move(610, 180)
            monster2btn.move(450, 150)

        if self.length >= 3:
            # 포켓몬3
            self.moster3 = QLabel(self)
            self.moster3.move(100, 400)
            self.moster3.resize(150, 150)
            self.pixmap = QPixmap(self.img[self.usermon[2]])
            self.moster3.setPixmap(self.pixmap)

            monster3btn = QPushButton(self)
            monster3btn.setStyleSheet("background-color:rgb(0,0,0,0);")
            monster3btn.clicked.connect(self.clickBtn3)

            monster3name = QLabel(self.usermon[2], self)
            monster3hp = QLabel(self.userhp[2], self)
            monster3name.resize(100, 50)
            monster3hp.resize(100, 50)
            monster3btn.resize(150, 150)
            monster3name.move(260, 400)
            monster3hp.move(260, 430)
            monster3btn.move(100, 400)

        if self.length >= 4:
            # 포켓몬4
            self.moster4 = QLabel(self)
            self.moster4.move(450, 400)
            self.moster4.resize(150, 150)
            self.pixmap = QPixmap(self.img[self.usermon[3]])
            self.moster4.setPixmap(self.pixmap)

            monster4btn = QPushButton(self)
            monster4btn.setStyleSheet("background-color:rgb(0,0,0,0);")
            monster4btn.clicked.connect(self.clickBtn4)

            monster4name = QLabel(self.usermon[3], self)
            monster4hp = QLabel(self.userhp[3], self)
            monster4name.resize(100, 50)
            monster4hp.resize(100, 50)
            monster4btn.resize(150, 150)
            monster4name.move(610, 400)
            monster4hp.move(610, 430)
            monster4btn.move(450, 400)

        if self.length >= 5:
            # 포켓몬5
            self.moster5 = QLabel(self)
            self.moster5.move(100, 650)
            self.moster5.resize(150, 150)
            self.pixmap = QPixmap(self.img[self.usermon[4]])
            self.moster5.setPixmap(self.pixmap)

            monster5btn = QPushButton(self)
            monster5btn.setStyleSheet("background-color:rgb(0,0,0,0);")
            monster5btn.clicked.connect(self.clickBtn5)

            monster5name = QLabel(self.usermon[4], self)
            monster5hp = QLabel(self.userhp[4], self)
            monster5name.resize(100, 50)
            monster5hp.resize(100, 50)
            monster5btn.resize(150, 150)
            monster5name.move(260, 650)
            monster5hp.move(260, 680)
            monster5btn.move(100, 650)

        noticemsg = QLabel("※ 가방에 넣을 포켓몬을 선택해주세요.", self)
        noticemsg.resize(500, 50)
        noticemsg.move(230, 850)

        self.back_btn = QLabel(self)
        self.back_btn.move(0, 0)
        self.pixmap = QPixmap("image/btn_image/mini_back_btn.png")
        self.back_btn.setPixmap(self.pixmap)

        backbtn = QPushButton(self)
        backbtn.clicked.connect(self.clickBack)
        backbtn.resize(200, 80)
        backbtn.move(0, 0)
        backbtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        self.select = QLabel(self)
        self.select.move(250, 950)
        self.select.resize(350, 120)
        self.pixmap = QPixmap("image/btn_image/select.png")
        self.select.setPixmap(self.pixmap)

        selectbtn = QPushButton(self)
        selectbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        selectbtn.resize(350, 120)
        selectbtn.move(250, 950)
        selectbtn.clicked.connect(self.clickSelect)

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 넣기")
        self.show()

    def clickSelect(self):
        self.bag.inBag(self.inMonster)
        self.close()
        self.b3 = bagMonster3.bag3()

    def clickBtn1(self):
        self.inMonster = self.usermon[0]

    def clickBtn2(self):
        self.inMonster = self.usermon[1]

    def clickBtn3(self):
        self.inMonster = self.usermon[2]

    def clickBtn4(self):
        self.inMonster = self.usermon[3]

    def clickBtn5(self):
        self.inMonster = self.usermon[4]

    def clickBtn6(self):
        self.inMonster = self.usermon[5]

    def clickBack(self):
        self.close()
        self.l1 = mainMenu.Lobi()





