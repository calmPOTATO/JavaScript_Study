import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QMessageBox, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import dealMonsterBuy, dealMonsterSell

class deal2(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/shop_2.JPG")
        self.back.setPixmap(self.pixmap)

        self.out = QLabel(self)
        self.out.move(150, 350)
        self.pixmap = QPixmap("image/btn_image/buy_btn.png")
        self.out.setPixmap(self.pixmap)

        self.in_lb = QLabel(self)
        self.in_lb.move(150, 600)
        self.pixmap = QPixmap("image/btn_image/sell_btn.png")
        self.in_lb.setPixmap(self.pixmap)

        buybtn = QPushButton(self)
        buybtn.clicked.connect(self.clickBuy)
        buybtn.resize(550,150)
        buybtn.move(150, 350)
        buybtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        sellbtn = QPushButton(self)
        sellbtn.resize(550, 150)
        sellbtn.move(150, 600)
        sellbtn.clicked.connect(self.clickSell)
        sellbtn.setStyleSheet("background-color:rgb(0,0,0,0);")

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 상점")
        self.show()

    def clickBuy(self):
        self.close()
        self.mbuy = dealMonsterBuy.buy()

    def clickSell(self):
        self.close()
        self.msell = dealMonsterSell.sell()



