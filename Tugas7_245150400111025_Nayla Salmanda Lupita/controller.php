<?php
require_once 'model.php';

class BookController {
    private $book;

    public function __construct($db) {
        $this->book = new Book($db);
    }

    public function index() {
        $books = $this->book->getAll();
        include 'view.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->book->title = $_POST['title'];
            $this->book->author = $_POST['author'];
            $this->book->year = $_POST['year'];
            if ($this->book->create()) {
                header('Location: index.php');
            }
        }
        include 'view_create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->book->id = $id;
            $this->book->title = $_POST['title'];
            $this->book->author = $_POST['author'];
            $this->book->year = $_POST['year'];
            if ($this->book->update()) {
                header('Location: index.php');
            }
        } else {
            $book = $this->book->getById($id);
            include 'view_edit.php';
        }
    }

    public function delete($id) {
        $this->book->id = $id;
        if ($this->book->delete()) {
            header('Location: index.php');
        }
    }
}
