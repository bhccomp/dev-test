# Affiliate Invitation App

This is a test application developed for a job interview. The application reads a list of affiliates from a text file, calculates their distance from the main office location, and outputs the names and IDs of affiliates within 100km, sorted by Affiliate ID in ascending order.

## Setup

1. Clone the repository: `git clone https://github.com/bhccomp/dev-test.git`
2. Navigate to the project directory: `cd repository`
3. Install dependencies: `composer install`
4. Copy the `.env.example` file to create your own `.env` file: `cp .env.example .env`
5. Generate an application key: `php artisan key:generate`
6. Start the server: `php artisan serve`

## Usage

Visit `http://localhost:8000/affiliates` in your web browser to see the list of affiliates within 100km of our Dublin office.

## Testing

Run the tests with the following command: `php artisan test`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
