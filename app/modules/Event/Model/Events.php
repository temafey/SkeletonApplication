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
class Events extends \Engine\Mvc\Model
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
    protected $_orderExpr = 'start_date';

    /**
     *
     * @var integer
     */
    public $events_id;
     
    /**
     *
     * @var integer
     */
    public $members_id;
     
    /**
     *
     * @var integer
     */
    public $campaigns_id;
     
    /**
     *
     * @var integer
     */
    public $locations_id;
     
    /**
     *
     * @var integer
     */
    public $venues_id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var string
     */
    public $description;
     
    /**
     *
     * @var string
     */
    public $tickets_url;
     
    /**
     *
     * @var string
     */
    public $start_date;
     
    /**
     *
     * @var string
     */
    public $end_date;
     
    /**
     *
     * @var integer
     */
    public $recurring;
     
    /**
     *
     * @var integer
     */
    public $event_status;
     
    /**
     *
     * @var string
     */
    public $address;
     
    /**
     *
     * @var integer
     */
    public $coordinates;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo("members_id", "\Event\Model\Members", "members_id", ['alias' => 'Members']);
    }
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'events_id' => 'events_id', 
            'members_id' => 'members_id', 
            'campaigns_id' => 'campaigns_id', 
            'locations_id' => 'locations_id', 
            'venues_id' => 'venues_id', 
            'name' => 'name', 
            'description' => 'description', 
            'tickets_url' => 'tickets_url', 
            'start_date' => 'start_date', 
            'end_date' => 'end_date', 
            'recurring' => 'recurring', 
            'event_status' => 'event_status', 
            'address' => 'address', 
            'coordinates' => 'coordinates'
        );
    }

    public function getSource()
    {
        return "events";
    }
}
