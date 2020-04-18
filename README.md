
- Create a very simple MySQL database having two tables that is
employees[ id, emp_id, epm_name, ip_address] and employee_web_history[ip_address, url, date] tables. These table should be created through migration files.

- Create GET, POST, DELETE API end points to get, insert and delete the employee websearch data based on the ip_address as a key. Your code should must have
model for each table, controller to handle the API requests and repository to do operation and format data.

- Create 3 console command to operate these API requests in command line interface. All of the commands are going to be fed to you one line at a time via stdin, and your job is to process the commands and to perform whatever operation the command dictates. All the response will come with json result.

Data Commands
Your functionality should accept the following commands:

	SET empdata [emp_id] [emp_name] [ip_address] : Insert the employee details to employee table with data emp_id, emp_name, ip_address.
	GET empdata [ip_address] : Get the employee details having the ip_address
	UNSET empdata [ip_address] : Soft delete the data  having the passed ip_address
	SET empwebhistory [ip_address] [url] : It will first check if the ip address is assigned to any employee or not if the ip address is there then it will insert the url  variable [url] to the mapped  ip_address [ip_address], other with it will throw error.
	GET empwebhistory [ip_address] : Print out the employee details with his web search history  stored under the variable [ip_address]. Print NULL if that ip_address doesn’t have any data
	UNSET empwebhistory [ip_address] :Delete all the web search history data mapped with ip_address.
	END:Exit the program.

Examples

So here is a sample input:
1) 

SET empdata 1 ‘Jack Petter’ ‘192.168.10.10’
GET empdata ‘192.168.10.10’
UNSET empdata ‘192.168.10.10’
GET empdata ‘192.168.10.10’

SET empwebhistory 192.168.10.10 ‘http://google.com’

GET empwebhistory  192.168.10.10

UNSET empwebhistory  192.168.10.10

GET empwebhistory 192.168.10.10

END

And its corresponding output:


"employee": {  
"id": 1
"empId": "1",   
"empName": "Jack Petter",   
"empIpAddress": "191.168.10.10"
}

NULL
Resource not found
NULL
Resource not found
NULL


2) 
SET empdata 1 ‘Jack Petter’ ‘192.168.10.10’
GET empdata ‘192.168.10.10’

SET empwebhistory 192.168.10.10 ‘http://google.com’
SET empwebhistory 192.168.10.10 ‘http://facebook.com’

GET empwebhistory  192.168.10.10

UNSET empwebhistory  192.168.10.10

GET empwebhistory 192.168.10.10

END

And its corresponding output:


"employee": {  
"id": 1
"empid": "1",   
"empName": "Jack Petter",   
"empIpAddress": "191.168.10.10"
}


“employeewebhistory”: {
"id": 1
"empIpAddress": "191.168.10.10",   
"urls": {
	  “url”: "http://google.com",
	  “url”: “http://facebook.com”
}
}
NULL
=======================================================================================================================================
1) Clone the Repository in local pc

2) Go to Laravel project folder and run command "composer update"
3) Rund command "php artisan migrate" to create tables
   Run command "php artisan list". Below command will be appear in list

empdata                                                                  
 empdata:GET          Fetch employee data through IP address             
 empdata:SET          Set Employee date id,name and IP address           
 empdata:UNSET        Unset Employee data     

empwebhistory                                                            
 empwebhistory:GET    Get Employee web history data by IP Address        
 empwebhistory:SET    Set Employee web history add IP Address and URL    
 empwebhistory:UNSET  Unset Employee web history by IP Address
 
 4) Set emp data by below command:
    php artisan empdata:SET 2 JackPeter 191.168.10.10 (Success message will return "Record created";
 
 5) Get emp data by IP address below command:
    php artisan empdata:GET 191.168.10.10
    output: [{"emp_id":2,"emp_name":"JackPeter","ip_address":"191.168.10.10"}]
    
 6) Unset emp data by ip address below command:
    php artisan empdata:UNSET 191.168.10.10
    output:Record Deleted Successfully
    ---------------------------------------------- empdata set completed ------------------------------------------
    
  7) php artisan empwebhistory:SET 192.168.10.10 www.google.com 
  Error: IP Address not associated with employee. Please add employee and ip address first
    "Becuase ip address 192.168.10.10 not exist. Set IP with below command:
     php artisan empdata:SET 3 JACK 192.168.10.10
    
   Set with correct IP addrss
   php artisan empwebhistory:SET 192.168.10.10 www.google.com 
   output: Web history details added successfully.
 8) Get Empweb history by ip below command:
    php artisan empwebhistory:GET 192.168.10.10
    output:{"emp_id":3,"ip_address":"192.168.10.10","urls":[{"url":"www.google.com"}]}
    
 9) Unset Web history by below command:
    php artisan empwebhistory:UNSET 192.168.10.10
    output:Record Deleted Successfully
 
 10) After unset check webhistory data exist or not below command:
    php artisan empwebhistory:GET 192.168.10.10
    output:{"emp_id":3,"ip_address":"192.168.10.10","urls":[]}

