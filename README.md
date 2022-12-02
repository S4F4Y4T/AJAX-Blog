<a name="readme-top"></a>

<div align="center">
  <h3 align="center">PHP-MVC-API-Blog</h3>
  <p>Api Based Blog using MVC Framework</p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![Screen Shot][product-screenshot-1]

This is a blog based on api and my own php mvc framework. You can register or login,update profile and post blog with thumbnail with scrach pagination

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

This platform build with php MVC Framework and api. Html,css and js for frontend and api implementation

* [![php][php]][php-url]
* ![api][api]
* ![mysql][mysql]
* [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

Before installing the script you need some external dependencies on your machine
* php 7.2 <

By following the instructions you can run the script on your machine

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/S4F4Y4T/Blog.git
   ```
2. Create and import the rest.sql into mysql DB

3. Open app/config/config.php and change the db information accordingly,stripe key values and base value to your project url

4. Make sure .htaccess exist

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage
After installing the project go to project directory and register to login on dashboard to manage profile or create your first post, You can also navigate posts using pagination

Here some screenshots of the project:
![Screen Shot][product-screenshot-2]
![Screen Shot][product-screenshot-3]
![Screen Shot][product-screenshot-4]

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[product-screenshot-1]: overview/1.png
[product-screenshot-2]: overview/2.png
[product-screenshot-3]: overview/3.png
[product-screenshot-4]: overview/4.png

[api]: https://img.shields.io/badge/api-api-white
[mysql]: https://img.shields.io/badge/MYSQL-MYSQL-orange
[php]: https://img.shields.io/badge/php-php-white
[Php-url]: https://www.php.net/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
