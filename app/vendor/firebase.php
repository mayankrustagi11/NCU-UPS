<?php

require_once 'autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseDatabase {

    private $firebaseObject;
    private $databaseName = 'cloud-lab-e5bbc';

    public function __construct() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/cloud-lab-e5bbc-2952c8b3dd82.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        
        $this->firebaseObject = $firebase->getDatabase();
    }
    
    public function getData() {

        if($this->firebaseObject->getReference($this->databaseName)->getSnapshot()->hasChild()) {
            return $this->firebaseObject->getReference($this->databaseName)->getChild()->getValue();
        } else {
            return false;
        }
        
        //return $this->firebaseObject;
    }
}


?>
