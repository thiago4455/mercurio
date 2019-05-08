CREATE DATABASE dbaprendizagem CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE dbaprendizagem;

CREATE TABLE Func (
    idFunc SMALLINT PRIMARY KEY,
    nomeFunc VARCHAR(60) NOT NULL,
    emailFunc VARCHAR(60) NOT NULL,
    senhaFunc VARCHAR(20) NOT NULL,
    cpfFunc VARCHAR(14) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Alunos(
    Ra VARCHAR(10),
    Nome VARCHAR(100),
    DataNasc VARCHAR(10),
    Idade INT,
    Sexo CHAR(1),
    GrauInstrucao VARCHAR(30),
    Rua VARCHAR(50),
    Numero INT ,
    Complemento VARCHAR(50),
    Bairro VARCHAR(30),
    Estado CHAR(2),
    Cidade VARCHAR(30),
    Cep VARCHAR(8),
    Telefone1 VARCHAR(15),
    Telefone2 VARCHAR(15),
    Identidade VARCHAR(30),
    Cpf VARCHAR(11),
    Email VARCHAR(50),
    CarteiraTrabalho VARCHAR(20),
    NomePai VARCHAR(100),
    TelefonePai VARCHAR(100),
    NomeMae VARCHAR(100),
    TelefoneMae VARCHAR(100),
    NomeCurso VARCHAR(50),
    CodTurma VARCHAR(20),
    Status VARCHAR(30),
    PRIMARY KEY(Ra)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Empresas(
    codEmpresa VARCHAR(6) PRIMARY KEY,
    cnpj CHAR(18) NOT NULL,
    nomeFantasia VARCHAR(100) NOT NULL,
    razaoSocial VARCHAR(100) NOT NULL,
    endereco VARCHAR(150) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    responsavel VARCHAR(100) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Empregado(
    Alunos_ra VARCHAR(10) NOT NULL,
    FOREIGN KEY Alunos_ra(Alunos_ra)
    REFERENCES Alunos(Ra),
    Empresas_codEmpresa VARCHAR(6) NOT NULL,
    FOREIGN KEY Empresas_codEmpresa(Empresas_codEmpresa)
    REFERENCES Empresas(codEmpresa)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `Func` (`idFunc`, `nomeFunc`, `emailFunc`, `senhaFunc`, `cpfFunc`) VALUES ('00000001', 'Admin', 'admin@admin.com', 'admin', '000.000.000-00');

INSERT INTO `Alunos` (`Ra`, `Nome`, `DataNasc`, `Idade`, `Sexo`, `GrauInstrucao`, `Rua`, `Numero`, `Complemento`, `Bairro`, `Estado`, `Cidade`, `Cep`, `Telefone1`, `Telefone2`, `Identidade`, `Cpf`, `Email`, `CarteiraTrabalho`, `NomePai`, `TelefonePai`, `NomeMae`, `TelefoneMae`, `NomeCurso`, `CodTurma`, `Status`) VALUES
('0000006587', 'SHAYENE DE FREITAS BENEDITO', '2/20/01', 18, 'F', 'Ensino médio incompleto', 'Vicente Lopes da Rocha', 176, '', 'Jardim Bandeirantes', 'MG', 'Contagem', '32371360', '975478581', '973493537', 'MG-20.962.921', '08744473648', 'shayene_thug@hotmail.com', '6639934', 'MOISÉS CLAUDIONOR BENEDITO', '3130441526', 'MARIA JUNIA CARNEIRO DE FREITAS BENEDITO', '973493537', 'PROCESSOS ADMINISTRATIVOS', 'AIPA201T-01', 'MATRICULADO'),
('0000010122', 'ALICE RODRIGUES SILVA', '3/13/03', 16, 'F', 'Ensino médio incompleto', 'Esportiva', 15, 'CX-3', 'São Gabriel', 'MG', 'Belo Horizonte', '31980284', '30473560', 'MATRICULADO', 'MG-16.766.089', '12865411664', 'alicerodrigues1521@gmail.com', '5832793', 'WANDERSON RODRIGUES DOS SANTOS', '9607-4042', 'SANDRA SOARES SILVA SANTOS', '3134470519', 'sandrasoares603@hotmail.com', 'APRENDIZAGEM INDUSTR', 'MATRICULA'),
('0000010808', 'IGOR MEIRELES ALVES', '5/7/02', 17, 'M', 'Ensino médio incompleto', 'Rua Argental Drumond', 136, 'CX 2', 'Santa Cecília ', 'MG', 'Belo Horizonte', '30668340', '3133874592', '987963316', 'MG-20.301.175', '70315197641', ' meirelesigor13@gmail.com', '3388774', 'WELLINGTON DE ALMEIDA ALVES', '3185548598', 'REGIANE APARECIDA MEIRELES ALVES', '3133874592', 'PROCESSOS ADMINISTRATIVOS', 'AIPA200T-01', 'MATRICULADO'),
('0000011672', 'SAMUEL HENRIQUE FERREIRA LIMA', '9/13/02', 17, 'M', 'Ensino médio incompleto', 'RUA AUGUSTO SPIAZZI', 850, 'APT 201 BL 6', 'VARZEA', 'MG', 'Ibirité', '32405035', '973496361', '994670657', 'MG-20.708.349', '14275169603', 'samferreiralima@hotmail.com', '1117810', 'EDVALDO LIMA SANTOS JÚNIOR', '31994670657', 'VIVIANE FERREIRA LIMA', '31985853583', 'PROCESSOS ADMINISTRATIVOS', 'AIPA198T-01', 'MATRICULADO'),
('0000013351', 'ISADORA VIEIRA SACRAMENTO', '6/30/98', 21, 'F', 'Ensino médio completo', 'Rua Voluntários da Pátria', 107, 'CASA B', 'Ipiranga', 'MG', 'Belo Horizonte', '31140630', '36588221', '985304470', 'MG-18.362.067', '13075938602', 'isadoravieira_s@hotmail.com', '6625466', 'GIOVANI JOSE MENDES DO SACRAMENTO', '31 2552-8221', 'VALERIA CRISTINA VIEIRA', '31985046155', 'PROCESSOS ADMINISTRATIVOS', 'AIPA193T-02', 'MATRICULADO'),
('0000016364', 'ANA LUIZA SILVA', '6/15/00', 19, 'F', 'Ensino médio incompleto', 'Rua Raul Soares', 96, 'CX 2', 'Industrial', 'MG', 'Contagem', '32230380', '992721932', '971791677', 'MG-16.500.071', '14620592609', 'NAO INFORMADO', '8311619', 'MAURO ANTONIO DA SILVA', '', 'EDVANIA FRANCISCA CAMPOS SILVA', '', 'PROCESSOS ADMINISTRATIVOS', 'AIPA199T-01', 'MATRICULADO'),
('0000069701', 'GUILHERME SANTOS CORREA', '2/22/02', 17, 'M', 'Ensino médio incompleto', 'Godofredo Rangel', 601, 'AP 202', 'Madre Gertrudes', 'MG', 'Belo Horizonte', '30518270', '30117518', '995596828', 'MG-15.644.366', '15067217618', 'guilhermescbr@gmail.com', '4332497', 'RONALDO CORREA DOMINGOS', '3130117518', 'MARIA DE LOUDES DOS SANTOS DOMINGOS', '', 'PROCESSOS LOGÍSTICOS', 'AIPL13T-01', 'MATRICULADO'),
('0000119685', 'MARCO TULIO FERNANDES MARTINS', '4/23/96', 23, 'M', 'Ensino médio completo', 'das Mangueiras', 166, 'AP 201', 'Eldorado', 'MG', 'Contagem', '32310560', '3135714642', '31987734887', 'MG-18.941.314', '13398372694', 'tuliofm96@gmail.com', '0603738', 'OSCAR RODRIGUES MARTINS JUNIOR', '', 'ELIDA IMACULADA CONCEIÇÃO FERNANDES MARTINS', '38237559', 'PROCESSOS ADMINISTRATIVOS', 'AIPA199T-01', 'MATRICULADO'),
('0000124714', 'PATRICIA NASCIMENTO SOUZA', '3/4/96', 23, 'F', 'Ensino médio completo', 'MORUNGABA', 567, '', 'MARILANDIA', 'MG', 'Ibirité', '32400000', '993469629', '', 'MG-16.496.833', '12895737606', 'patriciapns340@gmail.com', '4285581', 'EDGAR RODRIGUES DE SOUZA', '', 'SHEILA CRISTINE NASCIMENTO SOUZA', '', 'PROCESSOS LOGÍSTICOS', 'AIPL11T-02', 'MATRICULADO'),
('0000132823', 'ANGELICA AUXILIADORA DE SOUZA PAGIO', '8/25/96', 23, 'F', 'Ensino médio completo', 'Rua Paulino Caetano Mendes', 81, 'CX 1', 'Céu Azul', 'MG', 'Belo Horizonte', '31580490', '3134962558', '31993726645', 'MG-17.741.196', '12293188604', 'gegeauxiliadora@gmail.com', '1129530', 'JOAO CARLOS SILVA PAGIO', '', 'MARLIVIA AUXILIADORA DE SOUZA PAGIO', '', 'PROCESSOS ADMINISTRATIVOS', 'AIPA200T-01', 'MATRICULADO'),
('0000156304', 'LUCAS DE OLIVEIRA MARTINS', '2/18/02', 17, 'M', 'Ensino médio incompleto', 'Camassari', 335, 'CASA', 'Milionários (Barreiro)', 'MG', 'Belo Horizonte', '30620570', '3133816413', '31984497656', 'MG-19.041.492', '13044895669', 'lucasruffles192@gmail.com', '0708234', 'JOSE GERALDO MARTINS', '96781216', 'GERALDA DE OLIVEIRA MARTINS', '84497656', 'PROCESSOS ADMINISTRATIVOS', 'AIPA190M-02', 'MATRICULADO'),
('0000158051', 'ISABELA INGRID ROSA TELES', '1/3/03', 16, 'F', 'Ensino médio incompleto', 'Olímpio de Castro', 11, 'AP 102', 'BARREIRO', 'MG', 'Belo Horizonte', '30640200', '996159572', '986429689', 'MG-22.535.290', '14562779608', 'margarete.mrosa68@gmail.com', '1140763', 'ADILSON IZAIAS TELES', '', 'MARGARETE MARIA ROSA', '986429689', 'PROCESSOS ADMINISTRATIVOS', 'AIPA201T-01', 'MATRICULADO'),
('0000174465', 'IASMIM CRISTINE BARBOSA ARAUJO', '6/14/02', 17, 'F', 'Ensino médio incompleto', 'Rua Vicência', 66, 'CX 2', 'São Gabriel', 'MG', 'Belo Horizonte', '31985130', '3134470001', '31995108571', 'MG-19.842.429', '02162007681', 'cristiniasmim@gmail.com', '4935105', 'WILTON CESAR BARBOSA', '', 'RIVANE MOREIRA DE ARAUJO', '3134470001', 'PROCESSOS ADMINISTRATIVOS', 'AIPA198T-01', 'MATRICULADO'),
('0000176957', 'UYLLAR BRIAN PEREIRA MARTINS', '8/15/00', 19, 'M', 'Ensino médio incompleto', 'Rua das Quaresmeiras', 25, '-', 'Marajó', 'MG', 'Belo Horizonte', '30570430', '992002352', '996415944', 'MG-17.393.526', '11659704650', 'uyllar@hotmail.com', '8284447', 'VALDECI SILVERIO MARTINS', '996530159', 'CINTIA PEREIRA ANDRADE MARTINS', '996415944', 'PROCESSOS ADMINISTRATIVOS', 'AIPA196M-01', 'MATRICULADO'),
('0000197226', 'EWERTON ALAN FERREIRA PRADO', '11/19/01', 18, 'M', 'Ensino médio incompleto', 'Flor-de-pitangueira', 141, 'CX 01', 'Mineirão', 'MG', 'Belo Horizonte', '30672250', '31432344', '998919275', 'MG-18.093.135', '15486075685', 'ewertonalan54@gmail.com', '3354241', 'ARTENCINO GOMES DO PRADO', '3199671839', 'VILMA FERREIRA PRADO', '31432344', 'PROCESSOS ADMINISTRATIVOS', 'AIPA194T-02', 'MATRICULADO'),
('0000212394', 'LEILIANE PEREIRA DOS SANTOS', '8/29/84', 35, 'F', 'Ensino médio completo', 'Rua amarilis', 52, 'casa', 'SANTA CLARA', 'MG', 'Vespasiano', '33200000', '36223937', '993739278', 'MG-12.694.467', '06393302666', 'leilasantoslps@gmail.com', '1605', 'JOSE PEREIRA DOS SANTOS', '36223937', 'HOROZINA PEREIRA DOS SANTOS', '3136223937', 'PROCESSOS LOGÍSTICOS', 'AIPL11T-02', 'MATRICULADO'),
('0000226287', 'KETHELLEN GIOVANA FAGUNDES SANTANA', '6/12/01', 18, 'F', 'Ensino médio incompleto', 'Rua Tatuapé', 9, 'CX 02', 'Aguia Dourada', 'MG', 'Ibirité', '32405468', '33899036', '992371228', 'MG-19.086.821', '12798178606', 'zvkt.family@outlook.com', '2680064', 'ZENILDO SANTANA DA SILVA', '31 - 3389.9036', 'VELZA FAGUNDES SANTANA', '33899036', 'PROCESSOS ADMINISTRATIVOS', 'AIPA203M-01', 'MATRICULADO'),
('0000235389', 'JULIANA APARECIDA RUELA', '11/10/95', 24, 'F', 'Ensino médio completo', 'Desembargador Barcelos', 1244, 'AP 103', 'Nova Suíssa', 'MG', 'Belo Horizonte', '30421124', '3133722299', '31998827668', 'MG-17.603.751', '13889523609', 'julianaruela98@gmail.com', '6224125', 'RENATO LUCIO DE MATOS RUELA', '', 'VALERIA CRISTINA RAMOS RUELLA', '3133722299', 'PROCESSOS ADMINISTRATIVOS', 'AIPA190M-02', 'MATRICULADO'),
('0000237964', 'DANIEL AUGUSTO SANTOS SILVA', '3/26/96', 23, 'M', 'Ensino médio completo', 'Beatriz', 176, 'CA A', 'Rio Branco', 'MG', 'Belo Horizonte', '31535400', '3173302197', '', 'MG-18.957.750', '13009988656', 'daniel_silva@live.com', '1645770', 'ROBERTO CARLOS DA SILVA', '(31) 8842-7577', 'ZILDENI BATISTA DOS SANTOS', '', 'PROCESSOS ADMINISTRATIVOS', 'AIPA196M-01', 'MATRICULADO'),
('0000244160', 'DANIEL FELIPE GONCALVES SILVA', '3/17/97', 22, 'M', 'Ensino médio completo', 'das Tangerinas', 36, 'AP 301', 'Vila Cloris', 'MG', 'Belo Horizonte', '31744108', '31993105821', '', 'MG-19.102.701', '13599405611', 'dannfelipee@gmail.com', '1648853', 'TABAJARA GONCALVES DA SILVA', '', 'ROSILDA DE SOUZA', '3134523825', 'PROCESSOS LOGÍSTICOS', 'AIPL12T-02', 'MATRICULADO'),
('0000258161', 'TAIS CRISTINA DOS SANTOS LOPES', '5/18/97', 22, 'F', 'Ensino médio completo', 'Rua Engenheiro Schnoor', 4, 'Casa 34', 'Céu Azul', 'MG', 'Belo Horizonte', '31540260', '996350831', '992614339', 'MG-17.881.810', '11369643632', 'tais.mlsk@gmail.com', '1084818', 'PESSOA DESCONHECIDA', '', 'EVA MARCIA DAS GRAÇAS LOPES', '31 ', 'PROCESSOS LOGÍSTICOS', 'AIPL13T-01', 'MATRICULADO'),
('0000295744', 'ALBERTO DOS SANTOS PAZ', '1/21/98', 21, 'M', 'Ensino médio completo', 'Mathilde Silva', 390, 'cx 02', 'Vila Boa Esperança', 'MG', 'Betim', '32684306', '992736850', '975280108', 'MG-16.636.816', '13533883604', 'albertopaz90@hotmail.com', '1702969', 'ANTONIO JUREMA DA PAZ', '', 'ELIZABETE MARIA DOS SANTOS PAZ', '', 'PROCESSOS LOGÍSTICOS', 'AIPL13T-01', 'MATRICULADO');