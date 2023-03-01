<?php

require_once __DIR__ . '/Database.php';

class User
{
    private int $id;
    private string $email;
    private string $password;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function register()
    {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $pdo = Database::getPDO();

        $sql = <<<SQL
            INSERT INTO users (email, password, name)
            VALUES (:email, :password, :name)
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'email' => $this -> email,
            'password' => $hashedPassword,
            'name' => $this -> name,
        ]);

        $this->id = $pdo->lastInsertId();
    }

    public function login(): array
    {
        $pdo = Database::getPDO();

        $sql = <<<SQL
            SELECT * FROM users
            WHERE email = :email AND password = :password
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($statement->rowCount() === 0) {
            return [
                'isSucceeded' => false,
            ];
        }

        // if (password_vertify($password, $hashedPassword)) {
        //     return [
        //         'isSucceeded' => true,
        //     ];
        // } else {
        //     return [
        //         'isSucceeded' => false,
        //     ];
        // }

        $row = $statement->fetch();
        $this->id = $row['id'];

        return [
            'isSucceeded' => true,
        ];
    }

    public static function getById(string|int $id): ?self
    {
        $pdo = Database::getPDO();

        $sql = <<<SQL
            SELECT * FROM users
            WHERE id = :id
        SQL;

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'id' => $id,
        ]);

        if ($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch();
        $user = new self();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->name = $row['name'];

        return $user;
    }
}
