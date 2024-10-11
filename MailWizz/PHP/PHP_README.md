# PHP MailWizz Newsletter Integration

This PHP script integrates with the MailWizz API using the `twisted1919/mailwizz-php-sdk`. It allows you to subscribe users to a MailWizz email list via a REST API.

## Prerequisites

- Composer
- PHP 7.4 or higher

## Installation

1. Install the required dependencies by running:
   ```bash
   composer install
   ```

2. Update the API credentials in the `class-mailwizz-email-sender.php` file.

## Usage

The `MailWizz_Email_Sender` class allows you to send a subscription request to MailWizz. A REST API route is provided for frontend integration.

### Example

```php
// Example usage
$apiUrl = 'https://mailwizz-api-url.com';
$publicKey = 'your_public_key';
$privateKey = 'your_private_key';

$mailWizz = new MailWizz_Email_Sender($apiUrl, $publicKey, $privateKey);

$email = 'user@example.com';
$listId = 'list_id';

if ($mailWizz->validateEmail($email)) {
    $success = $mailWizz->sendEmailToMailWizz($email, $listId);
    echo $success ? "Email added successfully." : "Failed to add email.";
} else {
    echo "Invalid email address.";
}
```
