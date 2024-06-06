# Reddit API Clone

## Setup Instructions

### Prerequisites

-PHP >= 8.1 (Laravel 11 requires PHP 8.1 or higher)
-Composer
-Laravel 11
-MySQL or PostgreSQL
-AWS account for deployment

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/Thando12345/-Reddit-API-Clone
    cd reddit-api
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Configure environment variables:
    Copy `.env.example` to `.env` and update the configuration as needed.

4. Generate application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```

### API Endpoints

#### Authentication

- `POST /register` - Register a new user.
- `POST /login` - Login and get an access token.
- `POST /logout` - Logout and invalidate the token.

#### Posts

- `GET /api/posts` - List all posts.
- `GET /api/posts/{id}` - Get a single post with comments and votes.
- `POST /api/posts` - Create a new post.
- `PUT /api/posts/{id}` - Update a post.
- `DELETE /api/posts/{id}` - Delete a post.

#### Comments
- `POST /api/posts/{postId}/comments` - Create a new comment on a post.
- `PUT /api/comments/{id}` - Update a comment.
- `DELETE /api/comments/{id}` - Delete a comment.

#### Votes

- `POST /api/posts/{postId}/upvote` - Upvote a post.
- `POST /api/posts/{postId}/downvote` - Downvote a post.
- `POST /api/comments/{commentId}/upvote` - Upvote a comment.
- `POST /api/comments/{commentId}/downvote` - Downvote a comment.

### Additional Features

- **Authentication**: Implemented using Laravel Sanctum.
- **User Queries**: Query posts and votes by a specific user.
- **Tailwind CSS**: Integrated for frontend styling.
- **Deployment**: Instructions for AWS deployment.

### Deployment

1. **Set up AWS Account**: If you haven't already, sign up for an AWS account at [AWS Official Website](https://aws.amazon.com/).

2. **Configure AWS Credentials**: Set up your AWS credentials on your local machine. You can do this by installing the AWS Command Line Interface (CLI) and running `aws configure`. Follow the prompts to enter your AWS access key ID, secret access key, default region, and output format.

3. **Deploy Laravel Application to AWS**: There are several ways to deploy a Laravel application to AWS, such as using Elastic Beanstalk, EC2 instances, or AWS Lambda. Choose the deployment method that best suits your requirements and follow the appropriate AWS documentation for deployment steps.

4. **Configure Environment Variables**: Once your Laravel application is deployed to AWS, configure the environment variables on your AWS environment. This typically involves setting up the `.env` file with the necessary configuration for your AWS resources, such as database connection settings, AWS S3 bucket details (if applicable), and any other environment-specific variables.

5. **Run Migrations**: After configuring the environment variables, run database migrations on your AWS environment to set up the database schema and seed initial data if needed. You can do this by SSHing into your AWS instance or using deployment automation tools like Laravel Forge or Envoyer.

6. **Serve the Application**: Start serving your Laravel application on AWS. Depending on your deployment method, you may need to configure web server settings or configure routing rules to ensure your application is accessible over the internet.

7. **Test the Deployment**: Once your application is deployed and running on AWS, perform thorough testing to ensure everything is functioning as expected. Test various API endpoints, user authentication, data persistence, and any other functionality specific to your application.

8. **Monitor and Maintain**: Continuously monitor your deployed application on AWS to identify and address any performance issues, security vulnerabilities, or other maintenance tasks. Set up logging, monitoring, and alerting mechanisms to proactively manage your AWS resources and ensure optimal performance and uptime.


### Bonus Points

- **Password Hashing**: Implemented using Laravel's built-in bcrypt.
- **ID Hashing**: Encrypt and decrypt IDs for security.
- **Comment Ordering**: Comments ordered by the number of likes.
- **Pagination**: Paginated posts and comments.

### Contribution

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.


### Postman Collection

For easy testing and integration, you can use the provided Postman collection. Import the collection into your Postman application using the following link: https://universal-resonance-895961.postman.co/workspace/New-Team-Workspace~7593e35b-0a2e-4565-9c69-831c017931e1/collection/30356214-9f0529b3-a3d1-480f-bc5f-7949f24cf696?action=share&creator=30356214


### License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
