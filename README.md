![demonstration](https://raw.githubusercontent.com/ZannaZarina/championship/master/championship.gif)

### How to run a project
1. Clone repository
2. cd into your project
3. Run ```composer install``` and ```npm install```
4. Create a copy of .env.example file by running ```cp .env.example .env```
5. To generate app encryption, run ```php artisan key:generate```
6. Create an empty database
7. In the .env file edit the DB_DATABASE, DB_USERNAME, and DB_PASSWORD fields
8. Migrate your database: ```php artisan migrate```
9. Generate fake data ```php artisan db:seed```
10. ```php artisan serve``` to run a project

### Description
The project has 2 controllers, 2 views and 4 routes.
2 routes are responsible for updating database:
* ```'/'``` (GET) ```UpdateDatabaseController``` ```playGamesBeforePlayoff()``` method generates games within A and B divisions the way teams play with each other. Data is passed to ```games``` table and occurs redirection to route ```tables```
* ```'/tables'``` (GET) Displays two tables (A and B divisions) containing results of all games and total score for each team. According to results 4 teams of each division are selected with a purpose to get into play-offs. ```CompetitionController```'s ```createDivisionTables()``` method returns ```tables``` view.

