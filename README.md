<img alt="laravel" src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">

## Implementing Hexagonal Architecture in a Laravel Project

> If you don't know what `Hexagonal Architecture` is, you should first read about it [here][hexagonal_doc]

For this I will be using a command bus library [league/tactician][tactician_doc].

### How to clone and first test?

- Clone repository.
- Copy `.env.example` content into `.env` file.
- Edit the values to the desired ones.
- Start project with `docker compose up`

### How to do my first `use case`?

If you start reading code from `src/CustomName/Admin` you should have a nice start.

#### `src/CustomName/Admin/Application/User`

**User** is your entity and inside of this folder you have your "use case" with naming `Handler` at the end. Two folder Query (read actions) and Command (Edit/Create actions). For example, you need to Register a new user? **UserRegisterHandler** sounds a nice name, your command name should be the same but with "Command" at the end, instead of "Handler", **UserRegisterCommand**.
Commands and Queries are 1:1 with Handler.

#### `src/CustomName/Admin/Domain/`



[hexagonal_doc]: https://blog.ndepend.com/hexagonal-architecture/

[tactician_doc]: https://tactician.thephpleague.com/
