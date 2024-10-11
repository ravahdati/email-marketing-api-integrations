# PHP MailerLite Email Sender

This PHP class integrates with the MailerLite API to handle newsletter subscriptions. It allows you to add subscribers to a MailerLite group using the API.

## Prerequisites

- PHP 7.4 or higher

## Installation

Since this implementation does not require Composer, simply add the `MailerLite_Email_Sender` class to your project.

1. Download the `class-mailerlite-email-sender.php` file.
2. Include it in your PHP project.

## Usage

The `MailerLite_Email_Sender` class allows you to send subscription requests to the MailerLite API.

### Example

```php
require_once 'class-mailerlite-email-sender.php';

$apiUrl = 'https://api.mailerlite.com';
$apiKey = 'your-api-key';

$mailerLite = new MailerLite_Email_Sender($apiUrl, $apiKey);

$email = 'user@example.com';
$groupId = 'your-group-id';

if ($mailerLite->addSubscriber($email, $groupId)) {
    echo "Subscriber added successfully.";
} else {
    echo "Failed to add subscriber.";
}
```