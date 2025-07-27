<h3>An event management system </h3>
<p>Developed using Laravel whereby a user can register and login, using token-based authentication. <br>
Organizers can create/manage events.<br>
Attendees can RSVP to events.<br> 
Organizers can approve rsvp.<br>
Events are filtered by date.</p> 

<h3> Setup instructions</h3>
<p> 1. Install laravel app <br>composer create-project --prefer-dist laravel/laravel:^10 Fete <br>
2. Navigate to the app  <br> cd laravel-10-Fete<br>
3. Install Spatie Laravel Permission Package <br> composer require spatie/laravel-permission<br>
4. Publish the config and database migration files <br> php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"<br>
5. Add Role and Permission Middleware<br>
6. Create an Event Model with Migration, Resource Controller and Form Requests <br> 
php artisan make:model Event -mcr --requests