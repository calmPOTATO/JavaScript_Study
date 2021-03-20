import mysql.connector
cnx = mysql.connector.connect(user = "root", password = "1234", host="127.0.0.1", port=3307, database="pocket")
cursor = cnx.cursor()
import user

class HealMonster:
    #가방에 넣는 메서드
    def heal(self, healMonster):
        sql = "SELECT * from user where id="+str(user.id)
        cursor.execute(sql)
        rows = cursor.fetchall()
        for row in rows:
            money = row[3]
            monster = row[4].split(",")
            hp = row[5].split(",")
        resultHp = ""
        healpocketmon = healMonster.split(",")

        print(monster)
        print(healpocketmon)

        if len(healpocketmon) == 3: #치료할 포켓몬이 두마리고
            if money >= 100: #돈이 100보다 많거나 같으면
                for i in range(0, len(monster)-1):
                    if healpocketmon[0] in monster[i]:
                        hp[i] = 100
                    if healpocketmon[1] in monster[i]:
                        hp[i] = 100
                for i in range(0, len(hp)-1):
                    resultHp += str(hp[i])+","

                sql2 = "UPDATE user SET money="+str(money-100)+", hp='"+resultHp+"' WHERE id="+str(user.id)
                cursor.execute(sql2)
                print(sql2)

        if len(healpocketmon) == 2:
            if money >= 50:
                for i in range(0, len(monster)-1):
                    if healpocketmon[0] in monster[i]:
                        hp[i] = 100
                for i in range(0, len(hp)-1):
                    resultHp += str(hp[i])+","
                sql3 = "UPDATE user SET money=" + str(money - 50) + ", hp='" + resultHp + "' WHERE id=" + str(user.id)
                cursor.execute(sql3)
                cnx.commit()
                print(sql3)


        cursor.close()
        cnx.close()






