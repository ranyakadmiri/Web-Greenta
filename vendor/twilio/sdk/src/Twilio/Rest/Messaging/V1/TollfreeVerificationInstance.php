<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Messaging\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;


/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $customerProfileSid
 * @property string|null $trustProductSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $regulatedItemSid
 * @property string|null $businessName
 * @property string|null $businessStreetAddress
 * @property string|null $businessStreetAddress2
 * @property string|null $businessCity
 * @property string|null $businessStateProvinceRegion
 * @property string|null $businessPostalCode
 * @property string|null $businessCountry
 * @property string|null $businessWebsite
 * @property string|null $businessContactFirstName
 * @property string|null $businessContactLastName
 * @property string|null $businessContactEmail
 * @property string|null $businessContactPhone
 * @property string|null $notificationEmail
 * @property string[]|null $useCaseCategories
 * @property string|null $useCaseSummary
 * @property string|null $productionMessageSample
 * @property string[]|null $optInImageUrls
 * @property string $optInType
 * @property string|null $messageVolume
 * @property string|null $additionalInformation
 * @property string|null $tollfreePhoneNumberSid
 * @property string $status
 * @property string|null $url
 * @property string|null $rejectionReason
 * @property int|null $errorCode
 * @property array|null $resourceLinks
 * @property string|null $externalReferenceId
 */
class TollfreeVerificationInstance extends InstanceResource
{
    /**
     * Initialize the TollfreeVerificationInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string to identify Tollfree Verification.
     */
    public function __construct(Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'customerProfileSid' => Values::array_get($payload, 'customer_profile_sid'),
            'trustProductSid' => Values::array_get($payload, 'trust_product_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'regulatedItemSid' => Values::array_get($payload, 'regulated_item_sid'),
            'businessName' => Values::array_get($payload, 'business_name'),
            'businessStreetAddress' => Values::array_get($payload, 'business_street_address'),
            'businessStreetAddress2' => Values::array_get($payload, 'business_street_address2'),
            'businessCity' => Values::array_get($payload, 'business_city'),
            'businessStateProvinceRegion' => Values::array_get($payload, 'business_state_province_region'),
            'businessPostalCode' => Values::array_get($payload, 'business_postal_code'),
            'businessCountry' => Values::array_get($payload, 'business_country'),
            'businessWebsite' => Values::array_get($payload, 'business_website'),
            'businessContactFirstName' => Values::array_get($payload, 'business_contact_first_name'),
            'businessContactLastName' => Values::array_get($payload, 'business_contact_last_name'),
            'businessContactEmail' => Values::array_get($payload, 'business_contact_email'),
            'businessContactPhone' => Values::array_get($payload, 'business_contact_phone'),
            'notificationEmail' => Values::array_get($payload, 'notification_email'),
            'useCaseCategories' => Values::array_get($payload, 'use_case_categories'),
            'useCaseSummary' => Values::array_get($payload, 'use_case_summary'),
            'productionMessageSample' => Values::array_get($payload, 'production_message_sample'),
            'optInImageUrls' => Values::array_get($payload, 'opt_in_image_urls'),
            'optInType' => Values::array_get($payload, 'opt_in_type'),
            'messageVolume' => Values::array_get($payload, 'message_volume'),
            'additionalInformation' => Values::array_get($payload, 'additional_information'),
            'tollfreePhoneNumberSid' => Values::array_get($payload, 'tollfree_phone_number_sid'),
            'status' => Values::array_get($payload, 'status'),
            'url' => Values::array_get($payload, 'url'),
            'rejectionReason' => Values::array_get($payload, 'rejection_reason'),
            'errorCode' => Values::array_get($payload, 'error_code'),
            'resourceLinks' => Values::array_get($payload, 'resource_links'),
            'externalReferenceId' => Values::array_get($payload, 'external_reference_id'),
        ];

        $this->solution = ['sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return TollfreeVerificationContext Context for this TollfreeVerificationInstance
     */
    protected function proxy(): TollfreeVerificationContext
    {
        if (!$this->context) {
            $this->context = new TollfreeVerificationContext(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the TollfreeVerificationInstance
     *
     * @return TollfreeVerificationInstance Fetched TollfreeVerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): TollfreeVerificationInstance
    {

        return $this->proxy()->fetch();
    }

    /**
     * Update the TollfreeVerificationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TollfreeVerificationInstance Updated TollfreeVerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): TollfreeVerificationInstance
    {

        return $this->proxy()->update($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Messaging.V1.TollfreeVerificationInstance ' . \implode(' ', $context) . ']';
    }
}

