<?php
    class Contact
    {
        private $name;
        private $number;
        private $email;

        function __construct($name, $number, $email)
        {
            $this->name = $name;
            $this->number = $number;
            $this->email = $email;
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function getName()
        {
            return $this->name;
        }

        function setNumber($number)
        {
            $this->number = $number;
        }

        function getNumber()
        {
            return $this->number;
        }

        function setEmail($email)
        {
            $this->email = $email;
        }

        function getEmail()
        {
            return $this->email;
        }

        function save()
        {
            array_push($_SESSION['contact_list'], $this);
        }

        static function getAll()
        {
            return $_SESSION['contact_list'];
        }

        static function deleteAll()
        {
            $_SESSION['contact_list'] = array();
        }
    }
 ?>
