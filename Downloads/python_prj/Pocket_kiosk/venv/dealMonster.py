import user
import random

monsterPrice = 0
sellmonster = ""
sellcnt = 0

class dealMonster:
    #선택완료와 다시시도 버튼 누르면 호출(가격 책정하는 메서드)
    def setPrice(self, monster):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        if user.sellcount<3:
            global monsterPrice
            monsterPrice = random.randrange(15, 151)
            global sellmonster
            sellmonster = monster
            global sellcnt
            sellcnt = user.sellcount
            print(str(monsterPrice) + "원")
            user.sellcount += 1
            print(user.sellcount)

            sql = "UPDATE user SET sellcount = " + str(user.sellcount) + "  WHERE id = "+str(user.id)
            print(sql)
            cursor.execute(sql)

        cursor.close()
        cnx.close()

    #팔기 버튼 누르면 호출
    def sellMonster(self):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        sql = "SELECT * from user where user_code='" + user.code + "'"
        cursor.execute(sql)
        rows = cursor.fetchall()

        for row in rows:
            pocketmon = row[4]
            hp = row[5]
            money = row[3]

        # 팔 포켓몬을 제외한 문자열
        usermon = pocketmon.split(",")
        userhp = hp.split(",")
        resultMonster = ""
        resultHp = ""
        print(userhp)
        for i in range(0, len(usermon) - 1):
            if usermon[i] != sellmonster and usermon[i] != "":
                resultMonster += usermon[i] + ","
                resultHp += userhp[i] + ","

        sql = "UPDATE user SET pocketmon = '" + resultMonster + "', money=" + str(
            (money + monsterPrice)) + ", hp = '" + resultHp + "' WHERE id=" + str(user.id)
        cursor.execute(sql)
        cnx.commit()

        cursor.close()
        cnx.close()


    #사는 메서드
    def buyMonster(self, pocketmon, count):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        pocketmoncnt = user.pocketmon.split(",")
        self.allPocketmon = user.pocketmon+pocketmon
        if count==2 and len(pocketmoncnt) < 5:
            self.allHp = "20,20,"
            if user.money >= 200 and user.buycount<2:
                self.money = user.money-200
                user.buycount += 2
                sql = "update user set pocketmon = '"+self.allPocketmon+"', money = " + str(self.money) + ", hp = '" + self.allHp + "', buycount = 2 where id = " + str(user.id)
                cursor.execute(sql)
                cnx.commit()
            else:
                print("돈 없다")
        elif count==1 and len(pocketmoncnt) <= 5:
            self.allHp = "20,"
            if user.money >= 100 and user.buycount<2:
                self.money = user.money - 100
                user.buycount += 1
                sql = "update user set pocketmon = '" + self.allPocketmon + "', money = " + str(self.money) + ", hp = '" + self.allHp + "', buycount = " + str(user.buycount) + " where id = " + str(user.id)
                cursor.execute(sql)
                cnx.commit()
            else:
                print("돈 없다")
        else:
            print("선택한 포켓몬 없다.")

        cursor.close()
        cnx.close()


