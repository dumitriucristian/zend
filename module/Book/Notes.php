<?php
/*// Get a variable from GET
$getVar = $this->params()->fromQuery('var_name', 'default_val');

// Get a variable from POST
$postVar = $this->params()->fromPost('var_name', 'default_val');

//if module do not require dependencies register as invokableFactory

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    // ...

    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class
            // Put other controllers registration here
        ],
    ],

    // ...
];


//if module do REQURE dependencies request services from SERVICE MANAGER and pass service to controllers constructor
    //require factory class
    // Factory class
    class IndexControllerFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            // Get the instance of CurrencyConverter service from the service manager.
            $currencyConverter = $container->get(CurrencyConverter::class);

            // Create an instance of the controller and pass the dependency
            // to controller's constructor.
            return new IndexController($currencyConverter);
        }
    }
    //then register the controller but specigf the factory classs (Controller\Factory\IndexControllerFactory::class)

    return [
        // ...

        'controllers' => [
            'factories' => [
                Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class
            ],
        ],

        // ...
    ];

//Lazy loading
//namespace Application\Controller;

//use Application\Service\CurrencyConverter;

//class IndexController extends AbstractActionController

    // Here we will save the service for internal use.
    private $currencyConverter;

    // Typehint the arguments of constructor to get the dependencies.
    public function __construct(CurrencyConverter $currencyConverter)
    {
        $this->currencyConverter = $currencyConverter;
    }
}

use Zend\Mvc\Controller\LazyControllerAbstractFactory;

return [
    // ...

    'controllers' => [
        'factories' => [
            Controller\IndexController::class => LazyControllerAbstractFactory::class
        ],
    ],

    // ...
];

//Mdels are: Entity, value object, repository, services, factory - DDD data driven development

Your model class is definitely a Service
    if it encapsulates some business logic
    if you call it from your controller class
    if you think the best name for it ends with "er": suffix, like FileUploader or VersionChecker
Your model class is an Entity:
    if your model is stored in a database
    if it has an ID attribute
    if it has both getters and setters methods
Your model class is a ValueObject:
    if changing any attribute would make the model completely different
    if your model has getters, but not setters (immutable)
Your model is a Repository:
    if it works with a database to retrieve entities
Your model is a Factory:
    if it can create other objects and can do nothing else

//Skinny Controllers, Fat Models, Simple Views

//Skinny controller - in your controller classes, you put only the code that:
    accesses user request data ($_GET, $_POST, $_FILES and other PHP variables);
    checks the validity of the input data;
    (optionally) makes some basic preparations to the data;
    passes the data to model(s) and retrieves the result returned by the model(s);
    and finally returns the output data as a part of a ViewModel variable container.

    AVOID
containing complex business logic, which is better kept in model classes;
containing any HTML or any other presentational markup code. This is better be put in view templates.