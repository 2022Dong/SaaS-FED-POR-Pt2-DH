# Workopia in Laravel 11
<a name="readme-top"></a>

A demonstration web-based back-end administration interface and a basic public-facing front end for a small application.

#### Built With
[![PHP][Php.com]][Php-url]
[![Laravel][Laravel.com]][Laravel-url]
[![Tailwindcss][Tailwindcss.com]][Tailwindcss-url]
[![Livewire][Livewire.com]][Livewire-url]
[![Inertia][Inertia.com]][Inertia-url]
[![VS Code][VSCode.com]][VSCode-url]
[![Nginx][Nginx.com]][Nginx-url]
[![Blade][Blade.com]][Blade-url]
[![SQLite][SQLite.com]][SQLite-url]

## Definitions

| Term | Definition                                                                                                  |
|----|-------------------------------------------------------------------------------------------------------------|
| BREAD | Database operations to Browse, Read, Edit, Add and Delete data                                               |
| CRUD | More commonly used term over BREAD. Create (Add), Retrieve (Browse/Read), Update (Edit) and Delete (Delete) |
| MVC | More commonly used term over BREAD. Create (Add), Retrieve (Browse/Read), Update (Edit) and Delete (Delete) |
| HTTP VERB | A method of indicating the desired action to be performed on a resource. Including GET (retrieve), POST (create), PUT (update), DELETE (remove), and PATCH (partial update). |
| VERSION CONTROL | A system that records changes to a file or set of files over time so that you can recall specific versions later. eg. Git |
| CLI | Command Line Interface. A text-based interface used to interact with software and operating systems by typing commands. |

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Description

Provide a short description explaining the what, why, and how of your project.

Use the following questions as a guide:

- What was your motivation?
  - To achieve certification, secure a job, and improve my coding skills.

- Why did you build this project? (Note: the answer is not "Because it was a homework assignment.")
  - To learn the PHP Laravel framework and enhance my web development skills.

- What problem does it solve?
  - It provides a web-based back-end administration interface and a basic public-facing front end, solving data management and user interaction issues.

- What did you learn?
  - Setting up and configuring a Laravel project
  - Implementing MVC architecture
  - Creating user-friendly interfaces with Blade
  - Managing databases with Eloquent ORM
  - Applying version control with Git
  - Working in vscode and CLI environments

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Table of Contents

TO DO: Add extra, or update the contents as needed, then remove this line.

