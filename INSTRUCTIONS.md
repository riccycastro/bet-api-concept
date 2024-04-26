## Objective

You are tasked with creating a simple, yet secure, betting API. This API will process bet requests from users, ensuring that the request comes from a valid user with sufficient balance. Based on the user's bet, the system will generate a secure random number between 0 and 13 and calculate the payout based on this number.

Please stick to using native PHP functionality as much as possible and avoid external libraries. If you do need to use a library, ensure you can justify its necessity for the specific functionality it provides.

### Requirements

The app should have an API endpoint that validates and processes the bet request. It should respond with the bet details and the user's new balance.

### Database Schema

We have an initial suggested schema in [database.sql](database.sql) consisting of three tables: `users`, `balances`, and `bets`. The schema likely could use some improvements.

### Bonus (Optional)

- Make the app support multiple currencies.
- Optimize the database performance.
- Optimize the payout to ensure the game is profitable for the casino. You could aim for a Return to Player (RTP) of 95%. This means the game will pay back 95% to the players on average over a very long time.

### Evaluation Criteria

- Code cleanliness and organisation.
- Security and performance.
- Implementation of bonus features (if any.)

### Submission Guidelines

- Your submission should include all source code files and any other resources necessary to run the API.
- Provide a README file with:
  - Instructions on how to set up and run your API.
  - Any assumptions you made or additional features you added.

### Docker

We have provided a Docker Compose to help easy development. If you want to use your own local server without Docker, this is fine too. To run our docker compose, you should only have to run:

```
docker compose up
```

It will start a server on [localhost:8090](http://localhost:8090) and [localhost:8091](http://localhost:8091) for phpMyAdmin. You can use the following credentials to connect to the DB:

```
$hostname = "db";
$username = "test_user";
$password = "test_password";
$database = "test_database";
```