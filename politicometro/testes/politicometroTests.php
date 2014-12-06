<?php
require_once(dirname(__FILE__) .'/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/simpletest/web_tester.php');

class TestPoliticometro extends WebTestCase {
    
    function testHomepage() {
        $this->assertTrue($this->get('http://politicometro.site50.net'));
        echo 'webServiceOnTest executado<br>';
        echo '------------------------------------------------<br>';
        $this->assertTitle('Politicômetro');
        echo 'webCorrectTest executado<br>';
        echo '------------------------------------------------<br>';
        
    }
}

?>
