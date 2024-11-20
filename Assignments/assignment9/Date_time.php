<?php
class Date_time {
    private $pdo;

    public function __construct() {
        $host = 'localhost';
        $db = 'mdthabata';
        $user = 'mdthabata';
        $pass = 'ajXXrZZ8ybJH';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addNote() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dateTime = $_POST['dateTime'] ?? null;
            $note = $_POST['note'] ?? null;

            if (!$dateTime || !$note) {
                return "Please enter both date/time and a note.";
            }

            try {
                $stmt = $this->pdo->prepare("INSERT INTO notes (date_time, note) VALUES (:date_time, :note)");
                $stmt->execute([
                    ':date_time' => $dateTime,
                    ':note' => $note
                ]);
                return "Note added successfully!";
            } catch (Exception $e) {
                return "Error adding note: " . $e->getMessage();
            }
        }
    }

    public function getNotes() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $begDate = $_POST['begDate'] ?? null;
            $endDate = $_POST['endDate'] ?? null;

            if (!$begDate || !$endDate) {
                return "Please select both beginning and ending dates.";
            }

            try {
                $stmt = $this->pdo->prepare(
                    "SELECT date_time, note FROM notes WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC"
                );
                $stmt->execute([
                    ':begDate' => $begDate,
                    ':endDate' => $endDate
                ]);
                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!$notes) {
                    return "No notes found for the selected date range.";
                }

                return $notes;
            } catch (Exception $e) {
                return "Error fetching notes: " . $e->getMessage();
            }
        }
    }
}
?>
