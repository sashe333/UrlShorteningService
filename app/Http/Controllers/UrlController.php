<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Domain\URL\Interfaces\UrlShortenerInterface;

class UrlController extends Controller
{
    /**
     * @param UrlShortenerInterface $shortenerService
     * @param Request $request
     * @param Url $url
     */
    public function __construct(UrlShortenerInterface $shortenerService,  Request $request, Url $url){
        $this->shortenerService = $shortenerService;
        $this->request = $request;
        $this->url = $url;
    }


    public function index(){
        $urls = $this->url->all();

        return view('urls', compact('urls'));
    }

    public function store(){

        $longUrl = $this->request->input('url');
        $shortUrl = $this->shortenerService->shorten((string) $longUrl);

        $this->url->create([
            'url' =>  $longUrl,
            'url_short' => $shortUrl
        ]);

        return redirect()->back();
    }

    public function redirect($hash){
        $domain = Config::get('app.url');

        $shortDomain = $domain . "/" . $hash;

        try {
            $urlRecord = $this->url->where('url_short', $shortDomain)->firstOrFail();


            $urlRecord->increment('short_url_access_count');


            return redirect()->away($urlRecord->url);
        }catch(\Exception $e){
            throw new ShortURlNotFoundException($e->getMessage);
        }
    }
}
