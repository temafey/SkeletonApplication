<?php
/**
 * @namespace
 */
namespace Event\Model;

/**
 * Class events.
 *
 * @category   Module
 * @package    Event
 * @subpackage Model
 */
class Members extends \Engine\Mvc\Model
{
    /**
     * Name of column like dafault name column
     * @var string
     */
    protected $_nameExpr = 'name';

    /**
     * Default column name
     * @var string
     */
    protected $_orderExpr = 'members_id';

    /**
     *
     * @var integer
     */
    public $members_id;
     
    /**
     *
     * @var string
     */
    public $email;
     
    /**
     *
     * @var string
     */
    public $pass;
     
    /**
     *
     * @var string
     */
    public $phone;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var string
     */
    public $address;
     
    /**
     *
     * @var integer
     */
    public $location_id;
     
    /**
     *
     * @var string
     */
    public $auth_type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany("members_id", "\Event\Model\Events", "members_id", ['alias' => 'Events']);
    }
     
    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    "field"    => "email",
                    "required" => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'members_id' => 'members_id', 
            'email' => 'email', 
            'pass' => 'pass', 
            'phone' => 'phone', 
            'name' => 'name', 
            'address' => 'address', 
            'location_id' => 'location_id', 
            'auth_type' => 'auth_type'
        );
    }

}
