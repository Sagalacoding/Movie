    <?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'db');
    class Database
    {
        public $mysqli;

        function __construct()
        {
            $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
            }
        }

        function select($table, $where = null)
        {
            $sql = "SELECT * FROM $table";
            // SELECT * FROM movies WHERE id = 1
            //// $rows = ['id' => 1,]
            if ($where != null) {
                foreach ($where as $key => $value) {
                    $sql .= " WHERE $key = '$value'";
                }
            }

            $result = $this->mysqli->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insert($table, $rows)
        {
            // INSERT INTO $table ( title, genre, description, cover)
            // VALUES ('TLOU', 'genre', 'description', 'cover',)
            // $rows = ['title' => 'TLOU', 'gnere' => 'action']
            $row = null;
            $value = null;
            foreach ($rows as $key => $nilai) {
                $row .= ", " . $key;
                $value .= ", '" . $nilai . "'";
            }
            $sql = "INSERT INTO $table (" . substr($row,1) .") VALUES (" . substr($value, 1) . ")";
            $query = $this->mysqli->prepare($sql);
            $query->execute() or die($this->mysqli->error);
        }

        public function delete($table)
        {
            // DELETE FROM $table where id = 1;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM $table where id = $id";
                $query = $this->mysqli->prepare($sql);
                $query->execute() or die($this->mysqli->error);
            }
        }

        public function update($table, $field, $where)
        {
            // UPDATE $table
            // SET  title = 'TLOU', genre = 'action'
            // WHERE id = '1'
            // $field = ['title' => 'TLOU', 'gnere' => 'action']
            $set = null;
            $setWhere = null;
            foreach ($field as $key => $value) {
                $set .= ", " . $key . "= '" . $value . "'";
            }
            foreach ($where as $key => $value) {
                $setWhere .= $key . "= '" . $value . "'";
            }
            $sql = "UPDATE $table SET ". substr($set, 1) . " WHERE $setWhere";
            $query = $this->mysqli->prepare($sql);
            $query->execute() or die($this->mysqli->error);
        }

        function __destruct()
        {
            $this->mysqli->close();
        }
    }
