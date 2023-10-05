<?php
namespace ExemploCrudPoo;

use Exception;
use PDO;
final class Produto {
    private int $id;
    private string $nome;
    private string $descricao;
    private float $preco;
    private int $quantidade;
    private int $fabricanteId;
    private PDO $conexao;

    public function __construct() {
        $this->conexao = Banco::conecta();
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }
    public function setFabricanteId(int $fabricanteId): self
    {
        $this->fabricanteId = $fabricanteId;

        return $this;
    }
}