<?php

declare(strict_types=1);

namespace GeminiAPI\Requests;

use GeminiAPI\GenerationConfig;
use GeminiAPI\SafetySetting;
use GeminiAPI\Traits\ArrayTypeValidator;
use GeminiAPI\Resources\Content;
use JsonSerializable;

use function json_encode;

class GenerateContentStreamRequest implements JsonSerializable, RequestInterface
{
    use ArrayTypeValidator;

    /**
     * @param string $modelName
     * @param Content[] $contents
     * @param SafetySetting[] $safetySettings
     * @param GenerationConfig|null $generationConfig
     */
    public function __construct(
        public readonly string $modelName,
        public readonly array $contents,
        public readonly array $safetySettings = [],
        public readonly ?GenerationConfig $generationConfig = null,
    ) {
        $this->ensureArrayOfType($this->contents, Content::class);
        $this->ensureArrayOfType($this->safetySettings, SafetySetting::class);
    }

    public function getOperation(): string
    {
        return "{$this->modelName}:streamGenerateContent";
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
     *     safetySettings?: SafetySetting[],
     *     generationConfig?: GenerationConfig,
     * }
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'model' => $this->modelName,
            'contents' => $this->contents,
        ];

        if (!empty($this->safetySettings)) {
            $arr['safetySettings'] = $this->safetySettings;
        }

        if ($this->generationConfig) {
            $arr['generationConfig'] = $this->generationConfig;
        }

        return $arr;
    }

    public function __toString(): string
    {
        return json_encode($this) ?: '';
    }
}
