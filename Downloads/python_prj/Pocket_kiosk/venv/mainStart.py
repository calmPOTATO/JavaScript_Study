import sys
from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QLabel
from PyQt5.QtCore import QCoreApplication
from PyQt5.QtGui import QPixmap
import appStart

app = QApplication(sys.argv)
main = appStart.startApp()
sys.exit(app.exec_())

