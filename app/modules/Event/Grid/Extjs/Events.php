<?php
/**
 * namespace
 */
namespace Event\Grid\Extjs;

use Engine\Crud\Grid\Extjs as Grid,
    Engine\Crud\Grid\Column,
    Engine\Crud\Grid\Filter,
    Engine\Crud\Grid\Filter\Field,
    Engine\Filter\SearchFilterInterface as Criteria;

/**
 * Class events.
 *
 * @category   Module
 * @package    Event
 * @subpackage Grid
 */
class Events extends Grid
{
    /**
     * Extjs module name
     * @var string
     */
    protected $_module = 'event';

    /**
     * Extjs grid key
     * @var string
     */
    protected $_key = 'events';

    /**
     * Grid title
     * @var string
     */
    protected $_title = 'Events';

	/**
	 * Container model
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
	protected function _initColumns()
	{
		$this->_columns = [
			'id' => new Column\Primary('Primary'),
			'namer' => new Column\Text('Name', 'name'),
            'member' => new Column\JoinOne("Member", "\Event\Model\Members"),
			'start' => new Column\Date('Start', 'start_date'),
            'status' => new Column\Collection('Status', 'event_status', ['0' => 'not active', '1' => 'active'])
		];
	}
	
	/**
	 * Initialize grid filters
	 *
	 * @return void
	*/
	protected function _initFilters()
	{
		$this->_filter = new Filter([
            'id' => new Field\Primary('Event id'),
            'name' => new Field\Name('Event name', "Event name desc", Criteria::CRITERIA_BEGINS),
            'member' => new Field\Join('Member', '\Event\Model\Members'),
            'status' => new Field\ArrayToSelect("Status", "event_status", ['0' => 'not active', '1' => 'active'])
        ], null, 'get');
	}
}