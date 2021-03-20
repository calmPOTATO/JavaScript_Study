import mysql.connector
cnx = mysql.connector.connect(user = "root", password = "1234", host="127.0.0.1", port=3307, database="pocket")
cursor = cnx.cursor()

id = 0
code = "" #트레이너 코드
pw = "" #비밀번호
money = 0 #돈
pocketmon = "" #가지고 있는 포켓몬
hp = "" #가지고 있는 포켓몬의 hp
mypocketmon = "" #지니고 다니는 포켓몬
sellcount = 0
buycount = 0

class User:
    def join(self, u_code, u_pw):
        sql = "INSERT INTO user (user_code, pw) VALUES(%s, %s)"
        cursor.execute(sql, (u_code, u_pw))
        cnx.commit()


    def login(self, u_code, u_pw):
        check = 1
        sql = "SELECT * FROM user"
        cursor.execute(sql)
        #DB에 있는 user 다 가져오기
        rows = cursor.fetchall()
        #하나씩 꺼내오기
        for row in rows:
            if(u_code == row[1] and u_pw == row[2]):
                print(row)
                check=0
                global code
                code = u_code
                global pw
                pw = u_pw
                break
            else :
                check += 1

        return check



    #로그인한 유저의 모든 값 가져오기
    def updateAll(self):
        sql = "SELECT * from user where user_code='" + code + "'"
        cursor.execute(sql)
        rows = cursor.fetchall()

        for row in rows:
            global id
            id = row[0]
            global money
            money = row[3]
            global pocketmon
            pocketmon = row[4]
            global hp
            hp = row[5]
            global mypocketmon
            mypocketmon = row[6]
            global sellcount
            sellcount = row[7]
            global buycount
            buycount = row[8]


            print(money)
            print(pocketmon)
            print(hp)
            print(mypocketmon)
            print(sellcount)
            print(buycount)




