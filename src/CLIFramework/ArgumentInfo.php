<?php
namespace CLIFramework;

class ArgumentInfo
{
    public $name;

    public $isa;

    public $optional;

    public $suggestions;

    public $validValues;

    public function __construct($name, $desc = null)
    {
        $this->name = $name;
        if ($desc) {
            $this->desc = $desc;
        }
    }

    public function isa($isa) {
        $this->isa = $isa;
        return $this;
    }

    public function desc($desc) {
        $this->desc = $desc;
        return $this;
    }

    public function optional($optional = true) {
        $this->optional = $optional;
        return $this;
    }

    public function validValues($val) {
        $this->validValues = $val;
        return $this;
    }

    /**
     * Assign suggestions
     *
     * @param string[]|string|Closure $value
     *
     * $value can be an array of strings, or a closure
     *
     * If $value is string, the prefix "zsh:" will be translated into zsh function call.
     */
    public function suggestions($values) {
        $this->suggestions = $values;
        return $this;
    }


    public function getSuggestions() {
        if ($this->suggestions) {
            if (is_callable($this->suggestions)) {
                return call_user_func($this->suggestions);
            }
            return $this->suggestions;
        }
    }


    public function getValidValues() {
        if ($this->validValues) {
            if (is_callable($this->validValues)) {
                return call_user_func($this->validValues);
            }
            return $this->validValues;
        }
    }




    /**
     * Test a value if it match the spec
     */
    public function test($value) {
        if ($this->isa) {
            switch($this->isa) {
            case "number":
                return is_numeric($value);
            case "boolean":
                return is_bool($value);
            case "string":
                return is_string($value);
            }
        }
        return true;
    }

}


