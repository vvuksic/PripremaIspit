<?php
class AccountException extends Exception{}
Class Account{

    private float  $balance =0;

    public function __construct(bool $isSavings=false){
        if($isSavings){
            throw new Exception ("savings account not supported");
        }
    }

    public function deposit (float $ammount):void {
        if ($ammount  <=0) {
            throw new AccountException("Amount must be greter than 0");
        }
        $this->balance+=$ammount;
    }
}

try{
    $account =new Account(true);
    $account->deposit(-100);
    var_dump ($account);
}catch (AccountException $e)
{
echo $e->getMessage();
}catch(Exception $e){
    echo "General exception: " . $e->getMessage();
}
