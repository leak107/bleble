<?php 

class CourseManagementTest
{
    public function run()
    {
    }
}

if (php_sapi_name() == 'cli') {
    $obj = new CourseManagementTest();
    echo $obj->run();
}
