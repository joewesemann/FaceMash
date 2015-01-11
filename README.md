# FaceMash
Implementation of a famous web app made by Mark Zuckerberg at Harvard. 

Setup:
- Change database connection file in /includes folder to connect to your database 
- Create a table called "images" with columns "image_id (int, Primary, Auto-Increment ID)", "image_path (VarChar)", and "score (int)".
- Image paths are stored on the database, instead of the image itself. To load images into the database, simply move the images into the /img folder and then navigate to facemash/zing in the browser. Zing is a script that will execute, and pull the image paths into the database. 
- You are up and running!

