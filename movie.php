<?php

require_once 'database.php';
class Movie
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMovies()
    {
        return $this->db->select('movies');
    }

    public function getMovieById($id)
    {
        return $this->db->select('movies', ['id' => $id]);
    }

    public function addMovie($data)
    {
        return $this->db->insert('movies', $data);
    }
    public function deleteMovie()
    {
        return $this->db->delete('movies');
    }
    public function updateMovie($data, $id)
    {
        return $this->db->update('movies', $data, $id);
    }
}