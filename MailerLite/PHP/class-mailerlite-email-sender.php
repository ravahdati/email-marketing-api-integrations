<?php
/**
 * MailerLite Email Sender Class
 * This class is designed to send emails to MailerLite using API credentials.
 *
 * Author: Rasool Vahdati
 * Date: 2024/10/08
 * License: MIT License
 */

class MailerLite_Email_Sender {

    // Class variables for API credentials
    private $apiUrl;
    private $apiKey;

    /**
     * Constructor to initialize the class with API credentials
     *
     * @param string $apiUrl URL for the MailerLite API
     * @param string $apiKey API key for MailerLite
     */
    public function __construct($apiUrl, $apiKey) {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * Adds a new subscriber to a MailerLite list using the MailerLite API.
     *
     * @param string $email The email address of the subscriber to add.
     * @param int $groupId The ID of the MailerLite group to add the subscriber to.
     *
     * @return bool Returns true if the subscriber was added successfully, false otherwise.
     */
    public function addSubscriber($email, $groupId) {
        $endpoint = $this->apiUrl . '/groups/' . $groupId . '/subscribers';

        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'X-MailerLite-ApiKey' => $this->apiKey,
            ),
            'body' => json_encode(array('email' => $email)),
        );

        $response = wp_remote_post($endpoint, $args);

        if (wp_remote_retrieve_response_code($response) == 200) {
            return true;
        } else {
            return false;
        }
    }
}