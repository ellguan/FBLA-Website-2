Writing to myself (and anyone else who sees this) on this because as an very inexperienced programmer, I made way too many mistakes I 
could've avoided had I known these things beforehand:
1. XAMPP is stupid. Maybe it would've been better to use something else honestly.
2. The "ibdata1" file in mysql/data is extremely important. Don't delete it carelessly. Instead, if MySQL shuts down expectantly,
use this link to fix it:
https://stackoverflow.com/questions/38759870/xampp-mysql-table-doesnt-exist-in-engine-1932 
3. Make a backend page on the website before inputting things in the database. It makes everyone's lives easier. 

In terms of the state of this website right now, it's still flawed. However, it should work, including the fact that I (finally) added 
the SQL databases...
Please note:
-> When moving this code to a hosting site, remember to change config.php (PDO) and mysqlconfig.php (MYSQLI) files for the 
useraccounts database username and password.
-> Because I was ignorant and deleted the oh so precious "ibdata1" file in mysql/data, now my current adminlogin, login, and noodles 
databases are corrupt. I managed to salvage the data from my previously downloaded database data and making new databases called 
adminlogin2, login2, and noodles2, and changed all instances of the previous database names in the source code. 

Thank you for reading this! <3
-Ellen, 8/13/23