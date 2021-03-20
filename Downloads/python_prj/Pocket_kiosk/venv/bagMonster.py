import user

class BagMonster:
    #장착하는 메서드
    def outBag(self, monster):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        selectMonster = monster.split(",") #선택한 포켓몬
        myMonster = ""
        length = 0
        count = 0
        myMonsterList = []
        resultMonster = ""
        sql = "SELECT * FROM user WHERE id="+str(user.id)
        cursor.execute(sql)
        rows = cursor.fetchall()

        for row in rows:
            myMonster = row[6]

        myMonsterList = str(myMonster).split(",")
        length = len(myMonsterList)-1
        print(length)
        count=length
        print(count)

        for i in range(0, len(myMonsterList)-1):
            resultMonster += str(myMonsterList[i])+","

        print("기존것 : " + resultMonster)

        for i in range(0, len(selectMonster)-1):
            if count < 6:
                resultMonster += str(selectMonster[i])+","
                count+=1
            else :
                break

        sql2 = "UPDATE user SET mypocketmon='"+str(resultMonster)+"' WHERE id="+str(user.id)
        cursor.execute(sql2)
        cnx.commit()

        cursor.close()
        cnx.close()


    #가방에 넣는 메서드
    def inBag(self, monster):
        import mysql.connector
        cnx = mysql.connector.connect(user="root", password="1234", host="127.0.0.1", port=3307, database="pocket")
        cursor = cnx.cursor()

        inMonster = str(monster).split(",") #가방에 넣을 몬스터 리스트로 바꾸기
        resultMonster = ""
        myMonster = ""

        sql = "SELECT * FROM user WHERE id="+str(user.id)
        cursor.execute(sql)
        rows = cursor.fetchall()

        for row in rows:
            myMonster = str(row[6])

        for i in range(0, len(inMonster)-1):
            if inMonster[i] not in myMonster:
                resultMonster += str(inMonster[i])+","

        sql2 = "UPDATE user SET mypocketmon = '" + resultMonster + "' WHERE id="+str(user.id)
        cursor.execute(sql2)
        cnx.commit()

        cursor.close()
        cnx.close()


