<?php
/**
 * TokenApi
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
 * TokenApi Class Doc Comment
 *
 * @category Class
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TokenApi
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
     * Operation generateToken
     *
     * Generate a JWT token.
     *
     * @param string $cdata Client data to inject into the generated JWT token (64 characters max).&lt;br&gt; This data is not processed by the platform, and can be easily retrieved from the token by Base64 decoding its &#x60;payload&#x60;. (optional)
     *
     * @throws \WooletClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WooletClient\Model\Token
     */
    public function generateToken($cdata = null)
    {
        [$response] = $this->generateTokenWithHttpInfo($cdata);
        return $response;
    }

    /**
     * Operation generateTokenWithHttpInfo
     *
     * Generate a JWT token.
     *
     * @param string $cdata Client data to inject into the generated JWT token (64 characters max).&lt;br&gt; This data is not processed by the platform, and can be easily retrieved from the token by Base64 decoding its &#x60;payload&#x60;. (optional)
     *
     * @throws \WooletClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WooletClient\Model\Token, HTTP status code, HTTP response headers (array of strings)
     */
    public function generateTokenWithHttpInfo($cdata = null)
    {
        $returnType = '\\' . \WooletClient\Model\Token::class;
        $request = $this->generateTokenRequest($cdata);
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
                        '\\' . \WooletClient\Model\Token::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation generateTokenAsync
     *
     * Generate a JWT token.
     *
     * @param string $cdata Client data to inject into the generated JWT token (64 characters max).&lt;br&gt; This data is not processed by the platform, and can be easily retrieved from the token by Base64 decoding its &#x60;payload&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateTokenAsync($cdata = null)
    {
        return $this->generateTokenAsyncWithHttpInfo($cdata)
            ->then(
                fn($response) => $response[0]
            );
    }

    /**
     * Operation generateTokenAsyncWithHttpInfo
     *
     * Generate a JWT token.
     *
     * @param string $cdata Client data to inject into the generated JWT token (64 characters max).&lt;br&gt; This data is not processed by the platform, and can be easily retrieved from the token by Base64 decoding its &#x60;payload&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateTokenAsyncWithHttpInfo($cdata = null)
    {
        $returnType = '\\' . \WooletClient\Model\Token::class;
        $request = $this->generateTokenRequest($cdata);
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
     * Create request for operation 'generateToken'
     *
     * @param string $cdata Client data to inject into the generated JWT token (64 characters max).&lt;br&gt; This data is not processed by the platform, and can be easily retrieved from the token by Base64 decoding its &#x60;payload&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function generateTokenRequest($cdata = null)
    {

        $resourcePath = '/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        // query params
        if ($cdata !== null) {
            $queryParams['cdata'] = ObjectSerializer::toQueryValue($cdata, null);
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
     * Operation revokeToken
     *
     * Revoke a JWT token.
     *
     * @param string $token JWT token to revoke. (required)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function revokeToken($token)
    {
        $this->revokeTokenWithHttpInfo($token);
    }

    /**
     * Operation revokeTokenWithHttpInfo
     *
     * Revoke a JWT token.
     *
     * @param string $token JWT token to revoke. (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WooletClient\ApiException on non-2xx response
     */
    public function revokeTokenWithHttpInfo($token)
    {
        $returnType = '';
        $request = $this->revokeTokenRequest($token);
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
            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation revokeTokenAsync
     *
     * Revoke a JWT token.
     *
     * @param string $token JWT token to revoke. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function revokeTokenAsync($token)
    {
        return $this->revokeTokenAsyncWithHttpInfo($token)
            ->then(
                fn($response) => $response[0]
            );
    }

    /**
     * Operation revokeTokenAsyncWithHttpInfo
     *
     * Revoke a JWT token.
     *
     * @param string $token JWT token to revoke. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    public function revokeTokenAsyncWithHttpInfo($token)
    {
        $returnType = '';
        $request = $this->revokeTokenRequest($token);
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                fn($response) => [null, $response->getStatusCode(), $response->getHeaders()],
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
     * Create request for operation 'revokeToken'
     *
     * @param string $token JWT token to revoke. (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function revokeTokenRequest($token)
    {
        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling revokeToken'
            );
        }
        $resourcePath = '/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        // query params
        if ($token !== null) {
            $queryParams['token'] = ObjectSerializer::toQueryValue($token, null);
        }
        // body params
        $_tempBody = null;
        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
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
            'DELETE',
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
