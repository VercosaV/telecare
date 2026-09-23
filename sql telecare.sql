CREATE TABLE especialidades (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 1. Unidades de Atendimento
CREATE TABLE unidades_atendimento (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    possui_teleatendimento BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 2. Profissionais
CREATE TABLE profissionais (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    crm VARCHAR(50) UNIQUE,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    tipo_profissional VARCHAR(255) NOT NULL,
    especialidade_id BIGINT UNSIGNED,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (especialidade_id) REFERENCES especialidades(id) ON DELETE CASCADE
);

-- 3. Tabela Pivô (N:M): Profissionais <-> Unidades de Atendimento
CREATE TABLE profissional_unidade (
    profissional_id BIGINT UNSIGNED NOT NULL,
    unidade_atendimento_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (profissional_id, unidade_atendimento_id),
    FOREIGN KEY (profissional_id) REFERENCES profissionais(id) ON DELETE CASCADE,
    FOREIGN KEY (unidade_atendimento_id) REFERENCES unidades_atendimento(id) ON DELETE CASCADE
);

-- 4. Secretarias
CREATE TABLE secretarias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    matricula VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 5. Pacientes
CREATE TABLE pacientes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(25) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(255) UNIQUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 6. Prontuários (1:1 com Paciente)
CREATE TABLE prontuarios (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    paciente_id BIGINT UNSIGNED NOT NULL, 
    data_registro DATETIME NOT NULL,
    diagnostico TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE
);

-- 7. Consultas (Centro das transações)
CREATE TABLE consultas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    paciente_id BIGINT UNSIGNED NOT NULL,
    profissional_id BIGINT UNSIGNED NOT NULL,
    secretaria_id BIGINT UNSIGNED NOT NULL,
    unidade_atendimento_id BIGINT UNSIGNED NOT NULL, -- Adicionado para identificar onde ocorre a consulta
    data_agendada DATE NOT NULL,
    hora_agendada TIME NOT NULL,
    codigo_agendamento VARCHAR(100) NOT NULL UNIQUE,
    situacao ENUM('AGENDADA', 'REALIZADA', 'CANCELADA', 'REMARCADA') DEFAULT 'AGENDADA',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (profissional_id) REFERENCES profissionais(id),
    FOREIGN KEY (secretaria_id) REFERENCES secretarias(id),
    FOREIGN KEY (unidade_atendimento_id) REFERENCES unidades_atendimento(id)
);

-- 8. Pagamentos (1:1 com Consulta)
CREATE TABLE pagamentos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    consulta_id BIGINT UNSIGNED NOT NULL UNIQUE, 
    data_pagamento DATETIME NULL,
    valor DECIMAL(10,2) NOT NULL,
    metodo ENUM('PIX', 'CARTAO_CREDITO', 'CARTAO_DEBITO', 'DINHEIRO', 'CONVENIO') NOT NULL,
    situacao ENUM('PENDENTE', 'PAGO', 'CANCELADO', 'ESTORNADO') DEFAULT 'PENDENTE',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (consulta_id) REFERENCES consultas(id) ON DELETE CASCADE
);

