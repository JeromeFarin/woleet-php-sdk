<?php
/**
 * ReceiptApi
 * PHP version 5
 *
 * @category Class
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 * Woleet API
 *
 * Welcome to **Woleet API reference documentation**.<br> It is highly recommanded to read the chapters **[introducing Woleet API concepts](https://doc.woleet.io/reference)** before reading this documentation.
 *
 * OpenAPI spec version: 1.10.0
 * Contact: contact@woleet.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.27
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace WooletClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WooletClient\ApiException;
use WooletClient\Configuration;
use WooletClient\HeaderSelector;
use WooletClient\ObjectSerializer;

/**
 * ReceiptApi Class Doc Comment
 *
 * @category Class
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ReceiptApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    )
    {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getOTSReceipt
     *
     * Get the proof receipt of an anchor (OpenTimestamps proof format).
     *
     * @param string $anchor_id Identifier of the data anchor for which to build the proof receipt. (required)
     *
     * @return \WooletClient\Model\OtsReceipt
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function getOTSReceipt($anchor_id)
    {
        [$response] = $this->getOTSReceiptWithHttpInfo($anchor_id);
        return $response;
    }

    /**
     * Operation getOTSReceiptWithHttpInfo
     *
     * Get the proof receipt of an anchor (OpenTimestamps proof format).
     *
     * @param string $anchor_id Identifier of the data anchor for which to build the proof receipt. (required)
     *
     * @return array of \WooletClient\Model\OtsReceipt, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function getOTSReceiptWithHttpInfo($anchor_id)
    {
        $returnType = '\\' . \WooletClient\Model\OtsReceipt::class;
        $request = $this->getOTSReceiptRequest($anchor_id);
        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }
            $statusCode = $response->getStatusCode();
            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                }
            }
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\\' . \WooletClient\Model\OtsReceipt::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOTSReceiptAsync
     *
     * Get the proof receipt of an anchor (OpenTimestamps proof format).
     *
     * @param string $anchor_id Identifier of the data anchor for which to build the proof receipt. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function getOTSReceiptAsync($anchor_id)
    {
        return $this->getOTSReceiptAsyncWithHttpInfo($anchor_id)
            ->then(
                fn($response) => $response[0]
            );
    }

    /**
     * Operation getOTSReceiptAsyncWithHttpInfo
     *
     * Get the proof receipt of an anchor (OpenTimestamps proof format).
     *
     * @param string $anchor_id Identifier of the data anchor for which to build the proof receipt. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function getOTSReceiptAsyncWithHttpInfo($anchor_id)
    {
        $returnType = '\\' . \WooletClient\Model\OtsReceipt::class;
        $request = $this->getOTSReceiptRequest($anchor_id);
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                        }
                    }
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception): never {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOTSReceipt'
     *
     * @param string $anchor_id Identifier of the data anchor for which to build the proof receipt. (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function getOTSReceiptRequest($anchor_id)
    {
        // verify the required parameter 'anchor_id' is set
        if ($anchor_id === null || (is_array($anchor_id) && count($anchor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $anchor_id when calling getOTSReceipt'
            );
        }
        $resourcePath = '/receipt/{anchorId}/ots';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        // path params
        if ($anchor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'anchorId' . '}',
                ObjectSerializer::toPathValue($anchor_id),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }
        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }
        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getReceipt
     *
     * Get the proof receipt of an anchor.
     *
     * @param string $anchor_id Identifier of the anchor for which to build the proof receipt. (required)
     * @param bool $allow_partial &#x60;true&#x60; if a partial proof receipt is to be returned when the proof of timestamp is not yet available (ie. the data or the signature has not yet been anchored).&lt;br&gt; If the proof of timestamp is availalble (anchor is SENT or CONFIRMED) a regular proof receipt is returned (with response code 200). Otherwise, a partial proof receipt not including the proof of timestamp is returned (response code 202).&lt;br&gt; The partial proof receipt of a signature anchor allows to verify the signature and the identity of the signer immediatly after signing, without having to wait for the anchoring process to complete. (optional)
     *
     * @return \WooletClient\Model\Receipt
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function getReceipt($anchor_id, $allow_partial = null)
    {
        [$response] = $this->getReceiptWithHttpInfo($anchor_id, $allow_partial);
        return $response;
    }

    /**
     * Operation getReceiptWithHttpInfo
     *
     * Get the proof receipt of an anchor.
     *
     * @param string $anchor_id Identifier of the anchor for which to build the proof receipt. (required)
     * @param bool $allow_partial &#x60;true&#x60; if a partial proof receipt is to be returned when the proof of timestamp is not yet available (ie. the data or the signature has not yet been anchored).&lt;br&gt; If the proof of timestamp is availalble (anchor is SENT or CONFIRMED) a regular proof receipt is returned (with response code 200). Otherwise, a partial proof receipt not including the proof of timestamp is returned (response code 202).&lt;br&gt; The partial proof receipt of a signature anchor allows to verify the signature and the identity of the signer immediatly after signing, without having to wait for the anchoring process to complete. (optional)
     *
     * @return array of \WooletClient\Model\Receipt, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function getReceiptWithHttpInfo($anchor_id, $allow_partial = null)
    {
        $returnType = '\\' . \WooletClient\Model\Receipt::class;
        $request = $this->getReceiptRequest($anchor_id, $allow_partial);
        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }
            $statusCode = $response->getStatusCode();
            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                }
            }
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\\' . \WooletClient\Model\Receipt::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getReceiptAsync
     *
     * Get the proof receipt of an anchor.
     *
     * @param string $anchor_id Identifier of the anchor for which to build the proof receipt. (required)
     * @param bool $allow_partial &#x60;true&#x60; if a partial proof receipt is to be returned when the proof of timestamp is not yet available (ie. the data or the signature has not yet been anchored).&lt;br&gt; If the proof of timestamp is availalble (anchor is SENT or CONFIRMED) a regular proof receipt is returned (with response code 200). Otherwise, a partial proof receipt not including the proof of timestamp is returned (response code 202).&lt;br&gt; The partial proof receipt of a signature anchor allows to verify the signature and the identity of the signer immediatly after signing, without having to wait for the anchoring process to complete. (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function getReceiptAsync($anchor_id, $allow_partial = null)
    {
        return $this->getReceiptAsyncWithHttpInfo($anchor_id, $allow_partial)
            ->then(
                fn($response) => $response[0]
            );
    }

    /**
     * Operation getReceiptAsyncWithHttpInfo
     *
     * Get the proof receipt of an anchor.
     *
     * @param string $anchor_id Identifier of the anchor for which to build the proof receipt. (required)
     * @param bool $allow_partial &#x60;true&#x60; if a partial proof receipt is to be returned when the proof of timestamp is not yet available (ie. the data or the signature has not yet been anchored).&lt;br&gt; If the proof of timestamp is availalble (anchor is SENT or CONFIRMED) a regular proof receipt is returned (with response code 200). Otherwise, a partial proof receipt not including the proof of timestamp is returned (response code 202).&lt;br&gt; The partial proof receipt of a signature anchor allows to verify the signature and the identity of the signer immediatly after signing, without having to wait for the anchoring process to complete. (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function getReceiptAsyncWithHttpInfo($anchor_id, $allow_partial = null)
    {
        $returnType = '\\' . \WooletClient\Model\Receipt::class;
        $request = $this->getReceiptRequest($anchor_id, $allow_partial);
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                        }
                    }
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception): never {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getReceipt'
     *
     * @param string $anchor_id Identifier of the anchor for which to build the proof receipt. (required)
     * @param bool $allow_partial &#x60;true&#x60; if a partial proof receipt is to be returned when the proof of timestamp is not yet available (ie. the data or the signature has not yet been anchored).&lt;br&gt; If the proof of timestamp is availalble (anchor is SENT or CONFIRMED) a regular proof receipt is returned (with response code 200). Otherwise, a partial proof receipt not including the proof of timestamp is returned (response code 202).&lt;br&gt; The partial proof receipt of a signature anchor allows to verify the signature and the identity of the signer immediatly after signing, without having to wait for the anchoring process to complete. (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function getReceiptRequest($anchor_id, $allow_partial = null)
    {
        // verify the required parameter 'anchor_id' is set
        if ($anchor_id === null || (is_array($anchor_id) && count($anchor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $anchor_id when calling getReceipt'
            );
        }
        $resourcePath = '/receipt/{anchorId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        // query params
        if ($allow_partial !== null) {
            $queryParams['allowPartial'] = ObjectSerializer::toQueryValue($allow_partial, null);
        }
        // path params
        if ($anchor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'anchorId' . '}',
                ObjectSerializer::toPathValue($anchor_id),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }
        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }
        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation verifyReceipt
     *
     * Verify a proof receipt.
     *
     * @param \WooletClient\Model\Receipt $body Proof receipt to verify. (required)
     *
     * @return \WooletClient\Model\ReceiptVerificationStatus
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function verifyReceipt($body)
    {
        [$response] = $this->verifyReceiptWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation verifyReceiptWithHttpInfo
     *
     * Verify a proof receipt.
     *
     * @param \WooletClient\Model\Receipt $body Proof receipt to verify. (required)
     *
     * @return array of \WooletClient\Model\ReceiptVerificationStatus, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function verifyReceiptWithHttpInfo($body)
    {
        $returnType = '\\' . \WooletClient\Model\ReceiptVerificationStatus::class;
        $request = $this->verifyReceiptRequest($body);
        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }
            $statusCode = $response->getStatusCode();
            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                }
            }
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\\' . \WooletClient\Model\ReceiptVerificationStatus::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation verifyReceiptAsync
     *
     * Verify a proof receipt.
     *
     * @param \WooletClient\Model\Receipt $body Proof receipt to verify. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function verifyReceiptAsync($body)
    {
        return $this->verifyReceiptAsyncWithHttpInfo($body)
            ->then(
                fn($response) => $response[0]
            );
    }

    /**
     * Operation verifyReceiptAsyncWithHttpInfo
     *
     * Verify a proof receipt.
     *
     * @param \WooletClient\Model\Receipt $body Proof receipt to verify. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function verifyReceiptAsyncWithHttpInfo($body)
    {
        $returnType = '\\' . \WooletClient\Model\ReceiptVerificationStatus::class;
        $request = $this->verifyReceiptRequest($body);
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content, null, 512, JSON_THROW_ON_ERROR);
                        }
                    }
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception): never {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'verifyReceipt'
     *
     * @param \WooletClient\Model\Receipt $body Proof receipt to verify. (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function verifyReceiptRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling verifyReceipt'
            );
        }
        $resourcePath = '/receipt/verify';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }
        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }
        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }
        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws \RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }
        return $options;
    }
}
