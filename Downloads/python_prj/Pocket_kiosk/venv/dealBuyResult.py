import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QMessageBox, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import mainMenu

class BuyResult(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()

    def initUI(self):
        self.back = QLabel(self)
        self.back.setGeometry(0, 0, 852, 1202)
        self.pixmap = QPixmap("image/back_image/buy_end.jpg")
        self.back.setPixmap(self.pixmap)

        self.lobi = QLabel(self)
        self.lobi.move(550, 1090)
        self.lobi.resize(250, 100)
        self.pixmap = QPixmap("image/btn_image/gotolobi_btn.png")
        self.lobi.setPixmap(self.pixmap)

        lobibtn = QPushButton(self)
        lobibtn.resize(250, 100)
        lobibtn.move(550, 1090)
        lobibtn.setStyleSheet("background-color:rgb(0,0,0,0);")
        lobibtn.clicked.connect(self.clickLobi)

        self.resize(850, 1200)
        self.setWindowTitle("포켓몬 구매")
        self.show()

    def clickLobi(self):
        self.close()
        self.l1 = mainMenu.Lobi()


