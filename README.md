# Job Searching App 💼

>[!CAUTION]
>Please read all the points of the README in order to make good use of the project. Thank you.

## 💡 Description
![Description](./public/docs/HomePage.png)
This project consists in a website where you keep an eye of the offers you applied.

You can track offers, add news;
For example: You just got an incredible intervew for the company you most like, you can add that 'news' in the offer you applied for.

This function is so usefull for all the follows you will like to add.

## 💼 Proyect guide

On the home page there is a table with all the offers you have previously inserted.

You can see the date of creation of an offer, the job info, the company,the logo of the company and if it is 'In follow' or 'Finished'.
You can also click any offer to get into a more detailed view.
In addition you can see the date of last update of the offers, If there aren't any 'news' for an offer it will print "❌ No hay noticias disponibles".

This way you can easily track how long has been since an offer had an update.

![Show view]
<p align="center"><em>Home view</em></p>

In the view to see the details of an offer, you will see the 'news' of the offer. It will print all the 'news' and when did them got created.

## 👓 🕶️ 🥽 Installation requierements

To run this project you will need:

1. XAMPP (or any other local server that supports PHP and MySQL)

2. Operating System terminal

3. Install Composer

4. Install NPM via Node.js

5. Postman or many other platform to use the API

6. Xdebug 

## 💻 Installation

1. Clone the repository:
```
    git clone https://github.com/Manusitox360/JobSearching.git
```

2. Install Composer:
```
    composer install
```

3. Install NPM:
```
    npm install
```

4. Create a '.env' file by renaming the example '.env.example' file and modifing the lines:
    - DB_CONNECTION=mysql
    - DB_DATABASE=JobSearching

5. Create a database in MySQL with no tables


6. Generate all the tables and fake values:
```
    php artisan migrate:fresh --seed
```

7. Run NPM:
```
    npm run dev
```

8. Run Laravel (in other terminal):
```
    php artisan serve
```

This will give you an url that leads you to the web, usually:
```
    http://127.0.0.1:8000/
```

## 📚 Database diagram

This is the database diagram for this project. There are two tables, **Offers** and **Follows**. It's a **OneToMany relation**  because one offer could have many follows.
In the other hand, one follow can only be attached to one offer.

![Database diagram](./public/docs/databaseDiagram.png)

## 🔍 API Endpoints

There are 5 endpoints for each table, since we have 2 tables, there's a total of 10 endpoints to interact with the App.

### Offers

>[!NOTE]
>Offer fields: info, company, logo, state (In progress or Finished).

- GET (read all offers)
```
    http://127.0.0.1:8000/api/offers
```

- GET BY ID (reads one offer by ID & all his follows)
```
    http://127.0.0.1:8000/api/offers/{id}
```

- POST (inserts a new offer)
```
    http://127.0.0.1:8000/api/offers
```

- PUT (updates an offer by ID)
```
    http://127.0.0.1:8000/api/offers/{id}
```

- DELETE (delete an offer by ID)
```
    http://127.0.0.1:8000/api/offers/{id}
```

### Progress

>[!NOTE]
>Follow fields: offer_id, news.

- GET (read all Follows)
```
    http://127.0.0.1:8000/api/offers/{offerId}/follows/{id}
```

- GET BY ID (read one follow selected by ID)
```
    http://127.0.0.1:8000/api/offers/{offerId}/follows/{id}
```

- POST (creates a new follow on a specific offer by id.)
```
    http://127.0.0.1:8000/api/offers/{offerId}/follows
```

- PUT (updates a follow by ID)
```
    http://127.0.0.1:8000/api/offers/{offerId}/follows/{id}
```

- DELETE (deletes a follow by ID)
```
    http://127.0.0.1:8000/api/offers/{offerId}/follows/{id}
```

## 👾 Tests

This project has  **80%** of test coverage.

You can try the tests to see the coverage in the terminal using:
```
   php artisan test --coverage
```

![Test coverage]

>[!TIP]
>You can also see the coverage in a web browser using:
>```
>   php artisan test --coverage-html=coverage-report
>```

## 🛠️ Technologies and Tools

<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='PHP' src='https://img.shields.io/badge/PHP-100000?style=for-the-badge&logo=PHP&logoColor=white&labelColor=777BB4&color=777BB4'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='HTML5' src='https://img.shields.io/badge/HTML5-100000?style=for-the-badge&logo=HTML5&logoColor=white&labelColor=E34F26&color=E34F26'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='CSS3' src='https://img.shields.io/badge/CSS3-100000?style=for-the-badge&logo=CSS3&logoColor=white&labelColor=1572B6&color=1572B6'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='MySQL' src='https://img.shields.io/badge/MySQL-100000?style=for-the-badge&logo=MySQL&logoColor=white&labelColor=4479A1&color=4479A1'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Laravel' src='https://img.shields.io/badge/Laravel-100000?style=for-the-badge&logo=Laravel&logoColor=white&labelColor=FF2D20&color=FF2D20'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Bootstrap' src='https://img.shields.io/badge/Bootstrap-100000?style=for-the-badge&logo=Bootstrap&logoColor=white&labelColor=7952B3&color=7952B3'/></a>

<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='GitHub' src='https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=GitHub&logoColor=white&labelColor=181717&color=181717'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='phpMyAdmin' src='https://img.shields.io/badge/phpMyAdmin-100000?style=for-the-badge&logo=phpMyAdmin&logoColor=white&labelColor=6C78AF&color=6C78AF'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Postman' src='https://img.shields.io/badge/Postman-100000?style=for-the-badge&logo=Postman&logoColor=white&labelColor=FF6C37&color=FF6C37'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='XAMPP' src='https://img.shields.io/badge/XAMPP-100000?style=for-the-badge&logo=XAMPP&logoColor=white&labelColor=FB7A24&color=FB7A24'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Canva' src='https://img.shields.io/badge/Canva-100000?style=for-the-badge&logo=Canva&logoColor=white&labelColor=00C4CC&color=00C4CC'/></a>

## 👨🏻‍💻 Author

This project has been developed by: 

[Manuel Espinosa Guillén](https://github.com/Manusitox360)
