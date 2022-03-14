
<H1 align="center">Physiotherapy Clinic Admin Dashboard</H1>


### Prerequisites
Please make sure the following packages are available in the host machine before starting the installation process.

* PHP >= 8.0
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* MySQL 5.7+
### Installation Instructions.
1. Clone this repository.

    ```shell
    git clone https://github.com/FelixOchieng/physiotherapy-clinic.git
    ```
2. Run composer update
    ```shell
    composer update
    ```
3. Copy .env.example to .env
   
   * Mac and Linux users 
      ```shell
      cp .env.example .env
      ```
   * Windows users
      ```shell
      copy .env.example .env
      ```
4. Generate application key
   ```shell
   php artisan key:generate
   ```

5. Create MySQL database
   ```shell
   create database physiotherapy_clinic;
   ```

6. Migrate the tables and seed sample data
   ```shell
   php artisan migrate --seed
   ```

7. Serve the application
   ```shell
   php artisan serve
   ```

8. Visit <http://localhost:8000>
9. Login using the following credentials:
    1. Admin Credentials    
        * username: admin
        * password: password
    2. Therapist Credentials
        * username: therapistone
        * password: password

