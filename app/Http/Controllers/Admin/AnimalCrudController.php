<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AnimalRequest;
use App\Models\AnimalSpecies;
use App\Models\Breed;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\PermissionManager;
use Illuminate\Support\Facades\Auth;

/**
 * Class AnimalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AnimalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        $user = Auth::user();
        if(!$user->hasRole('Admin'))
        {
            $this->crud->denyAccess(['create', 'update', 'delete']);
        }
        CRUD::setModel(\App\Models\Animal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/animal');
        CRUD::setEntityNameStrings('animal', 'animals');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $species = AnimalSpecies::all('id');
        $breeds = Breed::all('id');
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'name',
            'label' => 'Name'
        ],
            false,
            function($value) { // if the filter is active
                 $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
            });

        $this->crud->addFilter([
            'type'  => 'date',
            'name'  => 'date',
            'label' => 'Birthdate'
        ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $this->crud->addClause('where', 'bithdate', $value);
            });

        CRUD::column('name');
        CRUD::column('breed_id');
        CRUD::column('bithdate');
        CRUD::column('animalspecies_id');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AnimalRequest::class);

        CRUD::field('name');
        CRUD::field('breed_id');
        CRUD::field('bithdate');
        CRUD::field('image')->type('upload');
        CRUD::field('animalspecies_id');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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

    protected  function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'image', // The db column name
            'label' => "Picture", // Table column heading
            'type' => 'image',
        ]);
    }
}
