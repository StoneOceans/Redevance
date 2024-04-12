# test.py

import mysql.connector

cnx = mysql.connector.connect(user='root', password='dev-data2023',
                              host='127.0.0.1',
                              database='laravelProject')
cnx.close()
