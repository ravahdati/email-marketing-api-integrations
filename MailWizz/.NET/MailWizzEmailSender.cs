
// MailWizzEmailSender.cs
// Description: This class handles MailWizz email API integration in .NET (C#).
// It allows for sending email subscriptions to MailWizz via the MailWizz API.
// Author: Rasool Vahdati

using System;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

public class MailWizzEmailSender
{
    private readonly string apiUrl;
    private readonly string publicKey;
    private readonly string privateKey;

    public MailWizzEmailSender(string apiUrl, string publicKey, string privateKey)
    {
        this.apiUrl = apiUrl;
        this.publicKey = publicKey;
        this.privateKey = privateKey;
    }

    // Send email to MailWizz API
    public async Task<bool> SendEmailToMailWizzAsync(string email, string listId)
    {
        using (var client = new HttpClient())
        {
            client.DefaultRequestHeaders.Add("X-MW-PUBLIC-KEY", publicKey);
            client.DefaultRequestHeaders.Add("X-MW-PRIVATE-KEY", privateKey);

            var body = new { EMAIL = email };
            var content = new StringContent(Newtonsoft.Json.JsonConvert.SerializeObject(body), Encoding.UTF8, "application/json");

            var response = await client.PostAsync($"{apiUrl}/lists/{listId}/subscribers", content);
            return response.IsSuccessStatusCode;
        }
    }

    // Validate email format
    public static bool ValidateEmail(string email)
    {
        return !string.IsNullOrEmpty(email) && email.Contains("@");
    }
}