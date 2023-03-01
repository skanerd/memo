<?php

require_once __DIR__ . '/Database.php';

class Memo
{
    private int $id;
    private string $body;
    private string $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public static function getAll(): array
    {
        $pdo = Database::getPDO();

        $sql = <<<SQL
            SELECT * FROM memos WHERE deleted_at IS NULL
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute();

        $memos = [];

        foreach ($statement as $row) {
            $memo = new self();
            $memo->setId($row['id']);
            $memo->setBody($row['body']);
            $memo->setUpdatedAt($row['updated_at']);
            $memos[] = $memo;
        }

        return $memos;
    }

    public static function get(string|int $id): self
    {
        $pdo = Database::getPDO();

        $sql = <<<SQL
            SELECT * FROM memos WHERE id = :id
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'id' => $id,
        ]);


        $row = $statement->fetch();
        $memo = new self();
        $memo->setId($row['id']);
        $memo->setBody($row['body']);
        $memo->setUpdatedAt($row['updated_at']);

        return $memo;
    }

    public static function create(string $body)
    {
        $pdo = Database::getPDO();

        $sql = <<<SQL
            INSERT INTO memos (body) VALUES (:body)
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'body' => $body,
        ]);
    }

    public static function update(string|int $id, string $body)
    {
        $pdo = Database::getPDO();

        // TODO: 更新機能
        $sql = <<<SQL
            UPDATE memos SET body = :body WHERE id = :id
        SQL;

        $statement = $pdo -> prepare($sql);
        $statement -> execute([
            'body' => $body,
            'id' => $id,
        ]);
    }

    public static function delete(string|int $id)
    {
        $pdo = Database::getPDO();

        // TODO: 削除機能
        $sql = <<<SQL
            DELETE FROM memos WHERE id = :id
        SQL;

        $statement = $pdo -> prepare($sql);
        $statement -> execute([
            'id' => $id,
        ]);
    }

    public static function search(string|int $body)
    {
        $pdo = Database::getPDO();

        // TODO: 検索機能
        $sql = <<<SQL
            SELECT * FROM memos WHERE body LIKE :body
        SQL;

        $statement = $pdo -> prepare($sql);
        $statement -> execute([
            'body' => "%$body%",
        ]);

        $memos = [];

        foreach ($statement as $row) {
            $memo = new self();
            $memo->setId($row['id']);
            $memo->setBody($row['body']);
            $memos[] = $memo;
        }

        return $memos;
    }
}

?>
