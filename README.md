Just a simple to do list app with laravel and mysql as a database.

<img width="1438" alt="Screenshot 2023-07-15 at 09 49 44" src="https://github.com/Jonathanpangkey/Laravel-todolist/assets/102292312/f97c86be-3899-4a3e-89d5-721ec53ea931">

# Clone the repository
git clone https://github.com/your-username/todo-list-app.git

# Change into the project directory
cd todo-list-app

# Install the project dependencies using Composer
composer install

# Copy the .env.example file and rename it to .env
cp .env.example .env

# Generate a new application key
php artisan key:generate

# Run the database migrations to create the necessary tables
php artisan migrate

# Start the development server
php artisan serve
