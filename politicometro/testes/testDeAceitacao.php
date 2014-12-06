<?php
require_once(dirname(__FILE__) .'/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/simpletest/web_tester.php');
SimpleTest::prefer(new TextReporter());

class WebTests extends TestSuite {
    function WebTests() {
        $this->TestSuite('Web site tests');
        $this->addFile(dirname(__FILE__) .'/politicometroTests.php');
    }
}

?>
