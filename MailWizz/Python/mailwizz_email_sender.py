"""
MailWizz Email Sender
This script provides functionality to send emails to MailWizz using the API.

Author: Rasool Vahdati
Date: 2024/10/12
License: MIT License
"""

import requests

class MailWizzEmailSender:
    def __init__(self, api_url, public_key, private_key):
        self.api_url = api_url
        self.public_key = public_key
        self.private_key = private_key

    def send_email_to_mailwizz(self, email, list_id):
        headers = {
            'X-MW-PUBLIC-KEY': self.public_key,
            'X-MW-PRIVATE-KEY': self.private_key,
            'Content-Type': 'application/json'
        }
        data = {
            'EMAIL': email
        }
        response = requests.post(f"{self.api_url}/lists/{list_id}/subscribers", json=data, headers=headers)

        return response.status_code == 200

    @staticmethod
    def validate_email(email):
        return '@' in email and '.' in email
