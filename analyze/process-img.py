#!C:/Users/ICT/AppData/Local/Programs/Python/Python311/python.exe
print("Content-Type:text/html")
print()
import cgi
import mysql.connector;
import pytesseract
from PIL import Image

print("<h1>welcome to python</h1>");
print("<h1>welcome to python</h1>");
a = 10;
print(a);

# Example how can we retrieve value submiting via php action to python backend
# form = FieldStorage();
# id = form.getvalue("id");




con = mysql.connector.connect(user = 'root',password='',host='localhost',database = 'memehub');
cur = con.cursor();
# Define the INSERT query and data
insert_query = "INSERT INTO test ( name, age) VALUES ( %s, %s)"
dummy_data = ( 'username', '78')

# Execute the INSERT query
# cur.execute(insert_query, dummy_data)
# con.commit(); 
select_query = "SELECT * FROM test"

cur.execute(select_query)
result = cur.fetchall()

for row in result:
    print(row)

cur.close() 
con.close()


# Set the path to the Tesseract executable
pytesseract.pytesseract.tesseract_cmd = r"C:\Program Files\Tesseract-OCR\tesseract.exe"

# Path to the input image file
image_path = r"..\\postimg\\56.jpg"

# Open the image file using PIL (Python Imaging Library)
with Image.open(image_path) as image:
    # Convert the image to grayscale (optional, depending on your image)
    image = image.convert("L")

    # Analyze the text within the image
    text = pytesseract.image_to_string(image)

# Print the extracted text
print(text)
