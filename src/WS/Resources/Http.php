<?php

namespace SicrediAPI\Resources;

/**
 * @package Library
 * @category Pagamento
 * @author William Reis (williams.reis@gmail.com)
 * @license MIT
 * @version 1.0.0
 * @since 1.0.0
 * Classe Core
 */
class Http
{
    /**
     * @var
     */
    private $status;
    /**
     * @var
     */
    private $response;
    private $contentType = 'Content-Type: application/x-www-form-urlencoded;';
    private $accept = '';

    /**
     * Http constructor.
     *
     * @param string $contentType
     *
     * @param null $accept
     *
     * @throws \Exception
     */
    public function __construct($contentType = null, $accept = null)
    {
        if ($contentType) {
            $this->contentType = $contentType;
        }
        if ($contentType) {
            $this->accept = $accept;
        }
        if (!function_exists('curl_init')) {
            throw new \Exception('API Library: cURL library is required.');
        }
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @param              $url
     * @param array|string $data
     * @param int $timeout
     * @param string $charset
     *
     * @return bool
     * @throws \Exception
     */
    public function post($url, $data = null, $timeout = 20, $charset = 'ISO-8859-1')
    {
        return $this->curlConnection('POST', $url, $timeout, $charset, $data);
    }

    /**
     * @param              $method
     * @param              $url
     * @param              $timeout
     * @param              $charset
     * @param array|string $data
     *
     * @return bool
     * @throws \Exception
     */
    private function curlConnection($method, $url, $timeout, $charset, $data = null)
    {
        if (strtoupper($method) === 'POST') {
            if ($this->contentType === 'Content-Type: application/json;') {
                $postFields = json_encode($data);
            } elseif ($this->contentType === 'Content-Type: application/xml;') {
                $postFields = $data;
            } else {
                $postFields = (is_array($data) ? http_build_query($data, '', '&') : $data);
            }
            $contentLength = "Content-length: " . strlen($postFields);
            $methodOptions = [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postFields,
            ];
        } elseif (strtoupper($method) === 'PUT') {
            if ($this->contentType === 'Content-Type: application/json;') {
                $postFields = json_encode($data);
            } else {
                $postFields = (is_array($data) ? http_build_query($data, '', '&') : $data);
            }
            $contentLength = "Content-length: " . strlen($postFields);
            $methodOptions = [
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => $postFields,
            ];
        } else {
            $contentLength = null;
            $methodOptions = [
                CURLOPT_HTTPGET => true,
            ];
        }
        $options = [
            CURLOPT_HTTPHEADER => $this->setHeader($charset, $contentLength),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => $timeout,
            //CURLOPT_TIMEOUT => $timeout
        ];
        if (!is_null(Library::moduleVersion()->getRelease())) {
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('module-description: %s', Library::moduleVersion()->getName())
            );
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('module-version: %s', Library::moduleVersion()->getRelease())
            );
        }
        if (!is_null(Library::cmsVersion()->getRelease())) {
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('cms-description: %s :%s', Library::cmsVersion()->getName(),
                    Library::cmsVersion()->getRelease())
            );
        }
        $options = ($options + $methodOptions);
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_errno($curl);
        $errorMessage = curl_error($curl);
        curl_close($curl);
        $this->setStatus((int)$info['http_code']);
        $this->setResponse((String)$resp);
        if ($error) {
            throw new \Exception("CURL can't connect: $errorMessage");
        } else {
            return true;
        }
    }

    /**
     * @param $charset
     * @param $contentLength
     *
     * @return array
     */
    private function setHeader($charset, $contentLength)
    {
        $httpHeader = [
            "$this->contentType charset= $charset",
            $contentLength,
            'lib-description: php:' . Library::libraryVersion(),
            'language-engine-description: php:' . Library::phpVersion(),
        ];
        if ($this->accept) {
            $httpHeader[] = $this->accept;
        }
        return $httpHeader;
    }

    /**
     * @param        $url
     * @param        $data
     * @param int $timeout
     * @param string $charset
     *
     * @return bool
     * @throws \Exception
     */
    public function put($url, $data, $timeout = 20, $charset = 'ISO-8859-1')
    {
        return $this->curlConnection('PUT', $url, $timeout, $charset, $data);
    }

    /**
     * @param        $url
     * @param int $timeout
     * @param string $charset
     *
     * @return bool
     * @throws \Exception
     */
    public function get($url, $timeout = 20, $charset = 'ISO-8859-1')
    {
        return $this->curlConnection('GET', $url, $timeout, $charset, null);
    }
}