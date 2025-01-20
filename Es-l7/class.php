<?php
class Form{
    public static function MakeInput(string $name, $value): string
    {
        $type = gettype($value);
        $label = sprintf('<label for="%1$s">%1$s</label>', $name);
        switch ($type) {
            case 'boolean':
                $input_type = 'checkbox';
                break;
            case 'integer':
            case 'double':
                $input_type = 'number';
                break;
            case 'string':
                $input_type = 'text';
                break;
            default:
                throw new InvalidArgumentException($value);
        }
        $input = sprintf('<input name="%1$s" id="%1$s" type="%2$s" value="%3$s" />',
            $name, $input_type, $value);

        return $label . $input;
    }

    public static function MakeForm(string $class_name): string
    {
        $html = '<form method="POST">';
        foreach (self::MakeInputs($class_name) as $input)
            $html .= $input;
        $html .= '<input type="submit" value="submit"/>';
        $html .= '</form>';

        return $html;
    }

}

echo Form::MakeInput("Nome", "");
echo "<br>";
echo Form::MakeInput("Cognome", "");
echo "<br>";
echo Form::MakeInput("Email", "");
echo "<br>";
echo Form::MakeInput("Agree", true);
echo "<br>";
echo Form::MakeInput("Message", "");