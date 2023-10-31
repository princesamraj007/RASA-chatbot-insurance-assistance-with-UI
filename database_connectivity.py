import mysql.connector

def DataUpdate(na,ma,ad,nu,ri):
    mydb = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "1234",
        database = "Policy_holders"
    )

    mycursor = mydb.cursor()

    #sql = "CREATE TABLE Customer_D (Name VARCHAR(255), MailID VARCHAR(255), Address VARCHAR(255), PhNumber VARCHAR(255));"
    sql = 'INSERT INTO Customer_D (Name, MailID, Address, PhNumber, id) VALUES ("{0}", "{1}", "{2}", "{3}", "{4}")'.format(na, ma, ad, nu, ri)
    mycursor.execute(sql)

    mydb.commit()

    print(mycursor.rowcount, "record inserted")

if __name__=="__main__":
    DataUpdate("venkat", "venkat@gmail.com", "123,main street", "9080081844")

def DataFeedUpdate(fid,fcomp,feedback):
    mydb = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "1234",
        database = "Policy_holders"
    )

    mycursor = mydb.cursor()

    #sql = "CREATE TABLE Customer_D (Name VARCHAR(255), MailID VARCHAR(255), Address VARCHAR(255), PhNumber VARCHAR(255));"
    sql = 'INSERT INTO Customer_feed (Id, Company_name, Feedback) VALUES ("{0}", "{1}", "{2}")'.format(fid, fcomp, feedback)
    mycursor.execute(sql)

    mydb.commit()

    print(mycursor.rowcount, "record inserted")

if __name__=="__main__":
    DataUpdate("venkat", "venkat@gmail.com", "123,main street")

def DataPoliUpdate(i_poli,i_id,date):
    mydb = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "1234",
        database = "Policy_holders"
    )

    mycursor = mydb.cursor()

    #sql = "CREATE TABLE Customer_policy (Policy VARCHAR(255), Id INT);"
    sql = 'INSERT INTO Customer_policy (Policy, Id, date) VALUES ("{0}", "{1}", "{2}")'.format(i_poli, i_id, date)
    mycursor.execute(sql)

    mydb.commit()

    print(mycursor.rowcount, "record inserted")

if __name__=="__main__":
    DataUpdate("venkat", "venkat@gmail.com", "123,main street")



