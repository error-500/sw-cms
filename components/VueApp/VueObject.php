<?php

namespace app\components\VueApp;

use app\components\VueApp\assets\BootstrapVueAsset;
use Exception;
use ReflectionClass;
use ReflectionProperty;
use RuntimeException;
use Throwable;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\ErrorHandler;

class VueObject extends Component
{
    public $var         = 'app';
    public $el          = '#vue-app';
    protected $data     = [];
    protected $methods  = [];
    protected $computed = [];
    protected $props    = [];
    protected $watch    = [];
    protected $created  = [];
    protected $mounted  = [];
    protected $extends  = null;
    protected $mixins   = [];

    private $noAssociative = [
        'mounted',
        'created',
    ];
    public function init()
    {
        $this->data['csrfToken'] = '"'.Yii::$app->request->csrfToken.'"';
    }
    public static function ArrayToJsString($array)
    {
        $jsLines = [];
        foreach ($array as $jsKey => $value) {
            if (is_array($value)) {
                if (ArrayHelper::isAssociative($value)) {
                    $value = "{\n\t" . self::ArrayToJsString($value) . "\n}";
                } else {
                    $value = "[\n\t" . self::ArrayToJsString($value) . "\n]";
                }
            }

            if (\is_object($value)) {
                $value = "{\n\t" . self::ArrayToJsString($value) . "\n}";
            }

            if (\is_null($value)) {
                $value = 'null';
            }

            if (is_string($value) && empty($value)) {
                $value = "''";
            }

            if (ArrayHelper::isAssociative($array)) {
                $jsLines[] = $jsKey . ":" . $value;
            } else {
                $jsLines[] = $value;
            }
        } //end foreach

        return implode(",\n", $jsLines);
    } //end ArrayToJsString()


    public function __toString()
    {
        try {
            $output    = [];
            $reflector = new ReflectionClass(__CLASS__);
            $options   = $reflector->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

            $begin = $this->var . " = new Vue({\n";
            $end   = "\n});";

            $options = \array_filter(
                $options,
                function ($prop) {
                    if (is_array($this->{$prop->getName()}) && !\sizeof($this->{$prop->getName()})) {
                        return false;
                    }

                    if (null === $this->{$prop->getName()}) {
                        return false;
                    }

                    return true;
                }
            );
            foreach ($options as $prop) {
                switch ($prop->getName()) {
                    case "var":
                        break;
                    case "el":
                        $output[$prop->getName()] = "{$prop->getName()}: '{$this->{$prop->getName()}}'";
                        break;
                    case "extends":
                        $output[$prop->getName()] = $prop->getName() . ": {$this->{$prop->getName()}}";
                        break;
                    case "computed":
                    case "methods":
                    case "watch":
                        if (
                            !is_array($this->{$prop->getName()})
                            || !ArrayHelper::isAssociative($this->{$prop->getName()})
                        ) {
                            break;
                        }

                        $output[$prop->getName()] = $prop->getName() . ":{\n\t" . self::ArrayToJsString($this->{$prop->getName()}) . "\n}";
                        break;
                    case "created":
                    case "updated":
                    case "mounted":
                        $output[$prop->getName()] = $prop->getName() . "(){ \n\t" . implode("\n\t", $this->{$prop->getName()}) . "\n}";
                        break;
                    default:
                        $output[$prop->getName()] = $prop->getName() . "(){ \n return {" . self::ArrayToJsString($this->{$prop->getName()}) . "};\n }";
                } //end switch
            } //end foreach

            Yii::trace("Vue export to string object:" . \var_export($output, true));
            $result = $begin . implode(",\n", $output) . $end;
            return $result;
        } //end try
        catch (Exception $e) {
            ErrorHandler::convertExceptionToError($e);
            return '';
        } catch (Throwable $e) {
            ErrorHandler::convertExceptionToError($e);
            return '';
        } //end try

    } //end __toString()


    // end try
    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->$name;
        }

        return false;
    } //end __get()


    public function __set($name, $value)
    {
        /*Yii::info(
            Yii::t(
                'app',
                "Try set VueApp->{0} with:\n {1}\n on current: {2}",
                [
                    $name,
                    \var_export($value, true),
                    var_export($this, true)
                ]
            )
        );*/
        $options  = get_object_vars($this);
        $keysList = array_keys($options);
        if (!in_array($name, $keysList)) {
            throw new RuntimeException(
                Yii::t('app', 'Try set undefined Vue property {0}', [$name])
            );
        }

        if (is_array($options[$name])) {
            if (
                !is_array($value)
                || (!\in_array($name, $this->noAssociative)
                    && !ArrayHelper::isAssociative($value))
            ) {
                throw new RuntimeException(
                    Yii::t('app', 'Value for "{0}" must bee associative array - input was: {1}', [$name, \var_export($value, true)])
                );
            }

            $currentValue  = $this->{$name};
            $this->{$name} = ArrayHelper::merge($currentValue, $value);
        }

        if (is_string($this->$name) || \array_key_exists($name, ['created', 'updeted', 'mounted'])) {
            if (!is_string($value)) {
                throw new RuntimeException(
                    Yii::t('app', 'Value "{0}" must be string', [$name])
                );
            }

            $this->$name .= $value;
        }
    } //end __set()


    public function setData(array $value, $replace = false)
    {
        if ($replace) {
            $this->data = $value;
            return $this;
        }

        $this->data = ArrayHelper::merge($this->data, $value);
        return $this;
    } //end setData()


    public function setMethods(array $value)
    {
        $this->methods = ArrayHelper::merge($this->methods, $value);
        return $this;
    } //end setMethods()


    public function setComputed(array $value)
    {
        $this->computed = ArrayHelper::merge($this->computed, $value);
        return $this;
    } //end setComputed()


    public function setProps($value)
    {
        if (\is_string($value)) {
            \array_push($this->props, $value);
            return $this;
        }

        if (\is_array($value)) {
            $this->props = ArrayHelper::merge($this->props, $value);
            return $this;
        }

        throw new RuntimeException(Yii::t('app', 'Vue props must be Array or String'));
    } //end setProps()


}//end class