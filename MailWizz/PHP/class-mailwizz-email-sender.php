<?php
/**
 * MailWizz Email Sender Class
 * This class is designed to send emails to MailWizz using API credentials.
 *
 * Author: Rasool Vahdati
 * Date: 2024/10/07
 * License: MIT License
 */

class MailWizz_Email_Sender {

    // Class variables for API credentials
    private $apiUrl;
    private $publicKey;
    private $privateKey;

    /**
     * Constructor to initialize the class with API credentials
     *
     * @param string $apiUrl URL for the MailWizz API
     * @param string $publicKey Public API key for MailWizz
     * @param string $privateKey Private API key for MailWizz
     */
    public function __construct($apiUrl, $publicKey, $privateKey) {
        $this->apiUrl = $apiUrl;
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;

        // Ensure MailWizz API library is available
        if (!class_exists('MailWizzApi_Config')) {
            require_once('vendor/autoload.php');
        }

        // Set up the MailWizz API configuration
        $config = new MailWizzApi_Config([
            'apiUrl'    => $this->apiUrl,
            'publicKey' => $this->publicKey,
            'privateKey'=> $this->privateKey,
        ]);
        MailWizzApi_Base::setConfig($config);
    }

    /**
     * Sends an email to the specified MailWizz list
     *
     * @param string $email The email address to subscribe
     * @param string $listId The MailWizz list ID to which the email will be added
     * @return bool Returns true if successful, false otherwise
     */
    public function sendEmail($email, $listId) {
        // Create endpoint for subscribers
        $endpoint = new MailWizzApi_Endpoint_ListSubscribers();

        // Send email subscription request
        $response = $endpoint->create($listId, ['EMAIL' => $email]);

        // Check for successful response
        if ($response->httpMessage == "Created") {
            return true;
        } else {
            // Log or handle the error response
            error_log('MailWizz API Error: ' . json_encode($response->body));
            return false;
        }
    }

    /**
     * Utility function to sanitize and validate email before sending
     *
     * @param string $email The email address to sanitize and validate
     * @return bool Returns true if email is valid, false otherwise
     */
    public function validateEmail($email) {
        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL) !== false;
    }
}