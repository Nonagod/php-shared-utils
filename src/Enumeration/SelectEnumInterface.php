<?php
namespace Nonagod\Enumeration;

/**
 * Определяет набор методов для перечисления, необходимых для работы через select.
 */
interface SelectEnumInterface {
    /**
     * Возвращает название текущего перечисления.
     *
     * @return string
     */
    public function getLabel() :string;

    /**
     * Возвращает экземпляр перечисления по $code. В случае если strict отключен и по коду не найден подходящий вариант,
     * то возвращает вариант по умол.
     *
     * @param string $code - символьный код перечисления
     * @param bool $strict - включает строгий режим (по умол. отключен)
     * @return static
     */
    static public function get( string $code, bool $strict = false ) :static;

    /**
     * Возвращает код элемента по умолчанию.
     *
     * @return string
     */
    static public function getDefault() :string;
    /**
     * @return array - массив доступных случаев в формате code => label
     */
    static public function getOptions() :array;
}