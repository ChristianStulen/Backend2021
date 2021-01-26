<?php
class App{
    //Endpoint and a standard value of the amount of products to be shown.
    public static $endpoint ="http://localhost/Inlamning-03-VG/Api/index.php";
    public static $nrShow = 10;

    //Main, if wrong input is entered the page gets redirected to error screen.
    public static function main()
    {      
        $nrShow=$_GET['show'] ?? self::$nrShow;  
        try {            
            if (!in_array($nrShow, range(1,10))) 
            header("Location: http://localhost/Inlamning-03-VG/Api/index.php?show=$nrShow");
            elseif(!preg_match_all("/^[1-9][0-9]*$/", $nrShow))
            header("Location: http://localhost/Inlamning-03-VG/Api/index.php?show=$nrShow");
            else{
                $array = self::getData();
                self::allProducts($array);
            } 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    //Get data and throws if there is not access.
    public static function getData()
    {
        $nrShow=$_GET['show'] ?? self::$nrShow;
        $json = file_get_contents(self::$endpoint."?show=$nrShow");
        if (!$json)
            throw new Exception("Cannot access ".self::$endpoint);
        return json_decode($json, true);
    }
    //Echos out the products in a nice format.
    public static function allProducts($array)
    {
        
        $result = "<div class='row'>";       
            
        foreach ($array as $key => $value) {
                
                $picture =$value['picture'];
                $title = $value['title'];
                $price = $value['price'];
                $description = $value['description'];
                $stock = "Current stock ".rand(0,50);
    
                $result .= "
                <div class='col-lg-4 col-md-6 mb-4'>
                    <div class='card h-100'>
                        <a><img class='card-img-top' src=Images/$picture  alt=''></a>
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <a>$title</a>
                            </h4>
                            <h5>$$price</h5>
                            <p class='card-text'>$description</p>
                            <h5>$stock</h5>
                        </div>
                    </div>
                </div>";                       
            }
        $result .= "</div>";
        echo $result; 
    }      
}
