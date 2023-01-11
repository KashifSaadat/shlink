<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Config;

use function Functional\map;
use function Shlinkio\Shlink\Config\env;

enum EnvVars: string
{
    case DELETE_SHORT_URL_THRESHOLD = 'DELETE_SHORT_URL_THRESHOLD';
    case DB_DRIVER = 'DB_DRIVER';
    case DB_NAME = 'DB_NAME';
    case DB_USER = 'DB_USER';
    case DB_PASSWORD = 'DB_PASSWORD';
    case DB_HOST = 'DB_HOST';
    case DB_UNIX_SOCKET = 'DB_UNIX_SOCKET';
    case DB_PORT = 'DB_PORT';
    case GEOLITE_LICENSE_KEY = 'GEOLITE_LICENSE_KEY';
    case REDIS_SERVERS = 'REDIS_SERVERS';
    case REDIS_SENTINEL_SERVICE = 'REDIS_SENTINEL_SERVICE';
    case REDIS_PUB_SUB_ENABLED = 'REDIS_PUB_SUB_ENABLED';
    case MERCURE_PUBLIC_HUB_URL = 'MERCURE_PUBLIC_HUB_URL';
    case MERCURE_INTERNAL_HUB_URL = 'MERCURE_INTERNAL_HUB_URL';
    case MERCURE_JWT_SECRET = 'MERCURE_JWT_SECRET';
    case DEFAULT_QR_CODE_SIZE = 'DEFAULT_QR_CODE_SIZE';
    case DEFAULT_QR_CODE_MARGIN = 'DEFAULT_QR_CODE_MARGIN';
    case DEFAULT_QR_CODE_FORMAT = 'DEFAULT_QR_CODE_FORMAT';
    case DEFAULT_QR_CODE_ERROR_CORRECTION = 'DEFAULT_QR_CODE_ERROR_CORRECTION';
    case DEFAULT_QR_CODE_ROUND_BLOCK_SIZE = 'DEFAULT_QR_CODE_ROUND_BLOCK_SIZE';
    case RABBITMQ_ENABLED = 'RABBITMQ_ENABLED';
    case RABBITMQ_HOST = 'RABBITMQ_HOST';
    case RABBITMQ_PORT = 'RABBITMQ_PORT';
    case RABBITMQ_USER = 'RABBITMQ_USER';
    case RABBITMQ_PASSWORD = 'RABBITMQ_PASSWORD';
    case RABBITMQ_VHOST = 'RABBITMQ_VHOST';
    /** @deprecated */
    case RABBITMQ_LEGACY_VISITS_PUBLISHING = 'RABBITMQ_LEGACY_VISITS_PUBLISHING';
    case DEFAULT_INVALID_SHORT_URL_REDIRECT = 'DEFAULT_INVALID_SHORT_URL_REDIRECT';
    case DEFAULT_REGULAR_404_REDIRECT = 'DEFAULT_REGULAR_404_REDIRECT';
    case DEFAULT_BASE_URL_REDIRECT = 'DEFAULT_BASE_URL_REDIRECT';
    case REDIRECT_STATUS_CODE = 'REDIRECT_STATUS_CODE';
    case REDIRECT_CACHE_LIFETIME = 'REDIRECT_CACHE_LIFETIME';
    case BASE_PATH = 'BASE_PATH';
    case SHORT_URL_TRAILING_SLASH = 'SHORT_URL_TRAILING_SLASH';
    case PORT = 'PORT';
    case TASK_WORKER_NUM = 'TASK_WORKER_NUM';
    case WEB_WORKER_NUM = 'WEB_WORKER_NUM';
    case PACKAGE_MAX_LENGTH = 'PACKAGE_MAX_LENGTH';
    case INITIAL_API_KEY = 'INITIAL_API_KEY';
    case ANONYMIZE_REMOTE_ADDR = 'ANONYMIZE_REMOTE_ADDR';
    case TRACK_ORPHAN_VISITS = 'TRACK_ORPHAN_VISITS';
    case DISABLE_TRACK_PARAM = 'DISABLE_TRACK_PARAM';
    case DISABLE_TRACKING = 'DISABLE_TRACKING';
    case DISABLE_IP_TRACKING = 'DISABLE_IP_TRACKING';
    case DISABLE_REFERRER_TRACKING = 'DISABLE_REFERRER_TRACKING';
    case DISABLE_UA_TRACKING = 'DISABLE_UA_TRACKING';
    case DISABLE_TRACKING_FROM = 'DISABLE_TRACKING_FROM';
    case DEFAULT_SHORT_CODES_LENGTH = 'DEFAULT_SHORT_CODES_LENGTH';
    case IS_HTTPS_ENABLED = 'IS_HTTPS_ENABLED';
    case DEFAULT_DOMAIN = 'DEFAULT_DOMAIN';
    case AUTO_RESOLVE_TITLES = 'AUTO_RESOLVE_TITLES';
    case REDIRECT_APPEND_EXTRA_PATH = 'REDIRECT_APPEND_EXTRA_PATH';
    case TIMEZONE = 'TIMEZONE';
    case MULTI_SEGMENT_SLUGS_ENABLED = 'MULTI_SEGMENT_SLUGS_ENABLED';
    /** @deprecated */
    case VISITS_WEBHOOKS = 'VISITS_WEBHOOKS';
    /** @deprecated */
    case NOTIFY_ORPHAN_VISITS_TO_WEBHOOKS = 'NOTIFY_ORPHAN_VISITS_TO_WEBHOOKS';

    public function loadFromEnv(mixed $default = null): mixed
    {
        return env($this->value, $default);
    }

    public function existsInEnv(): bool
    {
        return $this->loadFromEnv() !== null;
    }

    /**
     * @return string[]
     */
    public static function values(): array
    {
        static $values;
        return $values ?? ($values = map(self::cases(), static fn (EnvVars $envVar) => $envVar->value));
    }
}
