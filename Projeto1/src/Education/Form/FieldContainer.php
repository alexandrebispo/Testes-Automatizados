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

    abstract class FieldContainer
    {
    	/**
		* @var FormElement[]
     	*/
    	protected $fields;

    	public function addField(ElementInterface $field)
    	{
    		$this->fields[] = $field;
    		return $this->fields;
    		//tambem pode ser representada por:
    		//return $this;
    	}

        public function findFieldByName($name)
        {
            foreach ($this->fields as $field) {
               if ($field->getName() == $name) {
                   return $field;
               }
            }
        }

        public function populate(array $fielsdDefs = [])
        {
            foreach ($fielsdDefs as $fieldName => $value) {
                $field = $this->findFieldByName($fieldName);
                $field->setValue($value);
            }
        }
    }