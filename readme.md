# Bright Blog
A lightweight blog Website implemented with Laravel. 
You care register as a user, and post/remove article or comments.
It takes an invitation code to register.

It basically provides below features:
*	User Registration & Authentication
*	Write a new post
*	Write comments to existing posts
*	Delete a post under singed-in user and its associated comments
*	Delete a comment under singed-in user
*	Search by post title / author / content
*	Convenient links to recent posts
*	Convenient links to the posts that have recent comments


## View Design
|    View Name                |    Description                                                           |
|-----------------------------|--------------------------------------------------------------------------|
|    home.blade.php           |    List of the abstracts of posts.                                       |
|    message.blade.php        |    3 seconds redirection page after registration or post.                |
|    newpost.blade.php        |    Write a new post.                                                     |
|    viewpost.blade.php       |    View existing posts and comments.                                     |
|    login.blade.php          |    Login form.                                                           |
|    register.blade.php       |    Registration form.                                                    |
|    invaliduser.blade.php    |    Error page when user tried to   delete a post without permissions.    |

## Controller Design
|    Controller Name           |    Description                                                     |
|------------------------------|--------------------------------------------------------------------|
|    HomeController.php        |    Handle home page and search   results.                          |
|    NewpostController.php     |    Handle new post.                                                |
|    ViewpostController.php    |    Handle view posts and comments,   and the deletions of them.    |
|    LoginController.php       |    Handle login.                                                   |
|    RegisterController.php    |    Handle registration.                                            |

## Database Design
![alt text](https://github.com/caryxing/bblog/blob/master/db_er.png)


# Intro to Laravel PHP Framework
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
