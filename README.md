# Junior developer task

### Running and usage

-   step 1: in the command line run:

```bash
composer install
```

-   step 2: in the command line run:

```bash
npm run dev
```

-   step 3: set up your .env file.
-   step 4. Generate app key:
```bash
php artisan key:generate
```
-   step 5. in the command line run to seed your database:

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=UserSeeder
```

-   step 6: in the command line run:

```bash
php artisan serve
```

-   step 7. open your browser and follow the link showed in the console
-   step 8: You can use these credentials to login:
    email/login: `admin@local.com` | password: `admin123`
