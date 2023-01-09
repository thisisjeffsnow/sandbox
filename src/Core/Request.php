<?php

namespace Sandbox\Core;

class Request
{
    public const METHOD_POST = "POST";
    public const METHOD_GET = "GET";

    private string $requestMethod;
    private string $requestPath;

    public function __construct()
    {
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
        $rawPath = $_SERVER["REQUEST_URI"];
        $delimiterPos = strpos($rawPath, "?");
        $this->requestPath =
            $delimiterPos === false
                ? $rawPath
                : substr($rawPath, 0, $delimiterPos);
    }

    public function method(): string
    {
        return $this->requestMethod;
    }

    public function path(): string
    {
        return $this->requestPath;
    }
}
