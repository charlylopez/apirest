<?php 
/**
 * 
 */
class DbHandler
{
	
	private function connect()
	{
		$dbc = new DbConnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		return $dbc->getConnection();
	}	

	public function delete($sql)
	{
		/* delete */
	}

	public function insert($sql)
	{
		$conn = $this->connect();

		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
		} else {
			die("Error: " . $sql . "<br>" . $conn->error);
		}

		$conn->close();

		return $last_id;
	}

	public function select($sql)
	{
		$conn = $this->connect();
		$result = $conn->query($sql);
		$data = array();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}

		$conn->close();

		return $data;
	}
}