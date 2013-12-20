<?php
/**
 * namespace
 */
namespace Event\Form;

use Engine\Crud\Form,
    Engine\Crud\Form\Field;

/**
 * Form events.
 *
 * @category   Module
 * @package    Event
 * @subpackage Form
 */
class Events extends Form
{
    /**
     * Form Title
     * @var string
     */
    protected $_title = 'Events';

    /**
     * Form action
     * @var string
     */
    protected $_action = '/event/save';

	/**
	 * Container model
	 *
	 * @var string
	 */
	protected $_containerModel = '\Event\Model\Events';

	/**
	 * Container condition
	 * @var array|string
	 */
	protected $_containerConditions = null;
	
	/**
	 * Initialize grid columns
	 *
	 * @return void
	 */
	protected function _initFields()
	{
		$this->_fields = [
			'id' => new Field\Primary('Id'),
			'name' => new Field\Text('Name', 'name'),
            'member' => new Field\ManyToOne("Member", "\Event\Model\Members"),
			'start' => new Field\Date('Start', 'start_date'),
            'status' => new Field\ArrayToSelect('Status', 'event_status', ['0' => 'not active', '1' => 'active']),
            'Save' => new Field\Submit()
		];
	}
}