# To-do List Application

This is a simple to-do list application built with Laravel. It allows users to create, view, and manage tasks. The interface is styled with custom CSS and Bootstrap icons.

## Features

- **Create Tasks**: Add new tasks with a title and description.
- **View Tasks**: See a list of all tasks with their details.
- **Update Tasks**: Edit existing tasks.
- **Delete Tasks**: Remove tasks that are no longer needed.
- **Status Indication**: Visual indication of task status (completed or pending) with icons.

## Installation

To set up the project locally, follow these steps:

1. **Clone the repository**:
    ```sh
    git clone https://github.com/yourusername/todo-list-app.git
    cd todo-list-app
    ```

2. **Install dependencies**:
    ```sh
    composer install
    npm install
    ```

3. **Set up environment variables**:
    Copy the `.env.example` file to `.env` and update the necessary configuration values.

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run database migrations**:
    ```sh
    php artisan migrate
    ```

5. **Compile assets**:
    ```sh
    npm run dev
    ```

6. **Start the development server**:
    ```sh
    php artisan serve
    ```

## Usage

### Homepage (index.blade.php)

The homepage displays the list of tasks. Each task shows its title, description, and status. There is also a button to create a new task.

### Create Task (create.blade.php)

This page contains a form to create a new task with a title and description.

### View and Edit Task (view.blade.php)

This page allows viewing and editing an existing task. You can update the title, description, and status, or delete the task.

## Blade Templates

- **index.blade.php**: Displays the list of tasks.
- **create.blade.php**: Form for creating a new task.
- **view.blade.php**: Form for viewing and editing a task.

## Styles

Custom CSS styles are included in the blade templates to enhance the appearance of the application. Bootstrap icons are used for visual indications.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to create an issue or submit a pull request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



