<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Easy PHP Validation
 *  @link https://github.com/Respect/Validation
 */
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;

class Mals_Model extends CI_Model {

    /**
     * Container to save bean Name
     * @var string
     */
    protected $beanName;

    /**
     * RespectValidation Validator Object
     * @var mixed Respect\Validation\Validator
     */
    protected $validator;

    /**
     * Constructor
     */
    public function __construct(){
        parent::__construct();
    }

    public function v(){
        return new Validator();
    }

    public function validate($fields, $obj){
        $this->loadValidator($fields);

        return $this->validator->validate($obj);
    }

    public function errorMessage($obj){
        try {
            $this->validator->assert($obj);
        } catch (NestedValidationException $exception) {
            return $exception->getMessages();
        }

        return NULL;
    }
    
    private function loadValidator($fields){
        // $fields = R::inspect($this->beanName);
        $this->validator = new Validator();
        foreach ($fields as $field) {
            $valMethod = $field . '_val';
            if(method_exists($this, $valMethod)){
                $fieldValidator = $this->$valMethod();
                if(!is_object($fieldValidator)){
                    show_error('The '.$field.' validation method is not returning Validator object. Please refer to documentation for further Information.');
                }

                $this->validator->attribute($field, $this->$valMethod());
            }
        }
    }
}