<?php
class TextFilter
{
    private $text;
    function __construct($text)
    {
        $this->text = $text;
    }
    public function makeTrim($toRemove, $mode = ' ')
    {
        switch ($mode) {
            case 'l':
                $this->text = ltrim($this->text, $toRemove);
                break;
            case 'r':
                $this->text = rtrim($this->text, $toRemove);
                break;
            default:
                $this->text = trim($this->text, $toRemove);
        }
        return $this;
    }

    public function makeEntity()
    {
        $this->text = htmlentities($this->text, ENT_QUOTES);
        return $this;
    }
    public function makeStripSlash()
    {
        $this->text = stripslashes($this->text);
        return $this;
    }
}
