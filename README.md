## Stack: 
- NoSQL;
- MQ;
- Docker using;
- tests writing;
- PSR compliance;
- PHP 8+;

## Your test task is:
To create a service with information about all the near-Earth objects. It should do the following tasks:

1. Specify a default controller for route / with a proper json return {“hello”:“MacPaw Internship 2022!“}

2. Create Table in DB NearEarthObject
   referenced
   name
   speed (store date per hour)
   is hazardous
   Date
   createdAt
   updatedAt


3. Create a route /neo/hazardous
   display all DB entries which contain potentially hazardous asteroids
   format JSON


4. Create a route /neo/fastest?hazardous=(true|false)
   order by fastest asteroid
   with a hazardous parameter, where true means is hazardous
   default hazardous value is false
   format JSON





## Additional Task.
You don’t have to do it, but it will be a huge plus if you do :) to request the data from the last 3 days from nasa api (https://api.nasa.gov/ -> API Name Asteroids - NeoWs)
response contains count of Near-Earth Objects (Asteroids - NeoWs)
persist the values in your DB

Define the model as follows:
- date
- reference (neo_reference_id)
- name
- speed (kilometers_per_hour)
- is hazardous (is_potentially_hazardous_asteroid)

