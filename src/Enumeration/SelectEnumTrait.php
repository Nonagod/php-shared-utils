<?php
namespace Nonagod\Enumeration;

/**
 * Реализует часть методов интерфейса \Nonagod\SelectEnumInterface
 */
trait SelectEnumTrait {
    public function getLabel() :string {
        return $this::getOptions()[$this->value] ?: $this->value;
    }

    /**
     * Возвращает экземпляр перечисления по $code. В случае если strict отключен и по коду не найден подходящий вариант,
     * то возвращает вариант по умол.. Если strict включен и элемент не найден - выброси исключение.
     *
     * @param string $code - символьный код перечисления
     * @param bool $strict - включает строгий режим (по умол. отключен)
     * @return static
     * @throws \Exception
     */
    static public function get( string $code, bool $strict = false ) :static {
        $Case = static::tryFrom( $code );

        if( $strict && !$Case ) throw new \Exception('No_case');

        return $Case ?: static::from( static::getDefault( ));
    }
    /**
     * Возвращает код элемента по умолчанию. Если не переопределять, будет возвращаться код первого указанного
     * в перечислении случая.
     *
     * @return string
     */
    static public function getDefault() :string {
        return static::cases()[0]->value;
    }
}