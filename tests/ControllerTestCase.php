<?php namespace Tests ; ?>
<?php

use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\JsonResource;
// todo check solid for methods and class
class ControllerTestCase extends TestCase {
    protected string $namespace;
    protected function namespace() :string {
        return $this->namespace;
    }
    public function test_controller_class_is_exist():void {
        $isExist = class_exists($this->namespace,true);
        $this->assertTrue(
            $isExist,
            $this->messageForMissingController()
        );
    }
    //todo create message repository class , methods in message repository use laravel lang
    protected function messageForMissingController(...$parameters):string {
        return "we not have {$this->namespace} class !!!";
    }

    protected function controllerInstance(array $controllerArgs = []) :object {
        return $this->app->make($this->namespace,$controllerArgs);
    }
    //@todo create controller method test case | class method test case
    protected function controllerHasMethod(string $method) :bool {
        return method_exists($this->namespace , $method) ;
    }
    //@todo move to controller method test case | class method test case
    protected function assertControllerHasMethod(
        string $method ,
        string $message = '' ,
    ):void {
        $methodIsExist = $this->controllerHasMethod($method);
        if (!$methodIsExist)
            $this->fillFromCallableWhenStrLengthIsZero(
                $message , [$this,'messageForMissingMethodInController'],[$method]
            );
        $this->assertTrue($methodIsExist , $message);
    }

    /**
     * @param string $method
     * @return string
     */
    protected function messageForMissingMethodInController( ...$parameters ):string {
        return " controller -> {$this->namespace} should have {$parameters[0]}() method !!!  ";
    }

    protected function callStaticMethodFromController(string $method , array $methodArgs = [] ){
        return $this->app->call([$this->namespace,$method],$methodArgs);
    }

    protected function callNoneStaticMethodFromController(
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
    ){
        $controller = $this->controllerInstance($controllerArgs);
        return $this->app->call([$controller,$method],$methodArgs);
    }

    protected function callMethodFromController(
        bool $isStatic ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
    ){
        return $this->conditionalCallableRunner(
            $isStatic,
            [$this, 'callStaticMethodFromController'],
            [$this,'callNoneStaticMethodFromController'],
            [$method , $methodArgs], [$method , $methodArgs , $controllerArgs]
        );
    }

    protected function assertMethodInControllerReturnInstanceOf(
        string $expected ,
        bool $isStatic ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
        string $message = ''
    ):void {
        $this->conditionalCallableRunner(
            $isStatic ,
            [$this , 'assertStaticMethodInControllerReturnInstanceOf'] ,
            [$this,'assertNoneStaticMethodInControllerReturnInstanceOf'] ,
            [$expected , $method , $methodArgs , $message ] ,
            [$expected , $method , $methodArgs , $controllerArgs , $message]
        );
    }

    /**
     * @param string $method
     * @param string $expected
     * @return string
     */
    protected function badTypeHintMessageForControllerMethod( ...$parameters ):string {
        return " method {$parameters[0]}() from class {$this->namespace} should return instance of {$parameters[1]} !!";
    }

