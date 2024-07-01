<?php

declare(strict_types=1);

namespace GeminiAPI\Requests;

use GeminiAPI\Traits\ArrayTypeValidator;
use GeminiAPI\Resources\Content;
use JsonSerializable;

use function json_encode;

class CountTokensRequest implements JsonSerializable, RequestInterface
{
    use ArrayTypeValidator;

    /**
     * @param string $modelName
     * @param Content[] $contents
     */
    public function __construct(
        public readonly string $modelName,
        public readonly array $contents,
    ) {
        $this->ensureArrayOfType($this->contents, Content::class);
    }

    public function getOperation(): string
    {
        return "{$this->modelName}:countTokens";
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getHttpPayload(): string
    {
        return (string) $this;
    }

    /**
     * @return array{
     *     model: string,
     *     contents: Content[],
     * }
     */
    public function jsonSerialize(): array
    {
        return [
            'model' => $this->modelName,
            'contents' => $this->contents,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this) ?: '';
    }
}
