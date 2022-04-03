<?php
//docker run -it --rm -v ${PWD}:/usr/src/myapp -w /usr/src/myapp php:7.4-cli php index.php

class rgb
{
    private int $red;
    private int $green;
    private int $blue;

     public function __construct(int $red, int $green, int $blue)
  {
      $this->setRed($red);
      $this->setGreen($green);
      $this->setBlue($blue);
  }

    private function setRed(int $red){
       if($red < 0 || $red > 255){
           throw new Exception(wrong);
        }

         $this->red = $red;
  }

    private function setGreen(int $green){
        if($green < 0 || $green > 255) {
            throw new Exception(wrong);
        }
            $this->green = $green;
    }

    private function setBlue(int $blue){
         if($blue < 0 || $blue > 255) {
            throw new Exception(wrong);
        }
        $this->blue = $blue;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    // метод сравнения обьектов цветов

    public function equals(rgb $rgb): int
    {
        //return $this->green === $rgb->getRed() && $this->blue === $rgb->getGreen() && $this->red === $rgb->getBlue();
        return  $this == $rgb;

    }


    // генератор случайного цвета

    public static function rand(rgb $rgb)
    {
        return new rgb (rand(0, 255), (rand(0, 255)), (rand(0, 255)));
    }
    // смешивание цветов
    public function mix(rgb $rgb)
    {
        //return $rgb->green + $rgb->getRed() / 2;
        return new rgb (
            intval((($rgb->getGreen ()) + $rgb->getRed() / 2)),
            intval((($rgb->getGreen()) + $rgb->getRed() / 2)),
            intval((($rgb->getGreen()) + $rgb->getRed() / 2)));
    }
}

$rgb = new rgb(200, 200, 200);

$rgb2 = new rgb(200, 200, 200);

//$mixedColor = rgb::rand($rgb);

$mixedColor = $rgb->mix(new rgb(100, 100, 100));

echo $mixedColor->getRed() .PHP_EOL;

echo $mixedColor->getGreen() .PHP_EOL;

echo $mixedColor->getBlue() .PHP_EOL;

//var_dump($mixedColor);

if (!$rgb->equals($mixedColor)) {
    echo 'Цвета не равны';
    }else{
    echo 'все окей';
}

//var_dump($rgb);
//var_dump($rgb->equals($rgb2));