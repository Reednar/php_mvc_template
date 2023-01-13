<?php

class Joueur {

    private ?int $id;
    private string $pseudo;
    private string $mail;
    private string $password;

    public function getId(): int {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function getMail(): string {
        return $this->mail;
    }

    public function setMail(string $mail): void {
        $this->mail = $mail;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function __construct(string $pseudo, string $mail, string $password) {
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->password = $password;
    }

    public static function getAllJoueur(): array {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("SELECT * FROM joueur");
        $req->execute();
        $lesJoueurs = $req->fetchAll(PDO::FETCH_CLASS, 'Joueur');
        return $lesJoueurs;
    }

    public static function getJoueurById(int $id): Joueur {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("SELECT * FROM joueur WHERE id = :id");
        $req->bindParam(':id', $id);
        $leJoueur = $req->fetchObject('Joueur');
        return $leJoueur;
    }

    public static function getEmailExistDeja(string $mail): bool {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("SELECT * FROM joueur WHERE mail = :mail");
        $req->bindParam(':mail', $mail);
        $leJoueur = $req->fetchObject('Joueur');
        if($leJoueur == null) {
            return false;
        } else {
            return true;
        }
    }

    public static function getPseudoExistDeja(string $pseudo): bool {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("SELECT * FROM joueur WHERE pseudo = :pseudo");
        $req->bindParam(':pseudo', $pseudo);
        $leJoueur = $req->fetchObject('Joueur');
        if($leJoueur == null) {
            return false;
        } else {
            return true;
        }
    }

    public static function connexion(string $mail, string $password): bool {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("SELECT password FROM joueur WHERE mail = :mail");
        $req->bindParam(':mail', $mail);
        $req->execute();
        $leJoueur = $req->fetch();
        var_dump(password_verify($password, $leJoueur["password"]));
        if($leJoueur == null) {
            return false;
        } else {
            if (password_verify($password, $leJoueur["password"])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function add(Joueur $joueur): void {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("INSERT INTO joueur (pseudo, mail, password) VALUES (:pseudo, :mail, :password)");
        $pseudo = $joueur->getPseudo();
        $mail = $joueur->getMail();
        $password = $joueur->getPassword();
        $req->bindParam(':pseudo', $pseudo);
        $req->bindParam(':mail', $mail);
        $req->bindParam(':password', $password);
        if(!$req->execute()) {
            die("Error: " . $req->errorInfo()[2]);
        }
    }

    public static function update(Joueur $joueur): void {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("UPDATE joueur SET pseudo = :pseudo, mail = :mail, password = :password WHERE id = :id");
        $pseudo = $joueur->getPseudo();
        $mail = $joueur->getMail();
        $password = $joueur->getPassword();
        $req->bindParam(':pseudo', $pseudo);
        $req->bindParam(':mail', $mail);
        $req->bindParam(':password', $password);
        if(!$req->execute()) {
            die("Error: " . $req->errorInfo()[2]);
        }
    }

    public static function delete(Joueur $joueur): void {
        $pdo = monPDO::getInstance();
        $req = $pdo->prepare("DELETE FROM joueur WHERE id = :id");
        $id = $joueur->getId();
        $req->bindParam(':id', $id);
        
    }

}