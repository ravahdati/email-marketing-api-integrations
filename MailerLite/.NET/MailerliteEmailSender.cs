
// MailWizzEmailSender.cs
// Description: This class handles MailWizz email API integration in .NET (C#).
// It allows for sending email subscriptions to MailWizz via the MailWizz API.
// Author: Rasool Vahdati

using System;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace MailerLite
{
    public class MailerLiteEmailSender
    {
        private string _apiUrl;
        private string _apiKey;

        public MailerLiteEmailSender(string apiUrl, string apiKey)
        {
            _apiUrl = apiUrl;
            _apiKey = apiKey;
        }

        public async Task<bool> AddSubscriber(string subscriberEmail, string groupId)
        {
            using (var client = new HttpClient())
            {
                client.DefaultRequestHeaders.Add("X-MailerLite-ApiKey", _apiKey);
                var payload = new { email = subscriberEmail };
                var content = new StringContent(JsonConvert.SerializeObject(payload), Encoding.UTF8, "application/json");

                var response = await client.PostAsync($"{_apiUrl}/groups/{groupId}/subscribers", content);
                return response.IsSuccessStatusCode;
            }
        }
    }
}