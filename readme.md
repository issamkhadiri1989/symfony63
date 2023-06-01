# Installation

please run the following commands before starting:

```
    composer install
```

if the database is not created yet, please run the following command:

```
    php bin/console doctrine:database:create
```

now that the database is created, run the migrations:

```
    php bin/console doctrine:migrations:migrate
```

the database should be updated with tables so far. now you need some fake data.
let run the command:

```
    php bin/console doctrine:fixtures:load
```

now you have a set of users with different types `Collaborator` and `Manager`.

# Test

go to `http://localhost:9696/`

> in my case, I'm running my server on the 9696 port so you must use your own.

you must see a login form. you can pick any username from your database.
all your users have the same password `1234`.

try to log in then you must see the corresponding form according to the type of use is using your app.

**Collaborator case**

the collaborator form is recognized by a phone field. it is initialized by a dummy data (see
src/Service/User/Wrapper/CollaboratorUserWrapper.php)

**Manager case**

the manager form is recognized by a comment field. a textarea where the manager would add some comment.
