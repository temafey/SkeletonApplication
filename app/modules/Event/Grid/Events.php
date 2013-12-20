<?php
/**
 * namespace
 */
namespace Event\Grid;

use Engine\Crud\Grid,
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
			'id' => new Column\Numeric('Primary', 'events_id'),
			'namer' => new Column\Text('Name', 'name'),
            'member' => new Column\JoinOne("Member", "\Event\Model\Members"),
			'start' => new Column\Date('Start', 'start_date'),
            'status' => new Column\Collection('Status', 'event_status', ['0' => 'not active', '1' => 'active']),
            'actions' => new Column\Compound([
                'edit' => new Column\Action('/event/edit/{id}', 'Edit'),
                'delete' => new Column\Action('/event/delete/{id}', 'Delete')
             ], 'Actions', "\n")
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
            'status' => new Field\ArrayToSelect("Status", "event_status", ['0' => 'not active', '1' => 'active']),
            //'status' => new Field\Checkbox('event_status', 'Status'),
            'Search' => new Field\Submit()
        ], null, 'get');
	}
}