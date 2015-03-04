--- Database Setup ---

SQL script to create the MySQL database and table is in _assets/_sql

From there you can just change the host, username, and password attributes 
in the dataLink class to match accordingly.

--- Database Setup End ---


--- Project Setup ---

Place all files and directories into the servers
root folder inside a directory named "picServe"



Web Service # 1

direct request to:

www.<host>/picserve/?action=getpics&start=n

 -  just setting action will retrieve all the pics in the _india subdirectory
 -  setting start value wll start from that index in the folder
 -  a request without the action "getpics" will return blank




 Web Service # 2

 direct request to:

 www.<host>/picserve/regApps?id=

 This will input the id in the get request to the registration database.
  An XML response is returned either letting you know the id exists, it was added, or the database couldn't be contacted.




  Web App # 1

www.<host>/picserve/addpics.php

will upload pics to the _india subdirectory




Web App/Service # 2

www.<host>/picserve/push.php

a message can be entered for the push notification. after submission the app
will pull each app id in the registration database,
and send those to the android service that pushes the message
to each regsitered device.




