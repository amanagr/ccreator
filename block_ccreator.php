<?php
class block_ccreator extends block_base {
    public function init() {
        $this->title = "Userfull Links";
    }
    public function get_content() {
        $this->content         =  new stdClass;
        global $DB, $USER;
        if($roles = $DB->get_records_select('role_assignments', "userid = $USER->id AND roleid = 1")) {
            $contextid = array_values($roles)[0]->contextid;
            $courseid = $DB->get_record_select("context", "id = $contextid")->instanceid;
            $categoryid = $DB->get_record_select("course", "id = $courseid")->category;
            $create_course_url = new moodle_url("/course/edit.php?category=$categoryid&returnto=/my/");
            $this->content->text   = "<a href=$create_course_url>Create new batch</a>";
        }
        return $this->content;
    }
}
