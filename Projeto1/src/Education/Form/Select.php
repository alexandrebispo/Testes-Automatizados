<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;

    use Education\Interfaces\SelectInterface;
    use Education\Interfaces\ElementInterface;
    use Education\interfaces\OptionInterface;



    class Select extends AbstractField implements ElementInterface, SelectInterface
    {
        protected $options = [];

        public function addOption(OptionInterface $option)
        {
            $this->options[] = $option;
            return $this->options; 
        }

        public function getElement()
        {
            echo '<select name="'.  $this->getName()  .'">';

                foreach ($this->options as $option) {
                    $option->getElement();
                }
                
            echo '</select><br />';
        }
    }