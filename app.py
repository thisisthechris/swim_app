from unicodedata import name
from flask import Flask, redirect, url_for, render_template, request, jsonify
from flask_mysqldb import MySQL
import pypyodbc


app = Flask(__name__)

print (__name__)

app.config['MYSQL_HOST'] = 'db-mysql-ams3-37368-do-user-9992652-0.b.db.ondigitalocean.com'
app.config['MYSQL_USER'] = 'doadmin'
app.config['MYSQL_PASSWORD'] = 'qLQxuq2jfYaPwptP'
app.config['MYSQL_DB'] = 'defaultdb'
 
mysql = MySQL(app)

connection = pypyodbc.connect(app)

#Creating a connection cursor
cursor = mysql.connection.cursor()
 
#Executing SQL Statements
cursor.execute(''' SELECT * FROM long_course_events ''')
 
#Saving the Actions performed on the DB
mysql.connection.commit()
 
#Closing the cursor
cursor.close()

@app.route('/form')
def form():
    return render_template("form.html")

@app.route('/login', methods = ['POST', 'GET'])
def login():  
    if request.method == 'POST':
        name = request.form['name']
        cursor = mysql.connection.cursor()
        name_id = cursor.execute(''' SELECT swimmer_id FROM swimmers WHERE name = %s''', (name))
        cursor.execute(''' SELECT * FROM long_course_events WHERE swimmer_id = %s''', (name_id))
        user = cursor.fetchnote()
        mysql.connection.commit()
        cursor.close()
        return render_template('user.html', user = user)

@app.route("/user/<int:id>")
def user(id):
    cur = mysql.connection.cursor() 
    cur.execute("""SELECT * FROM student_data WHERE id = %s""", (id,))
    user = cur.fetchone()
    return render_template('user.html', user = user)
    
@app.route('/user.html')
def user():#name):
#    cur = mysql.connection.cursor()
#    name_id = cur.execute(''' SELECT swimmer_id FROM swimmers WHERE name = %s''', (name))
#    cur.execute(''' SELECT * FROM long_course_events WHERE swimmer_id = %s''', (name_id))
#    user = cursor.fetchnote()
    return render_template("user.html")#, user = user)



@app.route('/')
def index():
    return render_template("index.html")

@app.route('/index.html')
def index_():
    return render_template("index.html")

@app.route('/point_time.html')
def point_time():
    return render_template("point_time.html")

@app.route('/point_time_LCM.html')
def point_time_LCM():
    return render_template("point_time_LCM.html")

@app.route('/records.html')
def records():
    return render_template("records.html")

@app.route('/tid_for_svømmer.php')
def tid_for_svømmer():
    return render_template("tid_for_svømmer.php")

@app.route('/hall_of_fame.html')
def hall_of_fame():
    return render_template("hall_of_fame.html")

@app.route('/national_records.html')
def national_records():
    return render_template("national_records.html")

@app.route('/hall_of_fame_athletes.html')
def hall_of_fame_athletes():
    return render_template("hall_of_fame_athletes.html")

@app.route('/platinum.html')
def platinum():
    return render_template("platinum.html")

@app.route('/gold.html')
def gold():
    return render_template("gold.html")

@app.route('/medals.html')
def medals():
    return render_template("medals.html")

@app.route('/w_point_time_LCM.html')
def w_point_time_lcm():
    return render_template("w_point_time_LCM.html")

@app.route('/m_point_time_LCM.html')
def m_point_time_lcm():
    return render_template("m_point_time_LCM.html")

@app.route('/w_point_time_SCM.html')
def w_point_time_SCM():
    return render_template("w_point_time_SCM.html")

@app.route('/m_point_time_SCM.html')
def m_point_time_SCM():
    return render_template("m_point_time_SCM.html")

@app.route('/w_time_point_LCM.html')
def w_time_point_LCM():
    return render_template("w_time_point_LCM.html")

@app.route('/qualification_times.html')
def qualification_times():
    return render_template("qualification_times.html")

if __name__ == "__main__":
    app.run(debug=True)




#@app.route("/user/<int:name>")
#def user(name):
#    cur = mysql.connection.cursor()
#    name_id = cursor.execute(''' SELECT swimmer_id FROM swimmers WHERE name = %s''', (name))
#    cur.execute("""SELECT * FROM long_course_events WHERE swimmer_id = %s""", (name_id,))
#    user = cur.fetchone()
#    return render_template('user.html', user = user)