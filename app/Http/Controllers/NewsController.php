<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewsController extends Controller
{
    public function getData(){
        $client = new Client();
        $request = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=db97426188744b26986b8fa464eabb3f');
        $response = $request->getBody();
        $result = json_decode($response);
        return view('home',['artikel'=>$result->articles]);
    }
    public function searchData(Request $request){
        $client = new Client();
        $query = $request->keyword;
        $req = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=db97426188744b26986b8fa464eabb3f&q='.$query);
        $response = $req->getBody();

        $result = json_decode($response);
        return view('home',['artikel'=>$result->articles]);
    }
}
