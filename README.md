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
The project has 5 controllers, 2 views and 6 routes.

* ```'/'``` (GET) ```UpdateDatabaseController``` ```playGamesBeforePlayoff()``` method generates games within A and B divisions the way teams play with each other. Data is passed to ```games``` table and occurs redirection to route ```tables```.
* ```'/tables'``` (GET) Displays two tables (A and B divisions) containing results of all games and total score for each team. According to results, 4 teams of each division are selected with a purpose to get into playoffs. ```CompetitionController```'s ```createDivisionTables()``` method returns ```tables``` view.
* ```'/play'``` (GET) ```QuarterfinalController``` generates games between A and B division teams the way the strongest one from A fights with weakest one from B. The winner will be always defined randomly. Data is passed to ```quarterfinals``` table. Occurs redirection to action ```SemifinalController```. 
* ```'/semifinal'``` (GET) ```SemifinalController``` There are 4 winners in quarterfinal who will play in the semifinal: 1st winner fights with 2nd one, and 3rd winner with 4th one respectively.Data is passed to ```semifinals``` table. Occurs redirection to action ```FinalController```.
* ```'/final'``` (GET) ```FinalController``` After, in final there will be 2 fights: between 2 semifinal winners for 1st and 2nd place, and between 2 semifinal losers for 3rd place. Data is passed to ```finals``` table. Occurs redirection to route ```playoff```.
* ```'/playoff'``` (GET) Displays playoff bracket using returned view ```playoff``` of ```CompetitionController```'s ```runPlayoff()``` method. A small table shows info about championship winner and those who got 2nd and 3rd place. A large table contains detailed info about all the teams with a final total score. Clicking on the button below all the levels will be generated again taking into account teams, generated in the very beginning. If you want to change them, run ```php artisan migrate:fresh``` and ```php artisan db:seed```