- [Description](#description)
- [Definitions](#definitions)
- [Installation](#installation)
- [Usage](#usage)
- [Credits](#credits)
- [Licence](#licence)
- [Badges](#badges)
- [Features](#features)
- [Tests](#tests)
- [Contact](#contact)

## Installation

To install the project, follow these steps:

### Before You Start

1. Make sure you have copied your `.env` file into `.env.sqlite` (for SQLite DBs) or equivalent for MySQL/PostgreSQL, etc.
2. Ensure you have added, committed, and pushed the `.env` file to the repository.

### On a New Host

1. Update PHP, MailPit, and Apache on the new host.
2. Create an account using your student email at [this link](https://l306-01.local/fs/register.php). Password requirements: at least 1 Capital, 1 Lower case, 1 Number, and 1 Symbol, and at least 8 characters long.
3. Download the required files from [http://l306-01.local/fs](http://l306-01.local/fs) using these links:
    - [File 1](https://l306-01.local/fs/process.php?do=download&id=61)
    - [File 2](https://l306-01.local/fs/process.php?do=download&id=55)
    - [File 3](https://l306-01.local/fs/process.php?do=download&id=36)
4. Install the files into the required place using the instructions at [this link](https://help.screencraft.net.au/hc/2680392001/68/update-the-apache-web-server-in-laragon?category_id=29).
5. Make sure that Laragon is correctly added to the system path by following the instructions at [this link](https://help.screencraft.net.au/hc/2680392001/36/adding-laragon-to-the-system-path?category_id=29).

### Cloning Repository and Setting Up Environment

6. Do not start Laragon's services at this stage.
7. Open a new Bash terminal (Use MS Terminal).
8. Ensure `Source/repos` is present by running the following command (an error will appear if it exists):
    ```
    mkdir -p Source/Repos
    ```
9. Change into the `Source/Repos` folder:
    ```
    cd Source/Repos
    ```
10. Clone the repository to the new system:
    ```
    git clone https://github.com/2022Dong/SaaS-FED-POR-Pt2-DH
    ```
11. Change into the new cloned folder (update the name as required):
    ```
    cd SaaS-FED-App.git
    ```
12. Copy the `.env.sqlite` to `.env`:
    ```
    cp .env.sqlite .env
    ```
13. If you have a different name from the `.env APP_URL`, then rename your folder as needed (ignore the lowercase name).
14. To do so, follow these steps (replace `OLD_NAME` and `NEW_NAME` with the required folder names):
    ```
    cd ..
    mv OLD_NAME NEW_NAME
    cd NEW_NAME
    ```
15. If you have not done so, make sure Laragon is in the PATH (see step 5).
16. Execute the following commands:
    ```
    composer install
    php artisan migrate
    php artisan migrate:fresh --seed
    ```
17. In a new terminal execute:
    ```
    npm i && npm update && npm run dev
    ```
18. Installation Spatie in Laravel, for roles and permissions
    ```
    Follow the doc. [Spatie.be](https://spatie.be/docs/laravel-permission/v6/installation-laravel).
    ```

### Completing Installation

18. Open Laragon and follow the instructions [here](https://help.screencraft.net.au/hc/2680392001/61/change-the-laragon-web-root-folder?category_id=29).
19. Start Laragon's services (Start all button).
20. Open your browser and visit your repository's folder name with `.test` at the end. For example: [http://SaaS-FED-App.test](http://SaaS-FED-App.test).
21. Start MailPit (ready for verification of new account):
    ```
    /c/Laragon/bin/mailpit/mailpit.exe --smtp=0.0.0.0:2525
    ```


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Usage

TO DO: Provide instructions and examples for use. Include screenshots as 
needed.

To add a screenshot, create an `assets/images` folder in your repository and
upload your screenshot to it. Then, using the relative filepath, add it to
your README using the following syntax:

    ```md
    ![alt text](assets/images/screenshot.png)
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Credits

TO DO: List your collaborators, if any, with links to their GitHub 
profiles. This should include the TAFE and your lecturers' GitHub profiles. 

If you used any third-party assets that require attribution, list the creators
with links to their primary web presence in this section. For example 
FontAwesome, TailwindCSS etc.

If you followed tutorials, include links to those here as well. This would 
include the Traversy Media course(s), YouTube videos, written tutorials 
and books. 

- Font Awesome. (n.d.). Fontawesome.com. https://fontawesome.com
- Laravel - The PHP Framework For Web Artisans. (2011). Laravel.com. https://laravel.com
- Laravel Bootcamp - Learn the PHP Framework for Web Artisans. (n.d.). Bootcamp.laravel.com. https://bootcamp.laravel.com/
- PHP: Hypertext Preprocessor. (n.d.). Www.php.net. https://php.net
- Professional README Guide. (n.d.). Coding-Boot-Camp.github.io. Retrieved April 15, 2024, from https://coding-boot-camp.github.io/full-stack/github/professional-readme-guide
- TailwindCSS. (2023). Tailwind CSS - Rapidly build modern websites 
  without ever leaving your HTML. Tailwindcss.com. https://tailwindcss.com/


<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Badges

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
***
*** Forks, Issues and Licence Shields will NOT appear for Private Repos.
*** You may want to remove this section for this assessment.
*** Delete this block of comments once you have edited this ReadMe.
***
***
-->

[![Forks][forks-shield]][forks-url]
[![Issues][issues-shield]][issues-url]
[![Educational Community Licence][licence-shield]][licence-url]


<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Features

Workopia features include, but are not limited to:

#### Work Listings
Work listings have the usual CRUD/BREAD operations including:

* Browse Listings [Guest, User, Admin]
* Retrieve Listing [Guest, User, Admin]
    * includes search 
* Edit Listing [Admin, Owner]
* Update Listing [Admin, Owner]
* Delete Listing [Admin, Owner]

#### Users
* User self registration [Guest]
* Login [Registered User]
* Logout [Registered User]
* Profile Edit [Admin, Owner]
* Account admin [Admin, Owner]

#### Administration
* Work BREAD [Admin]
* User BREAD [Admin]
* Permissions Admin [Admin]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Tests

Go the extra mile and write tests for your application. Then provide examples on how to run them here.


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Contact

Name: Dongyun Huang  Email:20127545@tafe.wa.edu.au

Project Link: https://github.com/2022Dong/SaaS-FED-POR-Pt2-DH

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Licence

TO DO: Summarise/define the Licence here. Link to the Licence file.

The last section of a high-quality README file is the licence. This lets other
developers know what they can and cannot do with your project. If you need
help choosing a licence, refer
to [https://choosealicense.com/](https://choosealicense.com/).


<p align="right">(<a href="#readme-top">back to top</a>)</p>



---



TO DO: Update the links in the MarkDown Links and Images section of the 
original MarkDown document as needed. The links are not visible in the 
rendered page on GitHub. 

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[forks-shield]: http://img.shields.io/github/forks/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[forks-url]: https://github.com/AdyGCode/workopia-laravel-v11/network/members

[issues-shield]: http://img.shields.io/github/issues/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[issues-url]: https://github.com/adygcode/workopia-laravel-v11/issues

[licence-shield]: https://img.shields.io/github/license/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[licence-url]: https://github.com/adygcode/workopia-laravel-v11/blob/main/License.md

[product-screenshot]: images/screenshot.png

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Laravel-url]: https://laravel.com

[Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white

[Tailwindcss-url]: https://tailwindcss.com

[Livewire.com]: https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white

[Livewire-url]: https://livewire.laravel.com

[Inertia.com]: https://img.shields.io/badge/Inertia-9553E9?style=for-the-badge&logo=inertia&logoColor=white

[Inertia-url]: https://inertiajs.com

[Php.com]: https://img.shields.io/badge/Php-777BB4?style=for-the-badge&logo=php&logoColor=white

[Php-url]: https://inertiajs.com

[VSCode.com]: https://img.shields.io/badge/VS%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white

[VSCode-url]: https://code.visualstudio.com/

[Nginx.com]: https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white

[Nginx-url]: https://www.nginx.com/

[Blade.com]: https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Blade-url]: https://laravel.com/docs/8.x/blade

[SQLite.com]: https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white

[SQLite-url]: https://www.sqlite.org/