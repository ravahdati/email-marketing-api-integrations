# Python MailWizz Email Sender

This Python script integrates with the MailWizz API to manage newsletter subscriptions. It uses the `requests` library to send HTTP requests to the MailWizz API.

## Prerequisites

- Python 3.x
- `requests` library (install via `pip install requests`)

## Installation

1. Install the required dependencies by running:
   ```bash
   pip install -r requirements.txt
   ```

2. Place your API credentials in the script `mailwizz_email_sender.py`.

## Usage

The `MailWizzEmailSender` class allows you to send subscription requests to the MailWizz API.

### Example

```python
from mailwizz_email_sender import MailWizzEmailSender

# Initialize with your API credentials
api_url = 'https://your-mailwizz-api-url.com'
public_key = 'your-public-key'
private_key = 'your-private-key'

email_sender = MailWizzEmailSender(api_url, public_key, private_key)

# Example of sending a subscription
email = 'example@domain.com'
list_id = 'your-list-id'

if email_sender.validate_email(email):
    if email_sender.send_email_to_mailwizz(email, list_id):
        print("Subscription successful!")
    else:
        print("Failed to subscribe.")
else:
    print("Invalid email.")
```
