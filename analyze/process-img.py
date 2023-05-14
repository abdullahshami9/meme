#!C:/Users/ICT/AppData/Local/Programs/Python/Python311/python.exe
print("Content-Type:text/html")
print()
import cgi

print("<h1>welcome to python</h1>");
print("<h1>welcome to python</h1>");
a = 10;
print(a);

# Example how can we retrieve value submiting via php action to python backend
# form = FieldStorage();
# id = form.getvalue("id");


import mysql.connector

con = mysql.connector.connect(user = 'root',password='',host='localhost',database = 'memehub');
cur = con.cursor();
cur.execute("insert into profile values(%s,%s,%s)",(id,username,passwords));
cur.commit();
print(cur);
cur.close()
con.close()
