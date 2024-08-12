<h1 align="center"> 
    LEARNING DETIKCOM | MSIB 
</h1>
<h4 align="center"> 
    Full-Stack Dev 
</h4>

-------------------------

### Overview
Membuat CMS (Content Management System) untuk pengelolaan konten learning.detik.com yang berisikan
a. Login (Admin dan User)
b. Register
c. Daftar/List Topik Training
d. Daftar/List Topik Training terdapat filter berdasarkan Divisi: Marketing, IT, Human Capital, Product, Redaksi
### Setting Up Project
<b>Requirement</b>
```
Laravel 10, PHP 8.3.3
```

<b>Please Clone My Project</b>
```
https://github.com/WayanBerdyanto/LearningDetik.git
```
<b>composer update</b>
```
composer update
```

<b>Copy .env.example and create .env</b>
```
.env
```

<b>Key Generate</b>
```
php artisan key:generate
```
<b>Migrations</b>
```
php artisan migrate
```
<b>Seed User</b>
```
php artisan db:seed --=class=UserSeeder
```
<b>Seed Kejuruan / Divisi</b>
```
php artisan db:seed --class=KejuruanSeeder
```
<b>Seed List Topic</b>
```
php artisan db:seed --class=ListTopikSeeder
```

<b>Start Project</b>
```
php artisan serve
```


