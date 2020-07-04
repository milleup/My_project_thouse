<?php
echo '
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
    </head>
    <body>
       <h1><b>Menu</b></h1>
       <p><a href="https://192.168.0.101:8001/admin">Admins</a></p>
       <p><a href="https://192.168.0.101:8001/employee">Employees</a></p>
        <p> <a href="https://192.168.0.101:8001/department">Departments</a></p>
        <p> <a href="https://192.168.0.101:8001/product">Products</a></p>
        <p> <a href="https://192.168.0.101:8001/sale">Sales</a></p>
        
        
    </body>' . array_shift($errors);