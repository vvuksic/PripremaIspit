<?php

class Utils {
    public static function generateRandomString(int $length): string{
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

echo Utils::generateRandomString(10) . PHP_EOL;

enum Gender: string{
    case MA = "Male";
    case FE = "Female";
    case OT = "Other";
}

class User{
    private string $name;
    private Gender $gender;

    public function __construct(string $name, Gender $gender){
        $this->name = $name;
        $this->gender = $gender;
    }

    public function __get($name){
        return $this->$name;
    }
}

$user = new User("Mark", Gender::MA);
echo $user->gender->value;