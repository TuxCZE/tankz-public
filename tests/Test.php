<?php
/**
 * Created by PhpStorm.
 * User: refuse
 * Date: 3/13/18
 * Time: 9:26 PM
 */

class Test
{
    protected $testCount = 10;
    protected $passedTests = 0;

    public function __construct()
    {
     $methods = get_class_methods(get_class($this));
     foreach ($methods as $method) {
         if (strpos($method, 'test') === 0) {
             $this->{$method}();
         }
     }
    }


    function assertEqual($var1, $var2, $name) {
        print_r("TEST: $name ");
        if ($var1 ===
            $var2) {
            print_r('<span style="color: green">PASSED</span>');
            $this->passedTests ++;
        } else {
            print_r('<span style="color: red">FAILED</span> <br /> - given:');
            print_r($var1);
            print_r('<br /> expected: ');
            print_r($var2);
            print_r("<br />");
        }
        print_r(" [$this->passedTests/$this->testCount] <br />");
    }

}
