<?php
class Calculator {
    // Function to handle calculations
    public function calc($operator, $num1 = null, $num2 = null) {
        // Validate if operator is valid
        if (!in_array($operator, ['+', '-', '*', '/'])) {
            return "<p>Invalid operator. Use one of the following: +, -, *, /.</p>";
        }
        
        // Check if the two numbers are provided and are numeric
        if (!is_numeric($num1) || !is_numeric($num2)) {
            return "<p>Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.</p>";
        }
        
        // Perform the calculation based on the operator
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    return "<p>The calculation is $num1 / $num2. The answer is cannot divide a number by zero.</p>";
                }
                $result = $num1 / $num2;
                break;
        }
        
        // Return the success message
        return "<p>The calculation is $num1 $operator $num2. The answer is $result.</p>";
    }
}
?>
