<?php
namespace App\Domain\URL\Services;

use App\Models\Url;
use Hashids\Hashids;
use Illuminate\Support\Facades\Config;
use App\Domain\URL\Interfaces\UrlShortenerInterface;
use Symfony\Component\String\Exception\InvalidArgumentException;

class UrlShortenerService implements UrlShortenerInterface
{
    /**
     * @var Hashids
     */
    protected $hashids;

    /**
     * @param Hashids $hashids
     */
    public function __construct(Hashids $hashids){
        $this->hashids = $hashids;
    }

    /**
     * @param string $url
     * @return string
     */
    public function shorten($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Invalid URL');
        }

        $domain = Config::get('app.url');

        $hash = $this->hashids->encode(crc32($url));

        return $domain . "/" . $hash;
    }
}

?>