    protected function assertStaticMethodInControllerReturnInstanceOf(
        string $expected ,
        string $method ,
        array $methodArgs = [] ,
        string $message = ''
    ) :void {
        $methodResult = $this->callStaticMethodFromController($method,$methodArgs);
        $this->whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
            $message , $method , $expected
        );
        $this->assertInstanceOf($expected , $methodResult , $message );
    }

    protected function assertNoneStaticMethodInControllerReturnInstanceOf(
        string $expected ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
        string $message = ''
    ):void {
        $methodResult = $this->callNoneStaticMethodFromController($method,$methodArgs,$controllerArgs);
        $this->whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
            $message , $method , $expected
        );
        $this->assertInstanceOf($expected,$methodResult,$message);
    }

    protected function whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
        string &$message ,
        string $method ,
        string $expected
    ):void {
        $this->fillFromCallableWhenStrLengthIsZero(
            $message , [$this,'badTypeHintMessageForControllerMethod'] , [$method,$expected]
        );
    }

    protected function assertStaticMethodInControllerReturnViewInstance(
        string $method , array $methodArgs = [] , string $message = '' ,
    ):void {
        $this->assertStaticMethodInControllerReturnInstanceOf(
            View::class , $method , $methodArgs , $message
        );
    }

    protected function assertNoneStaticMethodInControllerReturnViewInstance(
        string $method , array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = '' ,
    ):void {
        $this->assertNoneStaticMethodInControllerReturnInstanceOf(
            View::class , $method , $methodArgs , $controllerArgs , $message
        );
    }

    protected function assertMethodInControllerReturnViewInstance(
        bool $isStatic ,  string $method ,  array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = ''
    ):void {
        $this->conditionalCallableRunner(
            $isStatic ,
            [$this , 'assertStaticMethodInControllerReturnViewInstance'] ,
            [ $this , 'assertNoneStaticMethodInControllerReturnViewInstance'] ,
            [ $method , $methodArgs , $message ] ,
            [$method , $methodArgs , $controllerArgs , $message]
        );
    }

    protected function assertReturnedViewForStaticMethodInControllerShouldIs(
        string $expected , string $method ,  array $methodArgs = [] , string $message = '' ,
    ):void{
        $methodResult = $this->callStaticMethodFromController($method,$methodArgs);
        $this->doHandleReturnedValueInControllerMethodIsExpectedView(
            $methodResult , $expected , $method ,$message ,
        );
    }

    protected function doCheckReturnedViewInControllerMethodIsExpected(
        string $expected ,
        string $method ,
        View $view ,
        string $message ,
    ):void {
        // @todo may be move to view helper !!!
        $view = $view->name();

        $this->useDefaultBadViewReturnMessageWhenMessageIsEmpty(
            $message , $method , $expected , $view
        );
        $this->assertEquals($expected,$view,$message);
    }

    /**
     * @param string $method
     * @param string $expected
     * @param string $actual
     * @return string
     */
    protected function defaultMessageForBadViewReturnInControllerMethod( ...$parameters ):string {
        return "method {$parameters[0]}() from class : {$this->namespace} returned {$parameters[2]} view !!! but you expected {$parameters[1]} view !!!";
    }

    protected function useDefaultBadViewReturnMessageWhenMessageIsEmpty(
        string &$message , string $method ,  string $expected ,  string $actual
    ):void {
        $this->fillFromCallableWhenStrLengthIsZero(
            $message , [$this,'defaultMessageForBadViewReturnInControllerMethod'] ,
            [$method , $expected , $actual]
        );
    }

    protected function doActionWhenMethodInControllerNoReturnView(
        string $method ,
    ):void{
        $this->fail($this->messageForNoReturnViewInControllerMethod($method));
    }

    /**
     * @param string $method
     * @return string
     */
    protected function messageForNoReturnViewInControllerMethod(...$parameters):string {
        return "method {$parameters[0]}() from class {$this->namespace} doesnt return any view !!!";
    }

    protected function assertReturnedViewForNoneStaticMethodInControllerShouldIs(
        string $expected , string $method, array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = ''
    ):void{
        $methodResult = $this->callNoneStaticMethodFromController($method,$methodArgs,$controllerArgs);
        $this->doHandleReturnedValueInControllerMethodIsExpectedView(
            $methodResult,$expected,$method,$message
        );
    }

    protected function doHandleReturnedValueInControllerMethodIsExpectedView(
        $value , string $expected , string $method , string $message
    ):void {
        /** @todo create method for is _ instance of view -> solid -> create unit test for (method or class(facade)) => god i love you for this idea !!!!
        create view service class  or view helper class -> but before create test for it
         */
        $valueIsView = $value instanceof View;
        $this->conditionalCallableRunner(
            $valueIsView,
            [$this, 'doCheckReturnedViewInControllerMethodIsExpected'],
            [$this, 'doActionWhenMethodInControllerNoReturnView'] ,
            [$expected, $method, $value, $message] , [$method]
        );
    }

    protected function assertReturnedViewForMethodInControllerShouldIs(
        bool $isStatic , string $expected , string $method ,
        array $methodArgs = [] , array $controllerArgs = [] , string $message = ''
    ):void{
        $this->conditionalCallableRunner(
            $isStatic ,
            [$this , 'assertReturnedViewForStaticMethodInControllerShouldIs'] ,
            [$this , 'assertReturnedViewForNoneStaticMethodInControllerShouldIs'] ,
            [ $expected , $method , $methodArgs , $message ] ,
            [$expected , $method , $methodArgs , $controllerArgs , $message ]
        );
    }

    /* @todo temp methods ||||| move to one method !!!! or segregate class or function -> before should use tdd !!!! , -> str service or helper !!!*/

    protected function strLenIs( string $value , int $length ):bool{
        /* @todo can create service or helper class -> function , facade , ..... for zero str length -> god thanks for this idea */
        return strlen($value)==$length;
    }

    protected function strLenIsZero(string $value):bool {
        return $this->strLenIs($value,0);
    }

    protected function fillFromCallableWhenStrLengthIsZero(
        string &$value , callable $fallback , array $fallbackArgs = []
    ):void {
        if ($this->strLenIsZero($value))
            $value = $fallback(...$fallbackArgs);
    }

    protected function conditionalCallableRunner(
        bool $condition , callable $firstCallable , callable $secondCallable ,
        array $firstArgs = [] , array $secondArgs = [] ,
    ){
        if ($condition)
            return $firstCallable(...$firstArgs);
        else
            return $secondCallable(...$secondArgs);
    }
    /* @todo temp methods */

    protected function assertStaticMethodInControllerReturnJsonResourceInstance(
        string $method , array $methodArgs = [] , string $message = ''
    ):void {
        $this->assertStaticMethodInControllerReturnInstanceOf(
            JsonResource::class , $method , $methodArgs , $message
        );
    }

    protected function assertNoneStaticMethodInControllerReturnJsonResourceInstance(
        string $method , array $methodArgs = [] , array $controllerArgs = [] , string $message = ''
    ):void {
        $this->assertNoneStaticMethodInControllerReturnInstanceOf(
            JsonResource::class , $method , $methodArgs , $controllerArgs , $message ,
        );
    }

    protected function assertMethodInControllerReturnJsonResourceInstance(
        bool $isStatic , string $method , array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = '' ,
    ):void {
        $this->conditionalCallableRunner(
            $isStatic ,
            [$this,'assertStaticMethodInControllerReturnJsonResourceInstance'] ,
            [$this,'assertNoneStaticMethodInControllerReturnJsonResourceInstance'] ,
            [ $method , $methodArgs , $message ] , [ $method , $methodArgs , $controllerArgs , $message ]
        );
    }
    //@todo create these methods for single action controller
    protected function reflectionMethod(string $method):\ReflectionMethod {
        /** @todo may be (create method controller test class ) !! controller test just test controller no test method in controller !!! ======= solid check */
        return new \ReflectionMethod($this->namespace,$method);
    }

    protected function reflectionMethodParameters(string $method):array {
        $methodReflection = $this->reflectionMethod($method);
        return $methodReflection->getParameters();
    }

    protected function walkToReflectionMethodParameters(string $method , callable $action):void{
        $methodReflectionParameters = $this->reflectionMethodParameters($method);
        array_walk($methodReflectionParameters , $action);
    }

    protected function reflectionMethodParametersNames(string $method):array {
        $names = [] ;
        $this->walkToReflectionMethodParameters(
            $method,
            function (\ReflectionParameter $parameter) use (&$names) {
                $names[] = $parameter->getName();
            }
        );
        return $names;
    }

    protected function assertDefinedParameterInControllerMethod(string $method , string $parameter):void{
        $parameters = $this->reflectionMethodParametersNames($method);
        $hasParameter = in_array($parameter,$parameters);
        $this->assertTrue(
            $hasParameter,
            $this->messageForMissingParameterInControllerMethod($method,$parameter)
        );
    }

    /**
     * @param $method
     * @param $parameter
     * @return string
     */
    protected function messageForMissingParameterInControllerMethod(...$parameters):string {
        return "method $parameters[0]() from class $this->namespace should have $parameters[1] parameter";
    }

    protected function reflectionMethodTypeHintedParameters(string $method):array {
        $parameters = [] ;
        $this->walkToReflectionMethodParameters(
            $method,
            function (\ReflectionParameter $parameter) use (&$parameters){
                if ($parameter->hasType())
                    $parameters[$parameter->getName()] = $parameter;
            }
        );
        return $parameters;
    }

    protected function walkToReflectionMethodTypeHintedParameters(string $method,callable $action):void{
        $parameters = $this->reflectionMethodTypeHintedParameters($method);
        array_walk($parameters,$action);
    }

    protected function reflectionMethodParametersNamesWithTypeHint(string $method):array {
        $parameters = [] ;

        $this->walkToReflectionMethodTypeHintedParameters(
            $method ,
            function (\ReflectionParameter $parameter) use (&$parameters){
                if ($parameter->getType() instanceof \ReflectionNamedType)
                    $parameters[$parameter->name] = (string)$parameter->getType();
                else
                    $parameters[$parameter->name] = implode('|',$parameter->getType()->getTypes());
            }
        );
        return $parameters;
    }
}
