import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import mainMenu
import dealMonster
import user

class SellResult(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        self.deal = dealMonster.dealMonster()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/bitcoin_back.jpg")
        self.back.setPixmap(self.pixmap)

        price = QLabel(str(dealMonster.monsterPrice), self)
        price.resize(500, 200)
        price.move(40, 10)
        price.setStyleSheet("font: 87 25pt \"Tmon몬소리 Black\";")

        self.re = QLabel(self)
        self.re.move(50, 1090)
        self.re.resize(250, 100)
        self.pixmap = QPixmap("image/btn_image/tryagain_btn.png")
        self.re.setPixmap(self.pixmap)

        self.lobi = QLabel(self)
        self.lobi.move(550, 1090)
        self.lobi.resize(250, 100)
        self.pixmap = QPixmap("image/btn_image/gotolobi_btn.png")
        self.lobi.setPixmap(self.pixmap)

        trynum = QLabel(str(3-dealMonster.sellcnt-1)+"번 남았습니다.", self)
        trynum.resize(200, 50)
        trynum.move(80, 1040)
        trynum.setStyleSheet("font: 87 15pt \"Tmon몬소리 Black\";")

        #다시 시도
        retrybtn = QPushButton(self)
        retrybtn.resize(250, 100)
        retrybtn.move(50, 1090)
        retrybtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        retrybtn.clicked.connect(self.clickRetry)

        lobibtn = QPushButton(self)
        lobibtn.resize(250, 100)
        lobibtn.move(550, 1090)
        lobibtn.clicked.connect(self.clickLobi)
        lobibtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 판매")
        self.show()

    def clickLobi(self):
        self.deal.sellMonster()
        self.close()
        self.l1 = mainMenu.Lobi()

    def clickRetry(self):
        self.deal.setPrice(dealMonster.sellmonster)
        self.close()
        self.s = SellResult()




