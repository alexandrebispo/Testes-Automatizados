<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;

    use Education\Interfaces\InputInterface;
    use Education\Form\AbstractField;
    
    /**
    * Cria Objeto Input
    */
    class Input extends AbstractField implements InputInterface
    {   

        /**
        * @param string $value
        * @return Label
        */
        public function setValue($value)
        {
            $this->attributes['value'] = $value;
            return $this->attributes['value'];
        }

        /**
        * @return $value
        */
        public function getValue()
        {
            if(!is_null($this->attributes['value'])){
                return $this->attributes['value'];
            }

            return null;
        }

        /**
        * @return $this->attributes['type']
        */
        public function getType()
        {
            return (!is_null($this->attributes['type']) ? $this->attributes['type'] : null);
        }

        /**
        * Prints an HTML form
        */
        public function getElement()
        {
            echo "<input ";

            foreach ($this->attributes as $attrName => $attrValue) {
                echo $attrName  .  "='"   .   $attrValue   .   "'";
            }

            echo "/><br />";
        }
    }
?>