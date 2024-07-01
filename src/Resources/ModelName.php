<?php

declare(strict_types=1);

namespace GeminiAPI\Resources;

class ModelName
{
    public const Default = 'models/text-bison-001';

    case GeminiPro = 'models/gemini-pro';
    case GeminiProVision = 'models/gemini-pro-vision';

    case Gemini1_0ProLatest = 'models/gemini-1.0-pro-latest';
    case Gemini1_0ProLatestStable = 'models/gemini-1.0-pro';
    case Gemini1_0ProStable001 = 'models/gemini-1.0-pro-001';

    case Gemini1_0ProVisionLatest = 'models/gemini-1.0-pro-vision-latest';
    case Gemini1_0ProVisionLatestStable = 'models/gemini-1.0-pro-vision';

    case Gemini1_5ProLatest = 'models/gemini-1.5-pro-latest';
    case Gemini1_5ProLatestStable = 'models/gemini-1.5-pro';

    case Gemini1_5FlashLatest = 'models/gemini-1.5-flash-latest';
    case Gemini1_5FlashLatestStable = 'models/gemini-1.5-flash';

    case Embedding = 'models/embedding-001';
    case AQA = 'models/aqa';
}
