<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\BunqModel;

/**
 * Fetch the raw content of a public attachment with given ID. The raw
 * content is the binary representation of a file, without any JSON
 * wrapping.
 *
 * @generated
 */
class AttachmentPublicContent extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_LISTING = 'attachment-public/%s/content';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'AttachmentPublicContent';

    /**
     * Get the raw content of a specific attachment.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param string $attachmentPublicUuid
     * @param string[] $customHeaders
     *
     * @return BunqResponseString
     */
    public static function listing(ApiContext $apiContext, string $attachmentPublicUuid, array $customHeaders = []): BunqResponseString
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$attachmentPublicUuid]
            ),
            [],
            $customHeaders
        );

        return BunqResponseString::castFromBunqResponse(
            new BunqResponse($responseRaw->getBodyString(), $responseRaw->getHeaders())
        );
    }
}
