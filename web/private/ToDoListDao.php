<?php
require_once("db.php");

class toDoListDao
{
    private $db;
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->db = new db();
    }
    /**
     * 全件取得
     */
    public function findAll($sql)
    {
        $sql = "SELECT * FROM TodoList";
        return $this->db->select($sql);
    }

    /**
     * idで選択し、sql文実行
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM TodoList WHERE id = :id";
        $params = array(':id' => $id);
        return $this->db->select($sql, $params);
    }

    /**
     * insert文実行
     */
    public function insert($title, $content, $created)
    {
        // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく            
        $sql = "INSERT INTO TodoList (title, content, created) VALUES (:title, :content, :created)";
        $params = array(':title' => $title, ':content' => $content, ':created' => $created);
        $this->db->insert($sql, $params);
    }
    /**
     * delete文
     */
    public function delete($id)
    {
        $sql = "DELETE FROM TodoList WHERE id = :id";
        $params = array(":id" => $id);
        $this->db->delete($sql, $params);
    }

    /**
     * update文
     */
    public function update($id, $title, $content, $updateDate)
    {
        //
        $sql = "UPDATE TodoList SET title = :title, content = :content, updated = :updateDate WHERE id = :id";
        $params = array(":title" => $title, ":content" => $content, ":updateDate" => $updateDate, ":id" => $id);
        $this->db->update($sql, $params);
    }
}
