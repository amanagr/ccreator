<?php
class block_ccreator extends block_base {
    public function init() {
        $this->title = "Userfull Links";
    }
    public function get_content() {
        $this->content         =  new stdClass;
        $create_course_url = new moodle_url("/course/edit.php?category=3&returnto=/my/");
        $this->content->text   = "<a href=$create_course_url>Create new batch</a>";
        return $this->content;
    }
}
