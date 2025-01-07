<?php

namespace ContainerQqvYiqH;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_ParameterValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'api_platform.state_provider.parameter_validator' shared service.
     *
     * @return \ApiPlatform\Symfony\Validator\State\ParameterValidatorProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Util'.\DIRECTORY_SEPARATOR.'ParameterParserTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Validator'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'ParameterValidatorProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'AccessCheckerProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Validator'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'ValidateProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'DeserializeProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'SecurityParameterProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Bundle'.\DIRECTORY_SEPARATOR.'SwaggerUi'.\DIRECTORY_SEPARATOR.'SwaggerUiProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Util'.\DIRECTORY_SEPARATOR.'OperationRequestInitiatorTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'ReadProvider.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'validator'.\DIRECTORY_SEPARATOR.'ValidatorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Validator'.\DIRECTORY_SEPARATOR.'Validator.php';

        $a = ($container->privates['validator'] ?? self::getValidatorService($container));
        $b = ($container->privates['api_platform.openapi.serializer_context_builder'] ?? $container->load('getApiPlatform_Openapi_SerializerContextBuilderService'));
        $c = ($container->privates['api_platform.security.resource_access_checker'] ?? self::getApiPlatform_Security_ResourceAccessCheckerService($container));

        return $container->services['api_platform.state_provider.parameter_validator'] = new \ApiPlatform\Symfony\Validator\State\ParameterValidatorProvider($a, new \ApiPlatform\Symfony\Security\State\AccessCheckerProvider(new \ApiPlatform\Symfony\Validator\State\ValidateProvider(new \ApiPlatform\Symfony\Security\State\AccessCheckerProvider(new \ApiPlatform\State\Provider\DeserializeProvider(new \ApiPlatform\State\Provider\SecurityParameterProvider(new \ApiPlatform\Symfony\Security\State\AccessCheckerProvider(new \ApiPlatform\Symfony\Bundle\SwaggerUi\SwaggerUiProvider(new \ApiPlatform\State\Provider\ReadProvider(($container->privates['api_platform.state_provider.locator'] ?? self::getApiPlatform_StateProvider_LocatorService($container)), $b), ($container->privates['api_platform.openapi.factory'] ?? $container->load('getApiPlatform_Openapi_FactoryService'))), $c), $c), ($container->privates['serializer'] ?? self::getSerializerService($container)), $b, NULL), $c, 'post_denormalize'), new \ApiPlatform\Symfony\Validator\Validator($a, ($container->privates['api_platform.filter_locator'] ??= new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [], [])))), $c, 'post_validate'));
    }
}
