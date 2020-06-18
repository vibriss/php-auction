<?php

class Result {
    protected $_errors = [];
    protected $_messages = [];
    protected $_warnings = [];
    protected $_source = 'global';
    
    public function set_source($string) {
        $this->_source = $string;
    }
    
    public function get_source($string) {
        return $this->_source;
    }

    public function add_error($string) {
        $this->_errors[] = $string;
    }
    
    public function add_message($string) {
        $this->_messages[] = $string;
    }
    
    public function add_warning($string) {
        $this->_warnings[] = $string;
    }
    
    public function is_successful() {
         return empty($this->_errors);
    }
    
    public function send_to_template() { //TODO как правильно назвать?
 /*       $_SESSION[ //TODO почему не работает?
            'errors' => $this->_errors,
            'messages' => $this->_messages,
            'warnings' => $this->_warnings
        ]*/
        $_SESSION['errors'] = $this->_errors;
        $_SESSION['warnings'] = $this->_warnings;
        $_SESSION['messages'] = $this->_messages;
    }
    
    private function get_errors() {
        return $this->_errors;
    }
    
    private function get_messages() {
        return $this->_messages;
    }
    
    private function get_warnings() {
        return $this->_warnings;
    }
    
    public function add_result($result) {
        $this->_errors = array_merge($this->_errors, $result->get_errors());
        $this->_messages = array_merge($this->_messages, $result->get_messages());
        $this->_warnings = array_merge($this->_warnings, $result->get_warnings());
    }
}