<?php
session_start();

class AddNamesProc {
    private $names = [];

    public function addClearNames() {
        // Load existing names from session if available
        if (isset($_SESSION['names'])) {
            $this->names = $_SESSION['names'];
        }

        // Handle "Add Name" button click
        if (isset($_POST['add'])) {
            $name = trim($_POST['name']);
            if (!empty($name) && strpos($name, ' ') !== false) {
                list($first, $last) = explode(' ', $name, 2);
                $formattedName = $last . ', ' . $first;
                // Add formatted name to the list
                $this->names[] = $formattedName;
                // Sort the names alphabetically by last name
                sort($this->names);
                // Store the updated names list in session
                $_SESSION['names'] = $this->names;
            }
        }

        // Handle "Clear Names" button click
        if (isset($_POST['clear'])) {
            $this->names = [];  // Clear the local array
            unset($_SESSION['names']);  // Clear the session variable
        }

        // Return the list of names formatted for the textarea
        return implode("\n", $this->names);
    }
}
?>
