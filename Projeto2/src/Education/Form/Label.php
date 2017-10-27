<?php

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;

    use Education\Form\FieldContainer;
    use Education\Interfaces\LabelInterface;
    use Education\Interfaces\ElementInterface;

    /**
    * Cria Objeto Label
    */
    class Label extends FieldContainer implements LabelInterface, ElementInterface
    {   
        /**
        * @param string $text
        * @return Label
        */
        public function setText($text)
        {
            $this->attributes['text'] = $text;
            return $this->attributes['text'];
        }

        /**
        * @return $text
        */
        public function getText()
        {

            return (!is_null($this->attributes['text'])) ?   $this->attributes['text']   :    null;
        }

        /**
        * @param string $for
        * @return Label
        */
        public function setFor($for)
        {
            $this->attributes['for'] = $for;
            return $this->attributes['for'];
        }


        /**
        * @return $for
        */
        public function getFor()
        {
            return (!is_null($this->attributes['for'])) ?   $this->attributes['for']   :    null;
        }

        /**
        * Prints an HTML form
        */
        public function getElement()
        {
            echo "<label for='" . $this->getFor() . "'>"  .   $this->getText();
                if($this->fields > 0){
                    foreach ($this->fields as $field) {
                        $field->getElement();
                    }
                }
            echo "</label>";
        }

    }