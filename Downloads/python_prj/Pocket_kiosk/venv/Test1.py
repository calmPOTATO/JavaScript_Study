import mysql.connector
cnx = mysql.connector.connect(user = "root", password = "1234", host="127.0.0.1", port=3307, database="pocket")
cursor = cnx.cursor()

sql = "SELECT * FROM user WHERE id=11"
cursor.execute(sql)
rows = cursor.fetchall()

for row in rows:
    myMonster = row[6] #내가 지닌 포켓몬
    allHp = row[5] #모든 생명
    allMonster = row[4] #모든 몬스터

myMonsterList = str(myMonster).split(",")
allMonsterList = str(allMonster).split(",")
allHpList = str(allHp).split(",")

print(myMonsterList)
print(allMonsterList)
print(allHpList)

myHp = ""
myHpList = []

for i in range(0, len(myMonsterList)-1):
    for j in range(0, len(allMonsterList)-1):
        if myMonsterList[i] == allMonsterList[j]:
            myHpList = str(allHpList[j]).split(",")



print(myHpList)










