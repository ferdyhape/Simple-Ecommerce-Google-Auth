# TUGAS 6 | Studi Independen GITS ID

## :man: Creator
- Name: ``` Ferdy Hahan Pradana ```

- Campus: ``` Politeknik Negeri Malang ```

## :pushpin: Description
- This repository was created to fulfill the Tugas 6 assignment in the Independent Fullstack Web Developer Study program by GITS.id partner, MSIB Batch 4.
- You can use the login with google feature **if you have GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET from after creating a google cloud account and it has been set for authentication (settings on .env)**

## :camera: Demo
* Login Admin

    https://user-images.githubusercontent.com/75787853/229155087-06606ba0-71c5-4f6f-91c4-66b9536b1f75.mp4

* Login Non Admin

    https://user-images.githubusercontent.com/75787853/229155270-800dd33d-4fbc-4ff5-a09f-80370d4e2c5a.mp4

* Login With Google (Setup Google Cloud)

    https://user-images.githubusercontent.com/75787853/229155404-b2b98d00-9e24-4fcf-bc89-d93f36b8ff31.mp4


## :open_book: How To Use
1.  Clone this repository
    ```
    git clone https://github.com/ferdyhape/latihan_minibos_gits.git
    ```
2.  Copy paste **.env.example** file and rename as **.env**
3.  Adjust the database name in the env file on **DB_DATABASE**

3.  Generate Key
    ```
    php artisan key:generate
    ```
4.  Install dependencies
    ```
    composer install
    ```
5.  Generate mirror link
    ```
    php artisan storage:link
    ```
6.  Migrate the tables
    ```
    php artisan migrate
    ```

7.  Insert the data from seeder to database
    ```
    php artisan db:seed
    ```

8.  Start the server
    ```
    php artisan serve
    ```

9.  Login with this crediential

    - If you want to use admin role (can dashboard access):

        Email: 
        ```
        ferdy@hape.com
        ```
        Password: 
        ```
        password
        ```
    - If you want to use non admin role (can't dashboard access):

        Email: 
        ```
        ferdynonadmin@hape.com
        ```
        Password: 
        ```
        password
        ```
     - You can also use the register feature, but you don't get admin access (can't dashboard access):
        ```
        http://127.0.0.1:8000/register
        ```
        
10. Enjoy use!

## :gear: Technology Used:

 - Laravel 9
 - Jquery 3.6.4
 - SweetAlert
 - Bootstrap 5.2
 - BootstrapIcon
 - BoxIcon
 - FontAwasome
 - Intervention Image
 - Socialite

### :link: About Creator
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://www.ferdyhape.site/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/ferdy-hahan-pradana)
[![instagram](https://img.shields.io/badge/instagram-833AB4?style=for-the-badge&logo=instagram&logoColor=white)](https://instagram.com/ferdyhape)
[![github](https://img.shields.io/badge/github-333?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ferdyhape)
