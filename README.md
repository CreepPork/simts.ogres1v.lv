<p align="center">
    <img src="https://github.com/CreepPork/simts.ogres1v.lv/blob/develop/resources/assets/images/logo.png" width="140" alt="Logo">
    <h1 align="center">100 Labie Darbi - Ogres 1. vidusskola</h1>
</p>

<p align="center">
    <a href="https://github.com/CreepPork/simts.ogres1v.lv/issues">
        <img src="https://img.shields.io/github/issues-raw/CreepPork/simts.ogres1v.lv.svg?style=flat-square&label=Issues" alt="Issues">
    </a>
    <a href="https://github.com/CreepPork/simts.ogres1v.lv/blob/develop/LICENSE">
        <img src="https://img.shields.io/github/license/CreepPork/simts.ogres1v.lv.svg?style=flat-square" alt="License">
    </a>
    <a href="https://www.travis-ci.com/CreepPork/simts.ogres1v.lv">
        <img src="https://img.shields.io/travis/CreepPork/simts.ogres1v.lv.svg?style=flat-square&label=Build" alt="Travis CI">
    </a>
</p>

Laravel application that is designed for ZPD (Scientific Research Work) that collects and displays school's project - _100 labie darbi_.

* * *

## Table of Contents
- [Table of Contents](#table-of-contents)
- [Requirements](#requirements)
    - [Obligatory](#obligatory)
    - [Recommended](#recommended)
- [Setup](#setup)
    - [Development](#development)
    - [Production](#production)
- [Additional commands available](#additional-commands-available)

## Requirements

### Obligatory
- PHP >= 7.1.3
- Some kind of Laravel accepted database (MySQL, MariaDB, etc.)
- Composer >= 1.6.5
- NPM >= 3.10.8
- At least 300MB of storage
- Ability to write to the directory
- In PHP config set these values
    - `post_max_size=20M`
    - `upload_max_filesize=10M`

### Recommended
- OS - Windows
- Apache web server
    - mod_deflate enabled
    - mod_headers enabled
- MariaDB
- Ability to send mail


## Setup

### Development
1. Clone or fork the repo
2. `composer install`
3. `npm install`
4. `npm run dev`
5. `cp .env.example .env`
6. `php artisan key:generate`
7. Configure the `.env` file
8. `php artisan storage:link`
9. `php artisan migrate`
10. `php artisan app:setup`
11. `php artisan serve` (_if not running on a PHP server_)
12. `php artisan ide-helper:generate`
13. `php artisan ide-helper:models`
14. `php artisan ide-helper:meta`
15. `php artisan ide-helper:eloquent`
16. Get working!

### Production
1. Clone or download the repo
2. `composer install`
3. `npm install`
4. `npm run prod`
5. `cp .env.example .env`
6. `php artisan key:generate`
7. Configure `.env` file
8. `php artisan storage:link`
9. `mkdir public/storage/recommend`
10. `mkdir public/storage/index`
11. `mkdir public/storage/event`
12. `php artisan migrate --force`
13. `php artisan app:setup`
14. `composer install --optimize-autoloader --no-dev`
15. `php artisan config:cache`
16. `php artisan route:cache`
17. `php artisan make:user <name> <email> <password>`
18. Done!


## Additional commands available
- `php artisan make:user <name> <email> <password>`
