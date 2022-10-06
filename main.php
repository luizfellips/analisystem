<?php

function getViewCount(string $jsonString):int
{
   $jsonString = json_decode($jsonString,true);
   return $jsonString['videos'][0]['viewCount'];
  
    
        
}

$jsonString = '{
    "apiVersion":"2.1",
    "videos":[
        {
            "id":"253",
            "category":"Music",
            "title":"Jingle Bells",
            "duration":457,
            "viewCount":88270796
        }
    ]
}';

echo getViewCount($jsonString);