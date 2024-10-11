"""
MailerLite Email Sender
This script provides functionality to send emails to MailerLite using the API.

Author: Rasool Vahdati
Date: 2024/10/07
License: MIT License
"""

import requests

class MailerLiteEmailSender:

    def __init__(self, api_url, api_key):
        self.api_url = api_url
        self.api_key = api_key

    def add_subscriber(self, subscriber_email, group_id):
        endpoint = f"{self.api_url}/groups/{group_id}/subscribers"
        headers = {"Content-Type": "application/json", "X-MailerLite-ApiKey": self.api_key}
        payload = {"email": subscriber_email}

        response = requests.post(endpoint, headers=headers, json=payload)
        return response.status_code == 200
    
    @staticmethod
    def validate_email(email):
        return '@' in email and '.' in email