<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">The Vibe Project</h3>

  <p align="center">
    best idea project for handle person vibe
    <br />
    <br />
    <br />
  </p>
</div>

<!-- ABOUT THE Service -->
## About The Project

This project just handle back-end section of vibe project.
<br>

### Built With

service major list for to bootstrap project:

* [PHP](https://www.php.net/)
* [Laravel](https://laravel.com)
* [JWT](https://jwt.io/)
* [RESTful](https://restfulapi.net/)


<!-- GETTING STARTED -->
### Prerequisites

for install service you should have this requirements.
* requirment
  ```sh
  php : ^8.1
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/iamammiin/vibe-project.git
   ```
2. run docker build
   ```sh
   cd vibe-project
   ```
3. copy and create new env file
   ```sh
   cp .env.example .env
   ```
4. run docker build
   ```sh
   docker-compose build
   ```
4. go to in php container
   ```sh
   docker-compose exec vibe_php bash
   ```
5. run composer for install packages
   ```sh
   composer install
   ```
6. add database config and run this command
   ```sh
   php artisan migrate
   ```
7. JWT Configuration
   ```sh
   php artisan jwt:secret
   ```
8. generate swagger api document
   ```sh
   php artisan l5-swagger:generate
   ```
7. go to this url for see api document
   ```sh
   /api/documentation
   ```


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.


<!-- CONTACT -->
## Contact

Amin.M Mazreali - [@iamammiin](https://twitter.com/iamammiin) - aminmohammadmazreali@gmail.com
