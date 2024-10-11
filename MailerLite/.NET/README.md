# .NET MailerLite Email Sender

This C# class integrates with the MailerLite API to handle newsletter subscriptions. It uses `HttpClient` for making HTTP requests to the MailerLite API.

## Prerequisites

- .NET SDK (Version 5.0 or higher)
- Newtonsoft.Json for handling JSON (install via NuGet)

## Installation

1. Clone this repository and navigate to the `.NET` folder.
2. Open the solution (`MailerLiteEmailSender.sln`) in Visual Studio or your preferred IDE.
3. Add your API credentials in the `MailerLiteEmailSender.cs` file.

## Usage

The `MailerLiteEmailSender` class can be used to send a subscription request to the MailerLite API.

### Example

```csharp
using System;
using System.Threading.Tasks;

class Program
{
    static async Task Main(string[] args)
    {
        // Initialize with your API credentials
        string apiUrl = "https://api.mailerlite.com";
        string apiKey = "your-api-key";

        MailerLiteEmailSender emailSender = new MailerLiteEmailSender(apiUrl, apiKey);

        string subscriberEmail = "example@domain.com";
        string groupId = "your-group-id";

        bool success = await emailSender.AddSubscriber(subscriberEmail, groupId);
        Console.WriteLine(success ? "Subscription successful!" : "Failed to subscribe.");
    }
}