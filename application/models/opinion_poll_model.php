<?php

class Opinion_poll_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function total_votes() {
        $query = $this->db->select('COUNT(choice) as choices_count')->get('js_libraries');
        return $query->row()->choices_count;
    }

    public function get_results() {
        $libraries = array(" ", "JQuery", "MooTools", "YUI Library", "Glow");
        $table_rows = '<table>';

        for ($i = 1; $i < 5; $i++) {
            $sqlStmt = $this->db->select('COUNT(choice) choices_count')->get_where('js_libraries', array('choice' => $i));
            $result=$sqlStmt->row()->choices_count;
            //              choice = $i     
//             $result = $this->select($sql_stmt); 
            $table_rows .= "<tr><td>" . $libraries [$i] .
            " Got:</td><td><b>" . $result. "</b> votes</td></tr>";
        }
        $table_rows .= '</table>';
        return $table_rows;
    }

    public function add_vote($choice) {
        $ts = date("Y-m-d H:i:s");
        $data = array('choice' => $choice, 'ts' => $ts);
        $this->db->insert('js_libraries', $data);
    }

}

?>