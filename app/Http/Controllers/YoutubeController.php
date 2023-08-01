<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_YouTube;


class YoutubeController extends Controller
{
    public function index(){
        return view('youtube');
    }
    
    public function search(){
        //検索されたら
        if (isset($_GET['q']) && isset($_GET['maxResults'])) {
            
            //$DEVELOPER_KEY =  env("YOUTUBE_API_KEY");
            $DEVELOPER_KEY =  config("services.youtube.apikey");
            $client = new Google_Client();
            $client->setDeveloperKey($DEVELOPER_KEY);
            
            $youtube = new Google_Service_YouTube($client);
            
            try {
                    $searchResponse = $youtube->search->listSearch('id,snippet', array(
                      'q' => $_GET['q'],
                      'maxResults' => $_GET['maxResults'],
                    ));
                    $videos = [];
                    $channels = [];
                    $playlists = [];

                    foreach ($searchResponse['items'] as $searchResult) {
                        switch ($searchResult['id']['kind']) {
                            case 'youtube#video':
                                array_push($videos, [$searchResult['snippet']['title'], $searchResult['id']['videoId']]);
                                break;
                            case 'youtube#channel':
                                array_push($channels, [$searchResult['snippet']['title'], $searchResult['id']['channelId']]);
                                break;
                            case 'youtube#playlist':
                                array_push($playlists, [$searchResult['snippet']['title'], $searchResult['id']['playlistId']]);
                                break;
                        }
                    }
                } catch (Google_Service_Exception $e) {
                        echo $e->getMessage();
                } catch (Google_Exception $e) {
                        echo $e->getMessage();
                }
            return view('youtube')->with(["videos" => $videos, "channels" =>$channels, "playlists" => $playlists]);
        }
    }
    
    public function search_videos(){
        //検索されたら
        if (isset($_GET['q']) && isset($_GET['maxResults'])) {
            
            //$DEVELOPER_KEY =  env("YOUTUBE_API_KEY");
            $DEVELOPER_KEY =  config("services.youtube.apikey");
            $client = new Google_Client();
            $client->setDeveloperKey($DEVELOPER_KEY);
            
            $youtube = new Google_Service_YouTube($client);
            
            try {
                    $searchResponse = $youtube->search->listSearch('id,snippet', array(
                      'q' => $_GET['q'],
                      'maxResults' => $_GET['maxResults'],
                    ));
                    $videos = [];

                    foreach ($searchResponse['items'] as $searchResult) {
                        switch ($searchResult['id']['kind']) {
                            case 'youtube#video':
                                array_push($videos, [$searchResult['snippet']['title'], $searchResult['id']['videoId']]);
                                break;
                        }
                    }
                } catch (Google_Service_Exception $e) {
                        echo $e->getMessage();
                } catch (Google_Exception $e) {
                        echo $e->getMessage();
                }
            return view('youtube')->with(["videos" => $videos, "count_videos" => count($videos), "search_word" => $_GET['q']]);
        }
    }
    
    
}