<?php
$nrShow =$_GET['show'] ?? 10;

header("Content-Type: application/json; charset=UTF-8");
$diskArray = array(
    array(
        "id"=>1,
        "title"=>"Beatles, Help",
        "picture"=> "BeatlesHelp.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>2,
        "title"=>"Beatles, For Sale",
        "picture"=> "BeatlesForSale.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>3,
        "title"=>"Djungelboken del 2",
        "picture"=> "DjungelbokenDel2.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>4,
        "title"=>"Du är den ende",
        "picture"=> "DuArDenEnde.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>5,
        "title"=>"Karl-Bertil Jonssons Julafton",
        "picture"=> "KarlBertilJonssonsJulafton.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>6,
        "title"=>"StatusQuo",
        "picture"=> "StatusQuo.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>7,
        "title"=>"Sven-Ingvars",
        "picture"=> "Sven-Ingvars.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>8,
        "title"=>"Världens bästa Karlsson",
        "picture"=> "VarldensBastaKarlsson.jpeg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>9,
        "title"=>"Lady och Lufsen",
        "picture"=> "LadyochLufsen.jpg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    ),
    array(
        "id"=>10,
        "title"=>"Anitas och Televinkens Trafikskiva",
        "picture"=> "AnitasTrafikskiva.jpg",
        "description"=>"Beskrivande text om skivan. Den är kanon!",
        "price"=>200,
        "stock"=>rand(0,50)
    )
);

if (!in_array($nrShow, range(1,10))){
    $error=array(
        "Error"=>"Please write an int between 1-10."
    );
    echo json_encode($error); 
}elseif (!preg_match_all("/^[1-9][0-9]*$/", $nrShow)){
    $error=array(
        "Error"=>"Please write only an int"
    );
    echo json_encode($error);
}else{
    $sendDiskArray = array_slice($diskArray,0,$nrShow);
    echo json_encode($sendDiskArray, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
} 


