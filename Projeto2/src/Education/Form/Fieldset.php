<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

	namespace Education\Form;

    use Education\Interfaces\ElementInterface;
    use Education\Form\FieldContainer;

    class Fieldset extends FieldContainer implements ElementInterface
    {   
        /**
        * @param string
        */
        protected $legend;

        public function __construct($legend = null)
        {
            $this->legend = $legend;
        }

        /**
        * @param string $legend
        * @return Fieldset
        */
        public function setLegend($legend)
        {
            $this->legend = $legend;
            return $this->legend;
        }

        /**
        * @return $legend
        */
        public function getLegend()
        {
            return $this->legend;
        }

        /**
        * Prints an HTML form
        */
        public function getElement()
        {
            echo "<fieldset><legend>" . $this->legend . "<legend/>";
            
            if($this->fields > 0){
                foreach ($this->fields as $field) {
                    $field->getElement();
                }
            }
            
            echo "<fieldset />";
        }

    }