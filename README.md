# Project description
This project contains the code for the website for SCC powerhouse, a strength oriented gym in Zeeland (Netherlands).

# Requirements
- PHP 7.2
- Node 14.18.1
- Npm 6.14.15
- Yarn 1.22.5

# Installation
1. Run `composer install` to get all PHP dependencies
2. Run `yarn install` to get all javascript and css dependencies
3. Run `yarn gulp` to compile all frontend assets

# Running
1. Run a database server (e.g. via Xampp) with a database `sccpowerhouse_new` which allows connections from the `root` user without a password.
2. Run `symfony server:start` to start a development server
3. Connect to [https://127.0.0.1:8000](https://127.0.0.1:8000) to see the website
