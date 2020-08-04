
<div class="wrapper">

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

<div class="container">[<span class="brand-text font-weight-light">MyBook</span>](<?php echo base_url(); ?>)<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse order-3" id="navbarCollapse">

*   [Home](<?php echo base_url(); ?>)
*   [About](<?php echo base_url('home/about'); ?>)

</div>

*   ion_auth->logged_in()) : ?> [Dashboard](<?php echo base_url('dashboard'); ?>) [Login](<?php echo base_url('auth'); ?>)

</div>

</nav>

<div class="content-wrapper">

<div class="content-header">

<div class="container">

<div class="row mb-2">

<div class="col-sm-12">

# About

</div>

</div>

</div>

</div>

<div class="content">

<div class="container">

<div class="row">

<div class="col-12">

<div class="card card-primary card-outline">

<div class="card-header">

##### About App

</div>

<div class="card-body">

<table class="table">

<tbody>

<tr>

<th>Name App</th>

<td>MyBook</td>

</tr>

<tr>

<th>Purpose</th>

<td>To manage your collection pdf ebook, and you can read it via browser.</td>

</tr>

<tr>

<th>Build With</th>

<td>[PHP Programming Language](https://www.php.net/) With [Codeigniter 3 Framework](https://codeigniter.com/)</td>

</tr>

<tr>

<th>And Also With</th>

<td>> Template : [AdminLTE3](https://adminlte.io/)  
> Infinite Scroll : [Jscroll](https://jscroll.com/)  
> PDF Viewer : [PdfJS](https://mozilla.github.io/pdf.js/)</td>

</tr>

</tbody>

</table>

</div>

</div>

<div class="card card-primary card-outline">

<div class="card-header">

##### About Usage

</div>

<div class="card-body">

<table class="table">

<tbody>

<tr>

<th>Installation Requirement</th>

<td>1\. Apache 2  
2\. PHP 5.6 or Above  
3\. MySQL or MariaDB  
or you can install Xampp To get All Installation Requirement</td>

</tr>

<tr>

<th>Installation</th>

<td>1\. Download or Clone this Repo to your htdocs Folder Or your Web Server Folder.  
2\. Configuration database.php (application/config/database.php) to your database environment such as hostname,username,password and database name.  
3\. Create database on MySQL or MariaDB with database name like your set on database.php  
4\. Open migration.php (application/config/migration.php) set $config['migration_enabled'] to TRUE, set $config['migration_version'] to 3\.  
5\. Open on your browser -> [Your Domain Local]/mybook/db_migrate to migrate database table structure. example: localhost/mybook/db_migrate.  
6\. Open migration.php again, and set $config['migration_enabled'] to FALSE for turn off migration.  
7\. Open on your browser [Your Domain Local]/mybook. example: localhost/mybook  
8\. To insert a book you can click to Login button on right side navbar and you will redirected to login page.  
9\. Default Email is 'admin@admin.com' and Password is 'password'.</td>

</tr>

</tbody>

</table>

</div>

</div>

<div class="card card-success card-outline">

<div class="card-header">

##### About Me

</div>

<div class="card-body">

<table class="table">

<tbody>

<tr>

<th>Full Name</th>

<td>Rahmat</td>

</tr>

<tr>

<th>Email</th>

<td>rahmatbatam14@gmail.com</td>

</tr>

<tr>

<th>Github</th>

<td>[rahmat1996](https://github.com/rahmat1996)</td>

</tr>

<tr>

<th>Linkedin</th>

<td>[Rahmat Saja](https://id.linkedin.com/in/rahmat-saja-35371513b)</td>

</tr>

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<footer class="main-footer">

<div class="float-right d-none d-sm-inline">Rahmat1996</div>

**Copyright © 2014-2019 [AdminLTE.io](https://adminlte.io).** All rights reserved.</footer>

</div>
