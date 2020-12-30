<?php

use App\Repositories\ChannelPaymentRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleUserRepository;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Mockery\Matcher\Any;
use Illuminate\Support\Str;

if (! function_exists('arrayToObject')) {
    /**
     * Convert Array to Object
     *
     * @param $array
     * @return Collection
     */
    function arrayToObject($array): Collection
    {
        $collection = new Collection($array);
        return $collection->toBase();
    }
}

if (! function_exists('setDefaultValue')) {
    /**
     * Set Default Value when not defined
     *
     * @param string $value
     * @return Repository|mixed
     */
    function setDefaultValue(string $value = '')
    {
        if ($value !== '') {
            return $value;
        }

        return setting('api_default_value');
    }
}

if (! function_exists('isHomePage')) {
    /**
     * Check if url is active, then set to active (class)
     *
     * @param $url
     * @return bool
     */
    function isHomePage($url): bool
    {
        return $url === '/';
        //return request()->is($url) ? true : false;
    }
}

if (! function_exists('isActive')) {
    /**
     * Check if url is active, then set to active (class)
     *
     * @param $url
     * @param string $class
     * @return string
     */
    function isActive($url, string $class = 'active'): string
    {
        return request()->is($url) ? $class : '';
    }
}

if (! function_exists('isOpen')) {
    /**
     * Check if url is active, then set to open (class)
     *
     * @param $url
     * @param string $class
     * @return string
     */
    function isOpen($url, string $class = 'menu-open'): string
    {
        return request()->is($url) ? $class : '';
    }
}

if (! function_exists('checkEmptyValues')) {
    /**
     * Check Empty Values from
     *
     * @param array $data
     * @return Collection
     */
    function checkEmptyValues(array $data = []): Collection
    {
        if (empty($data)) {
            return collect([]);
        }

        foreach ($data as $key => $value) {
            if (is_array($value) && count($value) === 0) {
                $data[$key] = setDefaultValue();
            } elseif (! is_array($value) && empty(trim((string)$value) || $value === '')) {
                $data[$key] = setDefaultValue();
            } elseif ($value === null || $value === 'null') {
                $data[$key] = setDefaultValue();
            }
        }

        return arrayToObject($data);
    }
}

if (! function_exists('slug')) {
    /**
     * Convert string to Slug format
     *
     * @param string $string
     * @return string
     */
    function slug(string $string = ''): string
    {
        return Str::slug($string);
    }
}

if (! function_exists('unSlug')) {
    /**
     * Convert Slug to UnSlug format
     *
     * @param string $string
     * @return string
     */
    function unSlug(string $string = ''): string
    {
        return ucwords(str_replace('-', ' ', $string));
    }
}

if (! function_exists('checkSelectedValue')) {
    /**
     * Check value is selected
     *
     * @param $id
     * @param array $array
     * @return bool
     */
    function checkSelectedValue($id, array $array = []): bool
    {
        if ($array !== null) {
            foreach ($array as $selectedPermission) {
                if ($id === (int) $selectedPermission) {
                    return true;
                }
            }
        }

        return false;
    }
}

if (! function_exists('getIdsFrom')) {
    /**
     * Get Ids From Collection
     *
     * @param $collection
     * @return array
     */
    function getIdsFrom($collection): array
    {
        return array_map(static function ($item) {
            return $item[0];
        }, $collection);
    }
}

if (! function_exists('getClientIp')) {
    /**
     * Get Client IP fro Client
     *
     * @return string
     */
    function getClientIp()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ipAddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipAddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipAddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipAddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipAddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipAddress = getenv('REMOTE_ADDR');
        } else {
            $ipAddress = config('settings.nullIpAddress');
        }

        return (string) $ipAddress;
    }
}

if (! function_exists('boolean')) {
    /**
     * Check if variable is boolean type
     *
     * @param $variable
     * @return bool
     */
    function boolean($variable): bool
    {
        return filter_var($variable, FILTER_VALIDATE_BOOLEAN);
    }
}

if (! function_exists('convertToCamelCase')) {
    /**
     * Convert to CamelCase
     *
     * @param $string
     * @param string $delimiter
     * @param bool $capitalizeFirstCharacter
     * @return string|string[]
     */
    function convertToCamelCase($string, string $delimiter = '_', bool $capitalizeFirstCharacter = true)
    {
        $str = str_replace($delimiter, '', ucwords($string, $delimiter));

        if (! $capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}

if (! function_exists('objectToArray')) {
    /**
     * Convert object to array
     *
     * @param $d
     * @return array|void
     */
    function objectToArray($d)
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        }

        // Return array
        return $d;
    }
}

if (! function_exists('getClassName')) {
    /**
     * Get Class Name Without Namespace
     *
     * @param $class
     * @return mixed
     */
    function getClassName($class)
    {
        $path = explode('\\', $class);
        return array_pop($path);
    }
}

if (! function_exists('makeScripts')) {
    /**
     * Make Scripts
     *
     * @param $attribs
     * @return string
     */
    function makeScripts($attribs): string
    {
        $scripts = '';

        if (in_array($attribs, ['{}', '[]'], true)) {
            return $scripts;
        }

        $page_scripts = json_decode($attribs, false)->scripts;

        if (count($page_scripts) > 0) {
            foreach ($page_scripts as $script) {
                $scripts .= '<script src="' . asset($script) . '"></script>';
            }
        }

        return $scripts;
    }
}


if (! function_exists('json_to_object')) {
    /**
     * json_to_object
     *
     * @param $attribs
     * @return string
     */
    function json_to_object($data) : array
    {
        try {
            $data = json_decode($data);
        } catch (Exception $th) {
            return [];
        }
        return $data ;
    }
}
