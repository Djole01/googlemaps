system requirements: 
	browser that has cookies enabled.

Installation instructions:
	1. add project folder (googlemaps) to local server, for example xampp.
	2. In localhost/phpmyadmin , select database fitness and import fitness.sql from
	project folder: googlemaps/db/fitness.sql
	3. open localhost/googlemaps, should be up and running.

Usage: 
	User will see the set of filtered locations,
	User can create, read, update, delete places, 
	and filter them based on keywords tied to places.
	If user does not enter coordinates, geocoding will do that for him, if he does, the location marker will
	be placed based on the coordinates.
	
Personal Note:
	1. I ran out of time to implement opening hours, I would have done the filtering of it through mysql query.
	2. I wanted to make a class for connecting to database, which would save me lines of code, but approaching the deadline,
	I focus on making it work first.
	
	 
Working hours: 
	About 20 hours in total, 3 hours per day average.
	
