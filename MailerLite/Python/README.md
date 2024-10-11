# Python MailerLite Email Sender

This Python script integrates with the MailerLite API to manage newsletter subscriptions. It uses the `requests` library to send HTTP requests to the MailerLite API.

## Prerequisites

- Python 3.x
- `requests` library (install via `pip install requests`)

## Installation

1. Install the required dependencies by running:
   ```bash
   pip install -r requirements.txt
   ```

2. Add your API credentials in the `mailerlite_email_sender.py` script.

## Usage

The `MailerLiteEmailSender` class allows you to send subscription requests to the MailerLite API.

### Example

```python
from mailerlite_email_sender import MailerLiteEmailSender

# Initialize with your API credentials
api_url = 'https://api.mailerlite.com'
api_key = 'your-api-key'

email_sender = MailerLiteEmailSender(api_url, api_key)

# Example of adding a subscriber
subscriber_email = 'example@domain.com'
group_id = 'your-group-id'

if email_sender.add_subscriber(subscriber_email, group_id):
    print("Subscription successful!")
else:
    print("Failed to subscribe.")
```
