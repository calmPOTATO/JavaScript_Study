import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import dealBuyResult
import dealMonster
import mainMenu

class buy(QWidget):
    def __init__(self):
        super().__init__()
        self.deal = dealMonster.dealMonster()
        self.initUI()
        self.buyMonster = ""
        self.count = 0

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/shop_2.JPG")
        self.back.setPixmap(self.pixmap)
        #포켓몬1
        self.moster1 = QLabel(self)
        self.moster1.move(100, 150)
        self.moster1.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/gorapaduck_btn.png")
        self.moster1.setPixmap(self.pixmap)

        monster1btn = QPushButton(self)
        monster1btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster1name = QLabel("고라파덕", self)
        monster1hp = QLabel("20", self)
        monster1price = QLabel("100", self)
        monster1name.resize(100, 50)
        monster1hp.resize(100, 50)
        monster1price.resize(100, 50)
        monster1btn.resize(150, 150)
        monster1name.move(260, 150)
        monster1hp.move(260, 180)
        monster1price.move(260, 210)
        monster1btn.move(100, 150)
        monster1btn.clicked.connect(self.clickMonster1)

        # 포켓몬2
        self.moster2 = QLabel(self)
        self.moster2.move(450, 150)
        self.moster2.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/purin_btn.png")
        self.moster2.setPixmap(self.pixmap)

        monster2btn = QPushButton(self)
        monster2btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster2name = QLabel("푸린", self)
        monster2hp = QLabel("20", self)
        monster2price = QLabel("100", self)
        monster2name.resize(100, 50)
        monster2hp.resize(100, 50)
        monster2price.resize(100, 50)
        monster2btn.resize(150, 150)
        monster2name.move(610, 150)
        monster2hp.move(610, 180)
        monster2price.move(610, 210)
        monster2btn.move(450, 150)
        monster2btn.clicked.connect(self.clickMonster2)

        # 포켓몬3
        self.moster3 = QLabel(self)
        self.moster3.move(100, 400)
        self.moster3.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/jammambo_btn.png")
        self.moster3.setPixmap(self.pixmap)

        monster3btn = QPushButton(self)
        monster3btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster3name = QLabel("잠만보", self)
        monster3hp = QLabel("20", self)
        monster3price = QLabel("100", self)
        monster3name.resize(100, 50)
        monster3hp.resize(100, 50)
        monster3price.resize(100, 50)
        monster3btn.resize(150, 150)
        monster3name.move(260, 400)
        monster3hp.move(260, 430)
        monster3price.move(260, 450)
        monster3btn.move(100, 400)
        monster3btn.clicked.connect(self.clickMonster3)

        # 포켓몬4
        self.moster4 = QLabel(self)
        self.moster4.move(450, 400)
        self.moster4.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/pieri_btn.png")
        self.moster4.setPixmap(self.pixmap)

        monster4btn = QPushButton(self)
        monster4btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster4name = QLabel("파이리", self)
        monster4hp = QLabel("20", self)
        monster4price = QLabel("100", self)
        monster4name.resize(100, 50)
        monster4hp.resize(100, 50)
        monster4price.resize(100, 50)
        monster4btn.resize(150, 150)
        monster4name.move(610, 400)
        monster4hp.move(610, 430)
        monster4price.move(610, 450)
        monster4btn.move(450, 400)
        monster4btn.clicked.connect(self.clickMonster4)

        # 포켓몬5
        self.moster5 = QLabel(self)
        self.moster5.move(100, 650)
        self.moster5.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/esangheasee_btn.png")
        self.moster5.setPixmap(self.pixmap)

        monster5btn = QPushButton(self)
        monster5btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster5name = QLabel("이상해씨", self)
        monster5hp = QLabel("20", self)
        monster5price = QLabel("100", self)
        monster5name.resize(100, 50)
        monster5hp.resize(100, 50)
        monster5price.resize(100, 50)
        monster5btn.resize(150, 150)
        monster5name.move(260, 650)
        monster5hp.move(260, 680)
        monster5price.move(260, 710)
        monster5btn.move(100, 650)
        monster5btn.clicked.connect(self.clickMonster5)

        # 포켓몬6
        self.moster6 = QLabel(self)
        self.moster6.move(450, 650)
        self.moster6.resize(150, 150)
        self.pixmap = QPixmap("image/btn_image/metamong_btn.png")
        self.moster6.setPixmap(self.pixmap)

        monster6btn = QPushButton(self)
        monster6btn.setStyleSheet("background-color:rgb(0,0,0,0);")

        monster6name = QLabel("메타몽", self)
        monster6hp = QLabel("20", self)
        monster6price = QLabel("100", self)
        monster6name.resize(100, 50)
        monster6hp.resize(100, 50)
        monster6price.resize(100, 50)
        monster6btn.resize(150, 150)
        monster6name.move(610, 650)
        monster6hp.move(610, 680)
        monster6price.move(610, 710)
        monster6btn.move(450, 650)
        monster6btn.clicked.connect(self.clickMonster6)

        noticemsg = QLabel("※ 구매할 포켓몬을 고르세요. (두 개까지 구매가능)", self)
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
        selectbtn.clicked.connect(self.clickSelect)
        selectbtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        selectbtn.resize(350, 120)
        selectbtn.move(250, 950)

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 구매")
        self.show()

    def clickMonster1(self):
        if self.count == 0 or self.count==1:
            self.buyMonster += "고라파덕,"
            self.count += 1
        else:
            print("초과")
            
    def clickMonster2(self):
        if self.count == 0 or self.count == 1:
            self.buyMonster += "푸린,"
            self.count += 1
        else:
            print("초과")

    def clickMonster3(self):
        if self.count == 0 or self.count == 1:
            self.buyMonster += "잠만보,"
            self.count += 1
        else:
            print("초과")

    def clickMonster4(self):
        if self.count == 0 or self.count == 1:
            self.buyMonster += "파이리,"
            self.count += 1
        else:
            print("초과")

    def clickMonster5(self):
        if self.count == 0 or self.count == 1:
            self.buyMonster += "이상해씨,"
            self.count += 1
        else:
            print("초과")

    def clickMonster6(self):
        if self.count == 0 or self.count == 1:
            self.buyMonster += "메타몽,"
            self.count += 1
        else:
            print("초과")

    def clickSelect(self):
        self.deal.buyMonster(self.buyMonster, self.count)
        self.close()
        self.b_result = dealBuyResult.BuyResult()

    def clickBack(self):
        self.close()
        self.l1 = mainMenu.Lobi()


