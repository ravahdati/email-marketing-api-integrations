# .NET MailWizz Email Sender

This C# class integrates with the MailWizz API to handle newsletter subscriptions. It uses `HttpClient` for making HTTP requests to the MailWizz API.

## Prerequisites

- .NET SDK (Version 5.0 or higher)

## Installation

1. Clone this repository and navigate to the `.NET` folder.
2. Open the solution (`MailWizzEmailSender.sln`) in Visual Studio or your preferred IDE.
3. Add your API credentials in the `MailWizzEmailSender.cs` file.

## Usage

The `MailWizzEmailSender` class can be used to send a subscription request to the MailWizz API.

### Example

```csharp
using System;

class Program
{
    static async Task Main(string[] args)
    {
        // Initialize with your API credentials
        string apiUrl = "https://your-mailwizz-api-url.com";
        string publicKey = "your-public-key";
        string privateKey = "your-private-key";

        MailWizzEmailSender emailSender = new MailWizzEmailSender(apiUrl, publicKey, privateKey);

        string email = "example@domain.com";
        string listId = "your-list-id";

        if (MailWizzEmailSender.ValidateEmail(email))
        {
            bool success = await emailSender.SendEmailToMailWizzAsync(email, listId);
            Console.WriteLine(success ? "Subscription successful!" : "Failed to subscribe.");
        }
        else
        {
            Console.WriteLine("Invalid email.");
        }
    }
}
```
