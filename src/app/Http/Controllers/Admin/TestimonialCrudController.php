<?php

namespace SmartyStudio\TestimonialCrud\app\Http\Controllers\Admin;

use SmartyStudio\TestimonialCrud\app\Models\Testimonial;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use SmartyStudio\TestimonialCrud\app\Http\Requests\TestimonialRequest;

/**
 * Class TestimonialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TestimonialCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
		$this->crud->setModel(Testimonial::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/testimonial');
        $this->crud->setEntityNameStrings('testimonial', 'testimonials');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
		/**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); (1)
		 * - $this->crud->addField(['name' => 'title']); (2)
         */
		$this->crud->addColumn([
			'name' 	 => 'image',
            'label'  => 'Image',
            'type' 	 => 'image',
			'width'	 => '200px',
            'height' => '200px',
		]);

		$this->crud->addColumn([
			'name'  => 'client_name',
			'label' => 'Client Name',
		]);

		$this->crud->addColumn('status');
        $this->crud->addColumn('created_at');
        $this->crud->addColumn('updated_at');

		if (!backpack_user()->hasRole('Superadministrator') || !backpack_user()->hasPermissionTo('Delete Testimonials')) {
			$this->crud->denyAccess('delete');
			$this->crud->removeButton('delete');
        }
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
		/**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); (1)
		 * - $this->crud->addField(['name' => 'title']); (2)
         */
        $this->crud->setValidation(TestimonialRequest::class);

        $this->crud->addField([
			'name' 			=> 'title',
            'label' 		=> 'Title',
            'type' 			=> 'text',
            'placeholder' 	=> 'Your title here',
		]);

        $this->crud->addField([
			'name' 			=> 'content',
            'label' 		=> 'Content',
            'type'      => 'wysiwyg',
            'options'   => [
                'allowedContent'        => true,
                'toolbar'               => [
                    ['Font', 'FontSize', 'Bold', 'Italic', 'Underline', 'Strike'],
                    ['-', 'Source'],
                    ['Maximize']
                ],
            ],
            'placeholder' 	=> 'Your textarea text here',
		]);

		$this->crud->addField([
			'name' 			=> 'client_name',
            'label' 		=> 'Client',
            'type' 			=> 'text',
            'placeholder' 	=> 'Your client name here',
			'wrapper' 		=> [
				'class' 	=> 'form-group col-md-6'
			],
		]);

		$this->crud->addField([
			'name' 			=> 'client_url',
            'label' 		=> 'Client URL',
            'type' 			=> 'text',
            'placeholder' 	=> 'Your client url address here',
			'wrapper' 		=> [
				'class' 	=> 'form-group col-md-6'
			],
		]);

        $this->crud->addField([
            'name' 	=> 'image',
            'label' => 'Image',
            'type' 	=> 'browse',
			'wrapper' 		=> [
				'class' 	=> 'form-group col-md-6'
			],
        ]);

        $this->crud->addField([
            'name' 	=> 'status',
            'label' => 'Status',
            'type' 	=> 'enum',
			'wrapper' 		=> [
				'class' 	=> 'form-group col-md-6'
			],
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
